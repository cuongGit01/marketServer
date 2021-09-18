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

            $result = mysqli_query($conn, "select * from users where taiKhoan = '$taiKhoan' and password = '$password'");

            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);

                $user = array();
                $user["taiKhoan"] = $result["taiKhoan"];
                $user["password"] = $result["password"];
                $user["tenNguoiDung"] = $result["tenNguoiDung"];

                $response["result"] = 1;
                $response["user"] = $user;

                //array_push($response["user"], $user);

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