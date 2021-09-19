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
                  <h6 class="card-title mb-0">Tüm Üyeler </h6>

				  
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
                                        <table id="myTable" class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Kullanıcı Adı</th>
                                                    <th>Email</th>
													<th>Onay Durumu</th>
													<th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											$query_r = mysqli_query($connect, "SELECT * FROM data_users ORDER BY id DESC");
											if (mysqli_affected_rows($connect)){
											$i = 1;
											while ($fetch_r = mysqli_fetch_array($query_r)){
												if($fetch_r['durum'] == 1){
													$uyeTip = '<a class="text-success">ONAYLI ÜYE</a>';
												}else{
													$uyeTip = '<a class="text-danger">ONAYSIZ ÜYE</a>';
												}
												
											?>
												<tr class="active">
												 <td><?php echo $fetch_r['username']; ?></td>
												 <td><?php echo $fetch_r['email']; ?></td>
												 <td><?php echo $uyeTip; ?></td>
												 <td> 
												 <span id="<?php echo $fetch_r['id']; ?>" class="badge badge-primary animalbuyonay"><i class="far fa-check-square"></i></span>
												  <a href="uye-detay.php?uyeid=<?php echo $fetch_r['id']; ?>" class="badge badge-success"><i class="far fa-edit"></i></a>
												 <span id="<?php echo $fetch_r['id']; ?>" class="badge badge-warning animalbuymussil"><i class="far fa-trash-alt"></i></span>
												 </td>
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
  	<script>
	$('.animalbuyonay').click(function(){
	id = $(this).attr('id');
		
	swal({
	  title: "Onaylıyor musun?",
	  text: "Onayladığın takdirde bu üyeyi  onaylı hale getireceksiniz.",
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
	url:'system/ajax/uyeonay.php',
	success:function(reply) {
	if (reply == 0) {
	swal("Tebrikler!", "Üye  onaylı duruma getirildi", "success");
	setTimeout(function(){
	location.href = "uyeler.php";
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
	$('.animalbuymussil').click(function(){
	id = $(this).attr('id');
		
	swal({
	  title: "Onaylıyor musun?",
	  text: "Onayladığın takdirde bu üyeyi  tamamen sileceksiniz!",
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
	url:'system/ajax/uyesil.php',
	success:function(reply) {
	if (reply == 0) {
	swal("Tebrikler!", "Üye bilgileri  tamamen kaldırıldı", "success");
	setTimeout(function(){
	location.href = "uyeler.php";
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