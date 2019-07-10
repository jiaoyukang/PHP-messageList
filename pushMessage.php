<?php
/**
 * Created by PhpStorm.
 * User: 18110
 * Date: 2019/7/9
 * Time: 10:31
 */

require_once 'MysqliObj.php';
if (!$_POST){
    echo json_encode(['status_code' => -1 , 'message' => '没接到值' , 'data' => []]);exit();
}
$mysqli = new MysqliObj();
$res = $mysqli->queryData('insert into message_push(order_id , `data` , create_time)value(\''.$_POST['order_id'].'\',\''.$_POST['data'].'\',\''.date('Y-m-d H:i:s').'\')');
if (!$res){
    echo json_encode(['status_code' => -2 , 'message' => '修改失败' , 'data' => []]);exit();
}
echo json_encode(['status_code' => 0 , 'message' => 'success' , 'data' => []]);exit();