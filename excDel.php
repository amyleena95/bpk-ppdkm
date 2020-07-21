<?php
	include ('connection.php');

	if (isset($_GET['del'])) {
		$exc_staffIC = $_GET['del'];
		$sql = "DELETE FROM exchange WHERE exc_staffIC = '$exc_staffIC'";
		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
	}

	if ($result){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dipadam.')
          window.location = 'excList.php?result=SuccessfullyRegister';
          </SCRIPT>");

         header("refresh:2; Location:excList.php");
	} else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku gagal dipadam.')
          window.location = 'excList.php?result=SuccessfullyRegister';
          </SCRIPT>");
	}
?>