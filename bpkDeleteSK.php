<?php
	include ('connection.php');

	if (isset($_GET['del'])) {
		$bpk_staffIC = $_GET['del'];
		$update = true;
		$sql = "DELETE FROM bpk WHERE bpk_staffIC = '$bpk_staffIC'";
		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
	}

	if ($result){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dipadam.')
          window.location = 'bpkListSchool.php?result=SuccessfullyRegister';
          </SCRIPT>");

         header("refresh:2; Location:bpkListSK.php");
	} else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku gagal dipadam.')
          window.location = 'bpkListSchool.php?result=SuccessfullyRegister';
          </SCRIPT>");
	}
?>