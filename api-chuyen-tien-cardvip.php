  
<?php
/**
 * API ĐƯỢC VIẾT BỞI CHÂU CHÍ QUỐC
 * THỂ HIỆN MÌNH KHÔNG PHẢI SÚC VẬT BẰNG CÁCH KO XÓA CMT NẦY
 * ZALO 01684853992
 * FB : https://www.facebook.com/chauchi.quoc.5
 * THẰNG NÀO ĐEM BÁN TAO ĐÁ THỤC MỖM :v
*/
header('Content-Type: application/json');
// đoạn nầy login vào
$username = ''; // tài khoản
$password = ''; // mật khẩu
$loginUrl = 'https://cardvip.vn/dang-nhap';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $loginUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email='.$username.'&password='.$password);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
$content = curl_exec($ch);
$headers = curl_getinfo($ch, CURLINFO_HEADER_OUT);
curl_close($ch);
$json = json_decode($content);
if($json->status == true){
    // đoạn nầy thực hiện chuyễn tiền
    $sdt = "0708675095"; // tên tài khoảng
    $sotien = "100000"; // số tiền cần chuyễn
    $noidung = "GD"; // nội dung cần chuyễn
    $matkhaucap2 = "quoc01236"; // mật khẩu cấp 2
    $url_chuyen_tien = 'https://cardvip.vn/gd-chuyen-tien';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_chuyen_tien);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'PhoneNumber='.$sdt.'&PricesAmount='.$sotien.'&Note='.$noidung.'&PasswordAdvanced='.$matkhaucap2);
    $content = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($content);
    echo strip_tags(trim($json->msg));
}else{
    echo $json->msg;
}
?>
