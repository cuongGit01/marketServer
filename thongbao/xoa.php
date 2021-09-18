<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->thongBao)) {
        try {
            $obj = $data->thongBao;
            $maThongBao = isset($obj->maThongBao) ? $obj->maThongBao : '';

            $result = mysqli_query($conn, "delete from thongbao where maThongBao = $maThongBao");

            if ($result) {
                $response["result"] = 1;
                echo json_encode($response);
            } else {
                $response["result"] = 0;
                echo json_encode($response);
            }
        } catch (Exception $exc) {
            echo "Error add obj";
        }
    } else {
        echo "No data request";
    }


    //



} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}
