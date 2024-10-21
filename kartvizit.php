<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan gelen verileri alalım
    $isim = $_POST['isim'];
    $rutbe = $_POST['rutbe'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];


    $image_path = __DIR__ . '/image.png';  
    $image = imagecreatefrompng($image_path);

    if (!$image) {
        die("Resim dosyası açılamadı. Dosya yolunu kontrol edin.");
    }


    $black = imagecolorallocate($image, 0, 0, 0);
    $isim_font = 'font/tahomabd.ttf'; 
    $deputy_font = 'font/tahoma.ttf'; 
    $telefon_font = 'font/rage.ttf';  
    $email_font = 'font/Copperplate.otf';  


    $x_isim = 457;
    $y_isim = 274; 


    $text_box_isim = imagettfbbox(25, 0, $isim_font, $isim);
    $text_width_isim = abs($text_box_isim[2] - $text_box_isim[0]);


    $y_rutbe = $y_isim + 40; 


    $text_box_rutbe = imagettfbbox(20, 0, $deputy_font, $rutbe);
    $text_width_rutbe = abs($text_box_rutbe[2] - $text_box_rutbe[0]);


    $x_rutbe = $x_isim + ($text_width_isim - $text_width_rutbe) / 2;

    // resim çıkış
    imagettftext($image, 25, 0, $x_isim, $y_isim, $black, $isim_font, $isim);  
    imagettftext($image, 20, 0, $x_rutbe, $y_rutbe, $black, $deputy_font, $rutbe); 
    imagettftext($image, 20, 0, 810, 440, $black, $telefon_font, $telefon); 
    imagettftext($image, 12, 0, 790, 507, $black, $email_font, $email);  

    header('Content-Type: image/png');
    imagepng($image);

    imagedestroy($image);
} else {
    echo "Formdan veri gönderilmedi.";
}
