<?php $email="";?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$site_name;?> - <?=$site_aciklama;?></title>
	<!-- core:css -->
	<link rel="stylesheet" href="themes/assets/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<link rel="stylesheet" href="themes/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="themes/assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="themes/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="themes/assets/css/demo_2/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="themes/assets/images/favicon.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          <?=$ilk3;?><span><?=$kalan;?></span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Detaylar</li>
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Detaylar</span>
            </a>
          </li>
		   <li class="nav-item">
            <a href="uyeler.php" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Üyeler</span>
            </a>
          </li>
          <li class="nav-item nav-category">Video İşlemleri</li>
        <li class="nav-item">
            <a href="videolar.php" class="nav-link">
             <i class="fab fa-youtube link-icon"></i>
              <span class="link-title">Tüm Eğitimler</span>
            </a>
          </li>
       
        
          <li class="nav-item nav-category">Diğer</li>
         <li class="nav-item">
            <a href="siteayar.php" class="nav-link">
              <i class="fas fa-bullhorn link-icon"></i>
              <span class="link-title">Site Ayarları</span>
            </a>
          </li>
		<li class="nav-item">
            <a href="profil.php" class="nav-link">
              <i class="far fa-id-card link-icon"></i>
              <span class="link-title">Profil</span>
            </a>
          </li>
		   
		<li class="nav-item">
            <a href="sorular.php" class="nav-link">
              <i class="far fa-id-card link-icon"></i>
              <span class="link-title">Sorular</span>
            </a>
          </li>

		   <li class="nav-item">
            <a href="exit.php" class="nav-link">
              <i class="fas fa-sign-out-alt link-icon"></i>
              <span class="link-title">Çıkış Yap</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
				
					<ul class="navbar-nav">
				
	
						<li class="nav-item dropdown nav-profile">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="themes/youtube.gif" alt="profile" style="width:35px;height:35px;">
							</a>
							<div class="dropdown-menu" aria-labelledby="profileDropdown">
								<div class="dropdown-header d-flex flex-column align-items-center">
									<div class="figure mb-3">
										<img src="themes/youtube.gif" alt="profile" style="width:80px;height:80px;">
									</div>
									<div class="info text-center">
										<p class="name font-weight-bold mb-0"><?=$username;?></p>
										<p class="email text-muted mb-3"><?=$email;?></p>
									</div>
								</div>
								<div class="dropdown-body">
									<ul class="profile-nav p-0 pt-3">
										<li class="nav-item">
											<a href="profil.php" class="nav-link">
												<i data-feather="user"></i>
												<span>Profil</span>
											</a>
										</li>
										
										<li class="nav-item">
											<a href="exit.php" class="nav-link">
												<i data-feather="log-out"></i>
												<span>Çıkış Yap</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->