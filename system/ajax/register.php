<?php 
	include ('../../config.php');
	include ('../../inc/sitedata.php');

	
	$Register['Unexpected'] = array(
		'Code' => 999,
		'Text' => 'Bekleyenmeyen Hata'
	);
	$Register['mustFilled'] = array(
		'Code' => 999,
		'Text' => 'Lütfen bilgileri eksiksiz doldurun.'
	);
	$Register['gecerSiz'] = array(
		'Code' => 999,
		'Text' => 'Kullanıcı adınız veya şifreniz geçersiz karakterler içeriyor!'
	);
	$Register['Success'] = array(
		'Code' => 200,
		'Text' => 'Kayıt başarılı, hesabınzı aktif edildikten sonra giriş yapabilirsiniz. Yönlendiriliyorsunuz.'
	);
	$Register['Failed']['Exist']['Username'] = array(
		'Code' => 400,
		'Text' => 'Bu kullanıcı adı zaten kullanımda.'
	);
	$Register['Failed']['Exist']['Email'] = array(
		'Code' => 400,
		'Text' => 'Bu email adresi zaten kullanımda.'
	);
	$Register['Failed']['Exist']['Telefon'] = array(
		'Code' => 400,
		'Text' => 'Bu telefon numarası zaten kullanımda.'
	);
	$Register['validMail'] = array(
		'Code' => 999,
		'Text' => 'Lütfen geçerli bir email adresi girin!'
	);
	$Register['minKrk'] = array(
		'Code' => 999,
		'Text' => 'Şifreniz 6  veya daha fazla karakter içermelidir!'
	);	
	
	if (!isset($_POST['username'], $_POST['password'], $_POST['email'])){
		Output($Register['Unexpected']);
	}
	

	


	$adsoyad = $_POST['adsoyad'];
	$telefon = $_POST['telefon'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$email = $_POST['email'];


	
	if($username == '' || $password == '' || $email == ''  || $adsoyad == ''  || $telefon == '' ){
	Output($Register['mustFilled']);	
	}

	
	$query = mysqli_query($connect, "SELECT * FROM data_users WHERE username = '$username'");
	if(mysqli_affected_rows($connect)) Output($Register['Failed']['Exist']['Username']);


	$query = mysqli_query($connect, "SELECT * FROM data_users WHERE email = '$email'");
	if(mysqli_affected_rows($connect)) Output($Register['Failed']['Exist']['Email']);
	$query = mysqli_query($connect, "SELECT * FROM data_users WHERE telefon = '$telefon'");
	if(mysqli_affected_rows($connect)) Output($Register['Failed']['Exist']['Telefon']);
	
	///////////EMAİL GEÇERLİ
	function emailControl($email){
		if(filter_var($email,FILTER_VALIDATE_EMAIL)==true){
			return 1;
		}else{
			return 0;
		}
	}
    if(emailControl($email)==0){
	Output($Register['validMail']);
	die;
    } 
	//SQL KORUMA
	if(strstr($username,"'") || strstr($username,"*") || strstr($username,"/") || strstr($username,"#") || strstr($username,"$") || strstr($username,"%") || strstr($username,"&") || strstr($username,"(") || strstr($username,")")){
	Output($Register['gecerSiz']);
	}

	//SQL KORUMA
	if(strstr($password,"'") || strstr($password,"*") || strstr($password,"/") || strstr($password,"#") || strstr($password,"$") || strstr($password,"%") || strstr($password,"&") || strstr($password,"(") || strstr($password,")")){
		Output($Register['gecerSiz']);
	}
   
    $kackarakter = strlen($password);
	if($kackarakter < 6){
	Output($Register['minKrk']);
	}
	
	$code = rand(0,999999);
	
	$query = mysqli_query($connect, "INSERT INTO data_users (username,password,email,adsoyad,telefon) VALUES ('$username','$password','$email','$adsoyad','$telefon')");
	if ($query)

	Output($Register['Success'])
?>