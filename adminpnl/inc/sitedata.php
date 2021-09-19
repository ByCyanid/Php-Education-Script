<?php
//SİTEBİLGİLERİ
$querySiteBilgi = mysqli_query($connect, "SELECT * FROM site_data WHERE id = 1");
$fetchSiteBilgi = mysqli_fetch_array($querySiteBilgi);
$site_name = $fetchSiteBilgi['site_name'];
$site_aciklama = $fetchSiteBilgi['site_aciklama'];




//ADMİN BİLGİLERİ
$userid = $_SESSION['userid'];
$queryUser = mysqli_query($connect, "SELECT * FROM adminp WHERE id = '$userid'");
$fetchUser = mysqli_fetch_array($queryUser);
$uuid = $fetchUser['id'];
$username = $fetchUser['username'];
$password = $fetchUser['password'];




//LOGO İLK SON KARAKTERLER
$ilk3 = substr($site_name, 0, 3);
$kalan = substr($site_name, 3);






?>