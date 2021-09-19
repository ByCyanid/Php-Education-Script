<?php 
include ('../../config.php');
include ('../../inc/sitedata.php');




	$Register['Unexpected'] = array(
		'Code' => 999,
		'Text' => 'Beklenmeyen Hata'
	);
	$Register['mustFilled'] = array(
		'Code' => 999,
		'Text' => 'Tüm boşlukları eksiksiz şekilde doldurun'
	);
	$Register['Success'] = array(
		'Code' => 200,
		'Text' => 'Üye bilgileri başarıyla güncelledin!'
	);


	

	if (!isset($_POST['uyeid'], $_POST['usernamea'], $_POST['passworda'], $_POST['adsoyada'], $_POST['emaila'], $_POST['telefona'])){
		Output($Register['Unexpected']);
	}




	$usernamea = $_POST['usernamea'];
	$passworda = $_POST['passworda'];
	$emaila = $_POST['emaila'];
	$telefona = $_POST['telefona'];
	$adsoyada = $_POST['adsoyada'];
	$uyeid = $_POST['uyeid'];
	
	if($usernamea == '' || $passworda == '' || $emaila == '' || $telefona == '' || $adsoyada == ''  || $uyeid == ''){
	Output($Register['mustFilled']);	
	}


	$querySit = mysqli_query($connect, "UPDATE data_users SET username = '$usernamea',password = '$passworda',email = '$emaila',adsoyad = '$adsoyada',telefon = '$telefona' WHERE id = $uyeid");


	if ($querySit) 		
	Output($Register['Success'])
?>