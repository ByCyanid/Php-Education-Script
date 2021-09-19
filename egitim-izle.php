<?php
include ('config.php');
include ('inc/sitedata.php');

if (!isset($_SESSION['login'])){
echo " <meta http-equiv='refresh' content='1;URL=index.php'> ";
exit();
}

//EĞİTİM BİLGİLERİ

$egitim = $_GET['egitim'];
$queryEgitim = mysqli_query($connect, "SELECT * FROM egitimler WHERE egitimlink = '$egitim'");
$fetchEgitim = mysqli_fetch_array($queryEgitim);
$egitimbaslik = $fetchEgitim['egitimbaslik'];
$egitimaciklama = $fetchEgitim['egitimaciklama'];
$egitimvideo = $fetchEgitim['egitimvideo'];
$egitimlink = $fetchEgitim['egitimlink'];						

//BELGE UZANTISI AL
$uzantiparcala = explode(".", $egitimvideo);
$uzantiNe = $uzantiparcala[1];

if ($_SERVER['HTTP_REFERER'] == ''){
echo "<script>alert('Sistemsel Sorun'); location='home.php'; </script>";	
die;
}

?>
<html lang="en">
<?php include ('inc/header.php'); ?>

			<div class="page-content" >

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
                  <h6 class="card-title mb-0"><?=$egitimbaslik;?> Eğitimi</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
				   <div class="row">
				   <div class="col-md-12">
				   <div class="alert alert-primary">
					  <strong><?=$egitimbaslik;?></strong> <?=$egitimaciklama;?>
					</div>
				   </div>
					<?php
					if ($uzantiNe == 'mp4') {
					?>
				   
				   <div class="col-md-12">
				   <video width="100%" height="400" controls>
					  <source src="themes/egitimler/<?=$egitimvideo;?>" type="video/mp4">
					  <source src="themes/egitimler/<?=$egitimvideo;?>" type="video/ogg">
					Your browser does not support the video tag.
					</video>
					</div>
					
					<?php }
					else {
					?>
					
					   <div class="col-md-12" >
					   <iframe  style="pointer-events:none;" width="100%" height="473" src="themes/egitimler/<?=$egitimvideo;?>#toolbar=0&navpanes=0" onload="disableContextMenu();" onMyLoad="disableContextMenu();"></iframe>


					</div>
			<?php }
					?>
					
				   </div>	 
              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
<?php include ('inc/footer.php'); ?>

</html>    