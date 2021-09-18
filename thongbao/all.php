<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    try {
        $result = mysqli_query($conn, "SELECT * FROM thongbao");

        if (mysqli_num_rows($result) > 0) {
            $response["thongBaos"] = array();

            while ($row = mysqli_fetch_array($result)) {
                // temp user array
                $obj = array();
                $obj["maThongBao"] = $row["maThongBao"];
                $obj["maNguoiDung"] = $row["maNguoiDung"];
                $obj["maCuaHang"] = $row["maCuaHang"];
                $obj["thongTinThongBao"] = $row["thongTinThongBao"];

                // push single hoaDonChiTiet into final response array
                array_push($response["thongBaos"], $obj);
            }

            $response["success"] = 1;

            echo json_encode($response);
        } else {
            $response["result"] = 0;
            echo json_encode($response);
        }
    } catch (Exception $exc) {
        echo "Error add obj";
    }


    //



} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo "Can not connect";
}
