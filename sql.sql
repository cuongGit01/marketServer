CREATE TABLE users (
 maNguoiDung int(11) NOT NULL AUTO_INCREMENT,
 taiKhoan varchar(50) NOT NULL,
 matKhau varchar(20) NOT NULL,
 tenNguoiDung varchar(50) DEFAULT NULL,
 diaChi varchar(256) DEFAULT NULL,
 maOTP varchar(10) DEFAULT NULL,
 daXacThuc varchar(1) DEFAULT NULL,
 PRIMARY KEY (maNguoiDung)
)
//
{
    "user":
        {
            "taiKhoan":"8",
            "password":"8",
            "tenNguoiDung":"8"
        }
    
}
//

CREATE TABLE hoaDon (
 maHoaDon int(11) NOT NULL AUTO_INCREMENT,
 maNguoiDung int(11) NOT NULL,
 maThanhToan int(11) NOT NULL,
 ngayGiaoDuKien datetime DEFAULT NULL,
 ngayMua datetime DEFAULT NULL,
 diaChi varchar(256) NOT NULL,
 tongTien varchar(50) NOT NULL,
 ngayThanhToan datetime DEFAULT NULL,
 maGiamGia int(11) DEFAULT NULL,
 thanhToan varchar(1) NOT NULL,
 PRIMARY KEY (maHoaDon)
)

//
{
    "hoadon":
        {
            "maNguoiDung":"8",
            "maThanhToan":"8",
            "ngayGiaoDuKien":"8",
            "ngayMua":"8",
            "diaChi":"8",
            "tongTien":"8",
            "ngayThanhToan":"8",
            "maGiamGia":"8",
            "thanhToan":"8"
        }
    
}
//

CREATE TABLE hoaDonChiTiet (
 maHoaDonChiTiet int(11) NOT NULL AUTO_INCREMENT,
 maHoaDon int(11) NOT NULL,
 maSanPham int(11) NOT NULL,
 soLuong int(50) NOT NULL,
 PRIMARY KEY (maHoaDonChiTiet)
)
