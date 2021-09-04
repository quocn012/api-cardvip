  
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
    $idbank = "10"; // tên tài khoảng
    /**
     * tự lấy cái id ra value="10" lấy 10 ra 10 tường đương với momo
     * 
     * 
     * 
     * <option value="10" data-type="2">V&#237;  MOMO</option>
    <option value="11" data-type="1">Ng&#226;n h&#224;ng  AGRIBANK</option>
    <option value="12" data-type="1">Ng&#226;n h&#224;ng  TECHCOMBANK</option>
<option value="13" data-type="1">Ng&#226;n h&#224;ng  VIETCOMBANK</option>
   <option value="14" data-type="1">Ng&#226;n h&#224;ng  TPBANK</option>
   <option value="15" data-type="1">Ng&#226;n h&#224;ng  DONGABANK</option>
    <option value="16" data-type="1">Ng&#226;n h&#224;ng  MSB</option>
   <option value="17" data-type="1">Ng&#226;n h&#224;ng  BIDV</option>
  <option value="18" data-type="1">Ng&#226;n h&#224;ng  SACOMBANK</option>
   <option value="19" data-type="1">Ng&#226;n h&#224;ng  LIENVIETPOSTBANK</option>
   <option value="20" data-type="1">Ng&#226;n h&#224;ng  VIETINBANK</option>
    <option value="21" data-type="1">Ng&#226;n h&#224;ng  MBBANK</option>
   <option value="23" data-type="1">Ng&#226;n h&#224;ng  VPBANK</option>
   <option value="24" data-type="1">Ng&#226;n h&#224;ng  ACB</option>
    <option value="26" data-type="1">Ng&#226;n h&#224;ng  OCB</option>
    <option value="27" data-type="1">Ng&#226;n h&#224;ng  EXIMBANK</option>
    <option value="28" data-type="1">Ng&#226;n h&#224;ng  ABBANK</option>
    <option value="29" data-type="1">Ng&#226;n h&#224;ng  BAOVIETBANK</option>
    <option value="30" data-type="1">Ng&#226;n h&#224;ng  BACABANK</option>
     <option value="33" data-type="1">Ng&#226;n h&#224;ng  SCB</option>
     */
    $fullname = "anh quốc khá đẹp trai"; // Tên chủ tài khoản
    $NumberBank = "0"; // Số tài khoản
    $sotien = "0"; // số tiền
    $PasswordAvanced = ""; // mật khẩu cấp 2
    $noidung = "";// nội dung
    $url_chuyen_tien = 'https://cardvip.vn/gd-rut-tien';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_chuyen_tien);
    curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'BanksId='.$idbank.'&FullName='.$fullname.'&NumberBank='.$NumberBank.'&Prices='.$sotien.'&PasswordAvanced='.$PasswordAvanced.'&NoteCustomer='.$noidung);
    $content = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($content);
    echo strip_tags(trim($json->msg));
}else{
    echo $json->msg;
}
?>
