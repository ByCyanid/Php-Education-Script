<?php 
include ('../../config.php'); 
include ('../../inc/sitedata.php'); 


$cevap = $_POST['cevap'];
$id = $_GET['id'];



if($cevap == '' || $id == '' ){
echo "<script>alert('Boş Alan Bırakmayınız.'); location='../../sorular.php'; </script>";
die;	
}

//ADDSLASH
$addsl = addslashes($cevap);

$queryCek = mysqli_query($connect, "SELECT * FROM sorular WHERE id = '$id'");
if(mysqli_affected_rows($connect)){
$query1 = mysqli_query($connect, "UPDATE sorular SET cevap = '$addsl' WHERE id = $id");
$query2 = mysqli_query($connect, "UPDATE sorular SET durum = 1 WHERE id = $id");

echo "<script>alert('Başarıyla Cevaplandı'); location='../../sorular.php'; </script>";

	
}
else {
echo "<script>alert('System Error.'); location='../../sorular.php'; </script>";
die;

}



?>