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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

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
                  <h6 class="card-title mb-0">Yeni Eğitim Ekle </h6>
             
				  
				  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
				<form action="system/ajax/egitimekle.php" method="POST" enctype="multipart/form-data">
					<div class="row">
					
					<div class="col-md-6">
					<label>Eğitim Başlık </label>
					<input name="egitimbaslik" class="form-control">
					</div>
					<div class="col-md-6">
					<label>Belge Seçiniz (Video/PDF)</label>
					<input   class="form-control" type="file" name="dosya" />
					</div>
					<div class="col-md-12">
					<label>Eğitim Açıklama </label>
					<textarea  name="egitimaciklama" class="form-control"></textarea>
					</div>
					
					
					<div class="col-md-12">
					<br>
					<button class="btn btn-primary" style="width:100%">EĞİTİM EKLE</button>
					</div>
					</div>
                   </form>    

              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
  <?php include ('inc/footer.php'); ?>
<script>
 CKEDITOR.replace( 'egitimaciklama' );
</script>
</html>    