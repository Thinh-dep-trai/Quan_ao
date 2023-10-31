<?php

function getConnection() {
    //khai báo sever
    $host = 'localhost';
    $dbname = 'shop_quan_ao';
    $username = 'root';
    $password = '';
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    //tạo đối tượng thuộc lớp PDO
    $DBH = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password, $options);
    return $DBH;
}

function query($sql) {
    $connect = getConnection();
    $result = $connect->query($sql);
    return $result;
}

function queryOne($sql) {
    $connect = getConnection();
    $result = $connect->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function execute($sql) {
    $connect = getConnection();
    $result = $connect->exec($sql);
    return $result;
}

function executeReturnLastId($sql) {
    $connect = getConnection();

    // Thực thi câu lệnh SQL 
    $result = $connect->prepare($sql);
    $result->execute();

    // Lấy ID vừa insert
    $id = $connect->lastInsertId();

    return $id;
}

?>