<?php
//SİTEBİLGİLERİ
$querySiteBilgi = mysqli_query($connect, "SELECT * FROM site_data WHERE id = 1");
$fetchSiteBilgi = mysqli_fetch_array($querySiteBilgi);
$site_name = $fetchSiteBilgi['site_name'];
$site_aciklama = $fetchSiteBilgi['site_aciklama'];



//ÜYE BİLGİLERİ
$userid = $_SESSION['userid'];
$queryUser = mysqli_query($connect, "SELECT * FROM data_users WHERE id = '$userid'");
$fetchUser = mysqli_fetch_array($queryUser);
$username = $fetchUser['username'];
$password = $fetchUser['password'];
$email = $fetchUser['email'];
$telefon = $fetchUser['telefon'];
$adsoyad = $fetchUser['adsoyad'];
$durum = $fetchUser['durum'];

//DURUM BİLGİLERİ
if($durum == 0){
$uyelikdurumYaz = '<a class="text-danger">ONAYSIZ HESAP</a>';	
}else{
$uyelikdurumYaz = '<a class="text-success">ONAYLI HESAP</a>';		
}



//LOGO İLK SON KARAKTERLER
$ilk3 = substr($site_name, 0, 3);
$kalan = substr($site_name, 3);






?>