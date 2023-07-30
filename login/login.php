<?php

require_once "../config/database.php";
header('Content-Type: application/json');
if (!empty($_POST['username'])) {

    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    $sql_login = mysqli_query($con, "SELECT * FROM tb_pengguna WHERE username = '$username'") or die(mysqli_error($con));

    if (mysqli_num_rows($sql_login) > 0) {
        $datanya = (object) mysqli_fetch_assoc($sql_login);
        if (password_verify($password, $datanya->pasword)) {
            unset($datanya->pasword);
            $_SESSION['login'] = $datanya->id;
            echo json_encode([
                'success' => true,
                'message' => "Anda berhasil masuk",
                'user' => $datanya,
                'pw' => password_hash("mumun", PASSWORD_DEFAULT),
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => "Kata sandi salah",
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => "Username tidak ditemukan",
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => "Field username dan password tidak dikirimkan",
    ]);
}
die;
