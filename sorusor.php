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
                  <h6 class="card-title mb-0">Tüm Sorular  - <a data-toggle="modal" data-target="#myModal" class="btn btn-danger">YENİ SORU SOR</a></h6>
                 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Soru Sor</h4>
      </div>
      <div class="modal-body">
    <label> Sorunuz : </label>
        <input id="soru" class="form-control" type="text">
    <br>
    <button id="btn-soru" class="btn btn-danger" style="width:100%">SORU SOR</button>
      </div>
    </div>

  </div>
</div>


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
						<?php
						$animals = mysqli_query($connect, "SELECT * FROM sorular WHERE durum = 1 ORDER BY id DESC");
						foreach ($animals as $animall) { 

						echo '
	<button class="btn btn-primary" style="width:100%;margin-top:5px" data-toggle="collapse" data-target="#demo'.$animall['id'].'">'.$animall['username'].' : '.$animall['soru'].'</button>
			
				<div id="demo'.$animall['id'].'" class="collapse">
				<br>
				'.$animall['cevap'].'
				
				</div> 
				
						';
						}

						?>				
			
				
				
				</div>		
				</div>
              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
<?php include ('inc/footer.php'); ?>

</html>    