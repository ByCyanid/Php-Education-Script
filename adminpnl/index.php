<?php
include ('config.php');
//SİTEBİLGİLERİ
$querySBilgi = mysqli_query($connect, "SELECT * FROM site_data WHERE id = 1");
$fetchSBilgi = mysqli_fetch_array($querySBilgi);
$site_name = $fetchSBilgi['site_name'];
$site_aciklama = $fetchSBilgi['site_aciklama'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$site_name;?> | <?=$site_aciklama;?></title>
	<!-- core:css -->
	<link rel="stylesheet" href="themes/assets/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="themes/assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="themes/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="themes/assets/css/demo_2/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="themes/assets/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pr-md-0">
                  <div class="auth-left-wrapper">

                  </div>
                </div>
                <div class="col-md-8 pl-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2"><?=$site_name;?><span><?=$site_aciklama;?></span></a>
                    <h5 class="text-muted font-weight-normal mb-4">ADMİN PANEL</h5>
                    <div class="forms-sample">
                      <div class="form-group">
                        <label for="username">Kullanıcı Adın : </label>
                        <input type="text" class="form-control" id="username" placeholder="Kullanıcı Adın">
                      </div>
                      <div class="form-group">
                        <label for="password">Şifren : </label>
                        <input type="password" class="form-control" id="password" autocomplete="current-password" placeholder="Şifreniz">
                      </div>
                     
                      <div class="mt-3">
                        <button  id="btn-login" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Giriş Yap</button>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

	<script src="themes/assets/vendors/core/core.js"></script>
	<!-- endinject -->
  <!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="themes/assets/vendors/feather-icons/feather.min.js"></script>
	<script src="themes/assets/js/template.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="system/js/cstm.min.js"></script>
</body>
</html>