<?php 
include ('../../config.php'); 
include ('../../inc/sitedata.php'); 


$egitimbaslik = $_POST['egitimbaslik'];
$egitimaciklama = $_POST['egitimaciklama'];

if($egitimbaslik == '' || $egitimaciklama == '' ){
echo "<script>alert('Boş Alan Bırakmayınız.'); location='../../yeniegitim.php'; </script>";
die;	
}

//ADDSLASH
$addsl = addslashes($egitimbaslik);
//SEO LİNK
function seo($text)
{
$find = array('Ç', 'Ş', 'Ə', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ə', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
$replace = array('c', 's', 'e', 'g', 'u', 'i', 'o', 'c', 'e', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
$text = strtolower(str_replace($find, $replace, $text));
$text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
$text = trim(preg_replace('/\s+/', ' ', $text));
$text = str_replace(' ', '-', $text);
return $text;
}
$seoBaslik = seo($egitimbaslik);

if(isset($_FILES['dosya'])){
   $hata = $_FILES['dosya']['error'];
   if($hata != 0) {
      echo "<script>alert('Sistemsel Sorun'); location='../../yeniegitim.php'; </script>";
	  die;
   } else {
      $boyut = $_FILES['dosya']['size'];
      if($boyut > (1024*1024*3)){
         echo "<script>alert('Dosya 300MB den az olmalı'); location='../../yeniegitim.php'; </script>";
		 die;
      } else {
         $tip = $_FILES['dosya']['type'];
         $isim = $_FILES['dosya']['name'];
         $uzanti = explode('.', $isim);
         $uzanti = $uzanti[count($uzanti)-1];
         if($uzanti !== 'asdasd' or $uzanti !== 'asdasdasd' or $uzanti !== 'zxczxc' or $uzanti !== 'zxczxc'){
            $userid = $_SESSION['userid'];
            $dosya = $_FILES['dosya']['tmp_name'];
            copy($dosya, '../../../themes/egitimler/' . $_FILES['dosya']['name']);
            $querySoru = mysqli_query($connect, "INSERT INTO egitimler (egitimbaslik,egitimaciklama,egitimvideo,egitimlink) VALUES ('$addsl','$egitimaciklama','$isim','$seoBaslik')");
            echo "<script>alert('Eğitimlere Ekleme Başarıyla Yapılmıştır.'); location='../../yeniegitim.php'; </script>";
   
         } else {
            echo "<script>alert('Sadece JPG Formatında Resimler Kabul Edilir'); location='../../yeniegitim.php'; </script>";
            die;
			
		
         }
      }
   }
}



?>