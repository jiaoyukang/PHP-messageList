<?php
/**
 * Created by PhpStorm.
 * User: 18110
 * Date: 2019/7/9
 * Time: 14:28
 */


////////
require_once 'MysqliObj.php';
require_once 'helper.php';

$after_data = [
    'jiao' => 'yukang',
    'zhang' => 'san'
];
$mysqli = new MysqliObj();
$business_type = '1';
$data = json_encode($after_data);
$status = '0';
$num = '0';
$create_time = date('Y-m-d H:i:s');
$update_time = date('Y-m-d H:i:s');
for ($i = 0; $i < 10;$i++){
    $order_id = $i;
    $sql = 'insert into message_list_tmp(business_type,`data`,`status`,num,create_time,order_id,send_time)value(\''.$business_type.'\',\''.$data.'\',\''.$status.'\',\''.$num.'\',\''.$create_time.'\',\''.$order_id.'\',\''.$update_time.'\')';
    $res = $mysqli->queryData($sql);
}

if ($res){
    echo 'success';
}else{
    echo 'failure';
}