<?php
require_once "config.php"; // config dosyası dahil ediliyor
if(isset($_POST["title"]) && isset($_POST["parent_id"])){ //post değerlerin varlığı test ediliyor
    $prepare = $db->prepare(" INSERT INTO category SET title = :title, parent_id = :parent_id"); //veritabanına ekleniyor

    $insert = $prepare->execute( // güvenli bir şekilde veritabanı değerlerine eşitleniyor
        $data=array(
            "title"=> $_POST["title"],
            "parent_id"=>$_POST["parent_id"]
        )
    );
    if($insert){ //ekleme başarılı ise index.php sayfasına gidiyor 
        header("Location:../index.php");
    }else{ //başarısız ise hata mesajı ekrana gösteriliyor
        echo "Ekleme sırasında bir problem oluştu!";
    }   
}else{
    //post değerleri boş ise bu çıktı oluşturuluyor
    echo "Aradığınız sayfa bulunamadı.";
}
?>