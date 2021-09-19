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
	$Register['Failed']['Exist']['Username'] = array(
		'Code' => 400,
		'Text' => 'Beklemede olan bir sorunuz mevcut. Cevaplandıktan sonra yeni soru sorabilirsiniz.'
	);
	$Register['Success'] = array(
		'Code' => 200,
		'Text' => 'Sorunuz başarıyla alındı, cevaplandığında sayfada görebilirsiniz.'
	);

	

	if (!isset($_POST['soru'])){
		Output($Register['Unexpected']);
	}


	$soru = $_POST['soru'];
	//ADDSLASH
	$addsl = addslashes($soru);
	
	if($soru == ''){
	Output($Register['mustFilled']);	
	}

	$query = mysqli_query($connect, "SELECT * FROM sorular WHERE username = '$username' && durum = 0");
	if(mysqli_affected_rows($connect)) Output($Register['Failed']['Exist']['Username']);

	$queryHakkinda = mysqli_query($connect, "INSERT INTO sorular (username,soru) VALUES ('$username','$addsl')");

	if ($queryHakkinda) 		
	Output($Register['Success']);
?>