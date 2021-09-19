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
		'Text' => 'Bilgilerini başarıyla güncelledin!'
	);

	$Register['krktrs'] = array(
		'Code' => 999,
		'Text' => 'Şifreniz Türkçe Karakter İçeremez'
	);
	$Register['minKrk'] = array(
		'Code' => 999,
		'Text' => 'Şifreniz minimum 6 karakter içermelidir.'
	);
	

	if (!isset($_POST['apassword'])){
		Output($Register['Unexpected']);
	}




	$apassword = $_POST['apassword'];
	
	if($apassword == '' ){
	Output($Register['mustFilled']);	
	}

	if(strstr($apassword,"ğ") || strstr($apassword,"Ğ") || strstr($apassword,"ç") || strstr($apassword,"Ç") || strstr($apassword,"ş") || strstr($apassword,"Ş") || strstr($apassword,"ü") || strstr($apassword,"Ü") || strstr($apassword,"ö") || strstr($apassword,"Ö") || strstr($apassword,"ı") || strstr($apassword,"I")){
	Output($Register['krktrs']);
	}
	$kackarakter = strlen($apassword);
	if($kackarakter < 6){
	Output($Register['minKrk']);
	}

	$queryHakkinda = mysqli_query($connect, "UPDATE data_users SET password = '$apassword' WHERE id = '$userid'");

	if ($queryHakkinda) 		
	Output($Register['Success'])
?>