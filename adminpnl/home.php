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
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
					
                      <h6 class="card-title mb-0">Toplam Onaylı Üye</h6>
                     <?php
					$sayUye = mysqli_query($connect, "SELECT * FROM data_users WHERE durum = 1");
					$yazdirUye = mysqli_num_rows ($sayUye);
					?>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-success"><?=$yazdirUye;?> <i data-feather="arrow-up" class="icon-sm mb-1 text-success"></i></h3>
                        <div class="d-flex align-items-baseline">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Toplam Onaysız Üye</h6>
                      
                    </div>
                    <div class="row">
						 <?php
					$sayUye2 = mysqli_query($connect, "SELECT * FROM data_users WHERE durum = 0");
					$yazdirUye2 = mysqli_num_rows ($sayUye2);
					?>
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-warning"><?=$yazdirUye2;?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
			   <?php
					$sayUye3 = mysqli_query($connect, "SELECT * FROM data_users");
					$yazdirUye3 = mysqli_num_rows ($sayUye3);
					?>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">Toplam Üye</h6>
                    
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-danger"><?=$yazdirUye3;?></h3>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- row -->


        <div class="row">
          <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                  <h6 class="card-title mb-0">Son Üyeler</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
               
                <div class="table-responsive mt-1">
                                        <table  class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
												 <th>Kullanıcı Adı</th>
                                                    <th>Email Adresi</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											$query_r = mysqli_query($connect, "SELECT * FROM data_users ORDER BY id DESC LIMIT 5");
											if (mysqli_affected_rows($connect)){
											$i = 1;
											while ($fetch_r = mysqli_fetch_array($query_r)){
												
											?>
												<tr class="active">
												 <td><?php echo $fetch_r['username']; ?></td>
												 <td class="text-danger"><?php echo $fetch_r['email']; ?></td>
												</tr>
											<?php
													$i++;}
												}else{
											?>
										 <tr class="active">
                                                <th scope="row">0</th>
                                                
                                                <td>Kayıt</td>
                                                <td>Yok</td>
                                            </tr>
										<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
              </div> 
            </div>
          </div>

        </div> <!-- row -->


			</div>
<?php include ('inc/footer.php'); ?>
</html>    