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
                  <h6 class="card-title mb-0">Tüm Eğitimler</h6>
                  <div class="dropdown mb-2">
                    <button class="btn p-0" type="button" id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton4">
                      
                    </div>
                  </div>
                </div>
               
                <div class="table-responsive mt-1">
								<input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Eğitim Adı Girerek Arayınız">

                                        <table id="myTable" class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Başlık</th>
                                                    <th>Açıklama</th>
													<th>Eğitime Gir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
											$query_r = mysqli_query($connect, "SELECT * FROM egitimler ORDER BY id DESC");
											if (mysqli_affected_rows($connect)){
											$i = 1;
											while ($fetch_r = mysqli_fetch_array($query_r)){
												
											?>
												<tr class="active">
												 <td><?php echo $fetch_r['egitimbaslik']; ?></td>
												 <td class="text-success"><?php echo $fetch_r['egitimaciklama']; ?></td>
												  <td class="text-success"><a href="egitim-izle.php?egitim=<?php echo $fetch_r['egitimlink']; ?> "><i class="far fa-play-circle"></i></a> </td>
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