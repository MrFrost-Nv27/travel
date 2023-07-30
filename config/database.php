<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

$con = mysqli_connect('localhost', 'root', '', 'db_travel2');

if (!$con) {
    die('Connect Error: ' . mysqli_connect_errno());
}

function base_url($url = null)
{
    $base_url = "http://skripsi.alex";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }

}

function getUser()
{
    $con = mysqli_connect('localhost', 'root', '', 'db_travel2');
    if (isset($_SESSION['login'])) {
        $id = $_SESSION['login'];
        $sql_pengguna = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE id = '$id'") or die(mysqli_error($con));
        if (mysqli_num_rows($sql_pengguna) > 0) {
            $pengguna = (object) mysqli_fetch_assoc($sql_pengguna);
            $sql_peran = mysqli_query($con, "SELECT * FROM tb_peran WHERE id = '$pengguna->id_peran'") or die(mysqli_error($con));
            if (mysqli_num_rows($sql_peran) > 0) {
                $peran = (object) mysqli_fetch_assoc($sql_peran);
                unset($peran->id);
                $pengguna->peran = $peran->peran;
            }
            return $pengguna;
        }
    } else {
        return null;
    }

}
