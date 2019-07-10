<?php
/**
 * Created by PhpStorm.
 * User: 18110
 * Date: 2019/7/9
 * Time: 11:10
 */

/**
 * 发送POST请求
 * @param $url
 * @param array $post_data
 * @return mixed
 */
function requestPost($url , $post_data = array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $response = curl_exec($ch);
    $response = json_decode($response,true);
    if ($response === FALSE) {
        pushLog('curl发送请求失败');
    }
    curl_close($ch);
    return $response;
}

/**
 * 生成唯一的ID
 * @return string
 */
function generateOrderId () {
    return md5(md5(uniqid()).md5(rand()).md5(microtime()));
}

/**
 * 记录日志
 * @param $message
 */
function pushLog($message){
    file_put_contents('messageList.log' , date('Y-m-d H:i:s').'-->'.$message , FILE_APPEND);
}

/**
 * 获取时间戳毫秒级别
 * @return float
 */
function msTime() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}
