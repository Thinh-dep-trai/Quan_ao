<?php

require_once 'database.php'; // file chứa hàm kết nối db

function getAllSP() {
    $sql = "SELECT * FROM san_pham";
    $result = query($sql);
    return $result;
}

function getByIdSP($id) {
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    $result = queryOne($sql);
    return $result;
}

function createSP($ten, $gia, $mo_ta, $so_luong) {
    $sql = "INSERT INTO san_pham(ten, gia, mo_ta,so_luong) VALUES ('$ten', $gia, '$mo_ta' ,$so_luong)";
    execute($sql);
}

function updateSP($id, $ten, $gia, $mo_ta,$so_luong) {
    $sql = "UPDATE san_pham SET ten='$ten', gia=$gia, mo_ta='$mo_ta', so_luong=$so_luong WHERE id = $id";
    execute($sql);
}

function deleteSP($id) {
    $sql = "DELETE FROM san_pham WHERE id = $id";
    execute($sql);
}
