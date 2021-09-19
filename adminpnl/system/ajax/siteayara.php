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
		'Text' => 'Site bilgileri başarıyla güncelledin!'
	);


	

	if (!isset($_POST['sitename'], $_POST['siteaciklama'])){
		Output($Register['Unexpected']);
	}




	$sitename = $_POST['sitename'];
	$siteaciklama = $_POST['siteaciklama'];

	
	if($sitename == '' || $siteaciklama == '' ){
	Output($Register['mustFilled']);	
	}


	$querySit = mysqli_query($connect, "UPDATE site_data SET site_name = '$sitename',site_aciklama = '$siteaciklama' WHERE id = 1");


	if ($querySit) 		
	Output($Register['Success'])
?>