<?php
class MysqliObj{
    /**
     * 初始化数据库
     * @return mysqli
     */
    public function initMysqli(){
        $mysqli = new \mysqli("xxx.xxx.xxx.xxx", "your_username", "your_password", "your_dbname");
        if ($mysqli->connect_errno) die($mysqli->connect_error);
        $mysqli->set_charset("utf8");
        return $mysqli;
    }

    /**
     * 执行查询的sql语句
     * @param $sql
     * @return array
     */
    public function querySql($sql){
        $mysqli = $this->initMysqli();
        $mysqli_info = $mysqli->query($sql);
        $res = [];
        while ($data = mysqli_fetch_assoc($mysqli_info)){
            $res[] = $data;
        }
        return $res;
    }

    /**
     * 查找单条
     * @param $sql
     * @return array|null
     */
    public function findOne($sql){
        $mysqli = $this->initMysqli();
        $mysqli_info = $mysqli->query($sql . ' limit 1');
        return mysqli_fetch_assoc($mysqli_info);
    }

    /**
     * 执行增删改的sql语句
     * @param $sql
     * @return bool|mysqli_result
     */
    public function queryData($sql){
        $mysqli = $this->initMysqli();
        return $mysqli->query($sql);
    }
}
