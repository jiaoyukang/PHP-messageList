<?php

require_once 'MysqliObj.php';
require_once 'helper.php';

if (PHP_SAPI !== 'cli') {
    echo '请用cli模式运行';exit();
}

$mysqli = new MysqliObj();

while (TRUE){
    //查询第一条
    $list_info = $mysqli->findOne('select * from message_list_tmp order by id asc');
    if ($list_info){
        $start_time = msTime();
        //将状态更改为发送中
        $mysqli->queryData('update message_list_tmp set `status` = 1 where id = '.$list_info['id']);
        $url = 'http://www.jiaoyukang.cn/messageList/pushMessage.php';
        $data = [
            'order_id' => $list_info['order_id'],
            'data' => $list_info['data'],
        ];
        $res = requestPost($url , $data);
        //计算发送所用时间
        $send_time = (msTime() - $start_time) / 1000;
        if ($res['status_code'] != 0){
            //如果失败就将num+1
            $mysqli->queryData('update message_list_tmp set num = num + 1 and send_time = '.date('Y-m-d H:i:s').' where id = '.$list_info['id']);
            $sel_info = $mysqli->findOne('select * from message_list_tmp where id = '.$list_info['id']);
            if ($sel_info['num'] > 3){
                //如果num大于2就删除队列中的数据，并将失败数据记录到message_list表中
                $mysqli->queryData('insert into message_list(order_id,`data`,`status`,create_time,send_time,num)value (\''.$sel_info['order_id'].'\',\''.$sel_info['data'].'\',1,\''.date('Y-m-d H:i:s').'\',\''.$send_time.'\',\''.$sel_info['num'].'\')');
                $mysqli->queryData('delete from message_list_tmp where id = '. $sel_info['id']);
            }
        }
        $mysqli->queryData('insert into message_list(order_id,`data`,`status`,create_time,send_time,num)value(\''.$list_info['order_id'].'\',\''.$list_info['data'].'\',0,\''.date('Y-m-d H:i:s').'\',\''.$send_time.'\',\''.$list_info['num'].'\')');
        $mysqli->queryData('delete from message_list_tmp where id = '. $list_info['id']);
    }else{
        sleep(5);
    }
}




