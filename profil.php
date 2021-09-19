<?php
include ('config.php');
include ('inc/sitedata.php');

if (!isset($_SESSION['login'])){
echo " <meta http-equiv='refresh' content='1;URL=index.php'> ";
exit();
}

?>
<html lang="en">
<?php include ('inc/header.php'); ?>
			<div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0 text-primary"><?=$site_name;?> - <?=$site_aciklama;?></h4>
          </div>
         
        </div>
        <div class="row">
          <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Hesap Ayarları</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
				<div class="row">
				<div class="col-md-6">
				<label>Ad Soyad : </label>
				<input  class="form-control" type="text" value="<?=$adsoyad;?>" disabled>
				</div>
				<div class="col-md-6">
				<label>Email : </label>
				<input  class="form-control" type="text" value="<?=$email;?>" disabled>
				</div>
				<div class="col-md-6">
				<label>Telefon : </label>
				<input  class="form-control" type="text" value="<?=$telefon;?>" disabled>
				</div>
				<div class="col-md-6">
				<label>Kullanıcı Adı : </label>
				<input  class="form-control" type="text" value="<?=$username;?>" disabled>
				</div>

				<div class="col-md-12">
				<label>Şifreniz : <i class="far fa-eye" onclick="togglePassword()"></i></label>
				<input id="apassword" class="form-control" type="password" value="<?=$password;?>">
				</div>
				
				<div class="col-md-12">
				<button id="btn-profil" class="btn btn-primary" style="width:100%"> GÜNCELLE </button>
				</div>
				</div>
              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
<?php include ('inc/footer.php'); ?>
<script>
function togglePassword() {
var element = document.getElementById('apassword');
element.type = (element.type == 'password' ? 'text' : 'password');
}
</script> 
</html>    