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
                  <h6 class="card-title mb-0">Tüm Sorular </h6>
    
				  
				  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
               
                <div class="table-responsive mt-1">
				<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Kullanıcı Adı Girerek Arayınız">
                                        <table id="myTable"  class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Kullanıcı</th>
													<th>Soru</th>
													 <th>Cevap</th>
													<th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											$query_r = mysqli_query($connect, "SELECT * FROM sorular ORDER BY id DESC");
											if (mysqli_affected_rows($connect)){
											$i = 1;
											while ($fetch_r = mysqli_fetch_array($query_r)){
												
												
											?>
												<tr class="active">
												 <td><?php echo $fetch_r['username']; ?></td>
												 <td><?php echo $fetch_r['soru']; ?></td>
												 <td><?php echo $fetch_r['cevap']; ?></td>
												 <td>
												  <span class="badge badge-success " data-toggle="modal" data-target="#myModal<?php echo $fetch_r['id']; ?>"><i class="fas fa-edit"></i></span>
												  <span id="<?php echo $fetch_r['id']; ?>" class="badge badge-warning animalbuymussil"><i class="far fa-trash-alt"></i></span>
												 </td>
												</tr>
												
												
												<div id="myModal<?php echo $fetch_r['id']; ?>" class="modal fade" role="dialog">
											  <div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Cevapla</h4>
												  </div>
												  <div class="modal-body">
													<p class="text-success"><?php echo $fetch_r['soru']; ?></p>
													<hr>
													<form action="system/ajax/cevapla.php?id=<?php echo $fetch_r['id']; ?>" method="POST">
													<label>Cevabınız : </label>
													<input name="cevap" class="form-control" type="text">
													
													<button class="btn btn-danger" style="width:100%">CEVAPLA</button>
													</form>
												  </div>
												  <div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
												  </div>
												</div>

											  </div>
											</div>
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
	<script>
	$('.animalbuymussil').click(function(){
	id = $(this).attr('id');
		
	swal({
	  title: "Onaylıyor musun?",
	  text: "Onayladığın takdirde bu soru tamamen sileceksiniz!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Hayır",
	  cancelButtonText: "Evet",
	  closeOnConfirm: true,
	  closeOnCancel: false
	},
	function(isConfirm){
	if (!isConfirm) {
	$.ajax({
	type:'POST',
	data:'id='+id,
	url:'system/ajax/sorusil.php',
	success:function(reply) {
	if (reply == 0) {
	swal("Tebrikler!", "Sorulan Soru Tamamen Kaldırıldı", "success");
	setTimeout(function(){
	location.href = "sorular.php";
	},1000);
	}
	if (reply == 1) {
	swal("Başarısız!", "Üzgünüz sistemsel bir sorun meydana geldi.", "error");
	}

	} 
	})	

		
	} 

	});
	})	



	</script>
	
		<script>
	function myFunction() {
	  // Declare variables
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
	  for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}
	  }
	}
	</script>
</html>    