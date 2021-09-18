<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->thongBao)) {
        try {
            $obj = $data->thongBao;
            $maThongBao = isset($obj->maThongBao) ? $obj->maThongBao : '';
            $result = mysqli_query($conn, "SELECT * FROM thongbao where maThongBao=$maThongBao");

            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);

                // temp user array
                $obj = array();
                $obj["maThongBao"] = $result["maThongBao"];
                $obj["maNguoiDung"] = $result["maNguoiDung"];
                $obj["maCuaHang"] = $result["maCuaHang"];
                $obj["thongTinThongBao"] = $result["thongTinThongBao"];


                $response["success"] = 1;

                $response["thongBao"] = $obj;
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
