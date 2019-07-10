<?php
/**
 * Created by PhpStorm.
 * User: 18110
 * Date: 2019/7/9
 * Time: 18:10
 */

require_once 'MysqliObj.php';
require_once 'helper.php';

$mysqli = new MysqliObj();

$tmp_info = $mysqli->findOne('select * from message_list_tmp order by id asc');
if ((time() - strtotime($tmp_info['send_time'])) > 60){
    $pid = shell_exec('pgrep -f messageList.php');
    if ($pid){
        shell_exec('kill -s 9 '.$pid);
    }
    shell_exec('/www/server/php/56/bin/php /www/wwwroot/www.jiaoyukang.cn/messageList/messageList.php');
}




