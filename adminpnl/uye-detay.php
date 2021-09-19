<?php
include ('config.php');
include ('inc/sitedata.php');

if (!isset($_SESSION['adminlogin'])){
echo " <meta http-equiv='refresh' content='1;URL=index.php'> ";
exit();
}

if($uuid != 1){
echo "<script>location='../index.php'; </script>";
die;	
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
                  <h6 class="card-title mb-0">Üye Detayları </h6>

				  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
						<div class="row">
						<?php
						$uyeid = $_GET['uyeid'];
						$queryMusteri = mysqli_query($connect, "SELECT * FROM data_users WHERE id = '$uyeid'");
						$fetchMusteri = mysqli_fetch_array($queryMusteri);
						$usernamea = $fetchMusteri['username'];
						$passworda = $fetchMusteri['password'];
						$adsoyada = $fetchMusteri['adsoyad'];
						$emaila = $fetchMusteri['email'];
						$telefona = $fetchMusteri['telefon'];
						
						?>
						<div class="col-md-4">
						<label>Kullanıcı Adı : </label>
						<input id="usernamea" class="form-control" type="text" value="<?=$usernamea;?>">
						</div>
						<div class="col-md-4">
						<label>Kullanıcı Şifre : </label>
						<input id="passworda" class="form-control" type="text" value="<?=$passworda;?>">
						</div>
						<div class="col-md-4">
						<label>Kullanıcı Ad Soyad : </label>
						<input id="adsoyada" class="form-control" type="text" value="<?=$adsoyada;?>">
						</div>
						<div class="col-md-4">
						<label>Kullanıcı Email : </label>
						<input id="emaila" class="form-control" type="text" value="<?=$emaila;?>">
						</div>
						
						<div class="col-md-4">
						<label>Kullanıcı Telefon : </label>
						<input id="telefona" class="form-control" type="text" value="<?=$telefona;?>">
						</div>
						<input id="uyeid" type="hidden" value="<?=$uyeid;?>">
						
						<div class="col-md-4">
						<br>
						<button id="btn-uye" class="btn btn-danger" style="width:100%">GÜNCELLE</button>
						</div>
						
						</div>
              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
  <?php include ('inc/footer.php'); ?>

</html>    