<?php 
include ('../../config.php');

$Login['Unexpected'] = array(
	'Code' => 999,
	'Text' => 'Sistemsel Hata Meydana Geldi.'
);


$Login['mustFilled'] = array(
	'Code' => 999,
	'Text' => 'Tüm boşlukları eksiksiz olarak doldurun.'
);

$Login['Failed'] = array(
	'Code' => 404,
	'Text' => 'Kullanıcı adı veya şifreyi hatalı girdiniz.'
);
$Login['onaySiz'] = array(
	'Code' => 404,
	'Text' => 'Hesabınız henüz aktif edilmemiş görünüyor.'
);

$Register['gecerSiz'] = array(
		'Code' => 999,
		'Text' => 'Geçersiz karakterler kullandınız.'
);
$Login['Success'] = array(
	'Code' => 200,
	'Text' => 'Hoşgeldiniz, panele yönlendiriliyorsunuz.'
	
);

if (!isset($_POST['username'], $_POST['password'])){
	Output($Login['Unexpected']);
}
foreach($_POST as $index => $value){
	if (strlen($value) < 1){
		Output($Login['mustFilled']);
	}
}

$username = $_POST['username'];
$password = $_POST['password'];

//SQL KORUMA
if(strstr($username,"'") || strstr($username,"*") || strstr($username,"/") || strstr($username,"#") || strstr($username,"$") || strstr($username,"%") || strstr($username,"&") || strstr($username,"(") || strstr($username,")")){
	Output($Register['gecerSiz']);
	die;
}

//SQL KORUMA
if(strstr($password,"'") || strstr($password,"*") || strstr($password,"/") || strstr($password,"#") || strstr($password,"$") || strstr($password,"%") || strstr($password,"&") || strstr($password,"(") || strstr($password,")")){
	Output($Register['gecerSiz']);
	die;
}




$query = mysqli_query($connect, "SELECT * FROM data_users WHERE username = '$username' AND password = '$password'");
if (mysqli_affected_rows($connect)){
	$fetch = mysqli_fetch_array($query);
	$_SESSION['login'] = true;
	$_SESSION['userid'] = $fetch['id'];
	
	if($fetch['durum'] == 0){
	Output($Login['onaySiz']);	
	}else{
	Output($Login['Success']);	
	}
	
}else{
	Output($Login['Failed']);
}
?>