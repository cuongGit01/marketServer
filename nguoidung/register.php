<?php
require_once "conn.php";
require_once "validate.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->user)) {
        if (isset($data->user->taiKhoan) && isset($data->user->password)) {
            $user = $data->user;
            $taiKhoan = $user->taiKhoan;
            $password = $user->password;
            $tenNguoiDung = $user->tenNguoiDung;

            $result = mysqli_query($conn, "insert into users values ('','$taiKhoan', '$password','$tenNguoiDung')");
            if ($result) {
                $response["result"] = 1;
                echo json_encode($response);
            } else {
                $response["result"] = 0;
                echo json_encode($response);
            }
        } else {
            echo "Error add user";
        }
    } else {
        echo "No data request";
    }


    //



} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}