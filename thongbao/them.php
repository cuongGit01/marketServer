<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->thongBao)) {
        try {
            $obj = $data->thongBao;
            $maNguoiDung = isset($obj->maNguoiDung) ? $obj->maNguoiDung : '';
            $maCuaHang = isset($obj->maCuaHang) ? $obj->maCuaHang : '';
            $thongTinThongBao = isset($obj->thongTinThongBao) ? $obj->thongTinThongBao : '';

            $result = mysqli_query($conn, "INSERT INTO thongbao VALUES ('','$maNguoiDung','$maCuaHang','$thongTinThongBao')");

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
