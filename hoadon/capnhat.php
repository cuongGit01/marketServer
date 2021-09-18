<?php
require_once "../conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    if (isset($data->hoaDon)) {
        try {
            $obj = $data->hoaDon;
            $maHoaDon = isset($obj->maHoaDon) ? $obj->maHoaDon : '';
            $maNguoiDung = isset($obj->maNguoiDung) ? $obj->maNguoiDung : '';
            $maThanhToan = isset($obj->maThanhToan) ? $obj->maThanhToan : '';
            $ngayGiaoDuKien = isset($obj->ngayGiaoDuKien) ? $obj->ngayGiaoDuKien : '';
            $ngayMua = isset($obj->ngayMua) ? $obj->ngayMua : '';
            $diaChi = isset($obj->diaChi) ? $obj->diaChi : '';
            $tongTien = isset($obj->tongTien) ? $obj->tongTien : '';
            $ngayThanhToan = isset($obj->ngayThanhToan) ? $obj->ngayThanhToan : '';
            $maGiamGia = isset($obj->maGiamGia) ? $obj->maGiamGia : '';
            $thanhToan = isset($obj->thanhToan) ? $obj->thanhToan : '';

            $result = mysqli_query($conn, "
            UPDATE `hoadon` SET `maNguoiDung`='$maNguoiDung',`maThanhToan`='$maThanhToan',`ngayGiaoDuKien`='$ngayGiaoDuKien',`ngayMua`='$ngayMua',`diaChi`='$diaChi',`tongTien`='$tongTien',`ngayThanhToan`='$ngayThanhToan',`maGiamGia`='$maGiamGia',`thanhToan`='$thanhToan' WHERE maHoaDon = $maHoaDon
            ");

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