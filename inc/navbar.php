<script>
// Add active class to button
var navBar = document.getElementById("navbar");
var btns = navBar.getElementByClassName("dropbtn");
for (var i=0; i<btns.length; i++){
  btns[i].addEventListener("click", function(){
    var current= document.getElementsByClassName("active");
    if (current.length>0){
      current[0].className = current[0].className.replace("active", "");
    }
    this.clssName +=" active";
  });
}
</script>

<!-- dynamic navbar -->
<div id= "navbar" class="navbar">

  <!-- check login session - unhide menu item -->
  <?php if(!isset($_SESSION['role'])) { ?>
    <a href="login.php" style="float:right"><span class="fa fa-sign-in"></span> Log Masuk</a>
  <?php }else{
    if($_SESSION['role'] == "admin") { ?>

  <!-- check active status for page: 'halaman utama' -->
  <a href="index.php"
	<?php
		if ($thisPage == "index"){
			echo "id=\"currentpage\"";
			$currentClass = 'active';
		}
		else {
			$currentClass = ' ';
		}
	?>
	class=<?php echo $currentClass; ?>>
	<i class="fa fa-home"></i> Halaman Utama
  </a>

  <!-- check active status for page: 'BPK DAERAH' -->
   <a href="bpkdaerah.php"
	<?php
		if ($thisPage == "bpkdaerah" || $thisPage == "addBook" || $thisPage == "listSchool" || $thisPage == "listGB" || $thisPage == "listPPD"){
			echo "id=\"currentpage\"";
			$currentClass = 'active';
		}
		else {
			$currentClass = ' ';
		}
	?>
	class=<?php echo $currentClass; ?>>
	<i class="fa fa-book"></i> BPK Daerah
  </a>

  <!-- check active status for page: 'Persaraan' -->
  <a href="retHome.php"
  <?php
    if ($thisPage == "retHome" || $thisPage == "retNew" || $thisPage == "retList"){
      echo "id=\"currentpage\"";
      $currentClass = 'active';
    }
    else {
      $currentClass = ' ';
    }
  ?>
  class=<?php echo $currentClass; ?>>
  <i class="fa fa-users"></i> Persaraan
  </a>

  <!-- check active status for page: 'Pertukaran' -->
  <a href="excHome.php"
  <?php
    if ($thisPage == "excNew" | $thisPage == "excList" | $thisPage == "excHome" ){
      echo "id=\"currentpage\"";
      $currentClass = 'active';
    }
    else {
      $currentClass = ' ';
    }
  ?>
  class=<?php echo $currentClass; ?>>
  <i class="fa fa-exchange"></i> Pertukaran
  </a>

	<?php } ?>
  <a href="logout.php" style="float:right;"><span class="fa fa-sign-out"></span> Log Keluar</a>
  <?php } ?>
</div>
