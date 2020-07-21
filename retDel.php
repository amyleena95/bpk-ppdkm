<?php
	include ('connection.php');

	if (isset($_GET['del'])) {
		$ret_staffIC = $_GET['del'];
		$sql = "DELETE FROM retirement WHERE ret_staffIC = '$ret_staffIC'";
		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
	}

	if ($result){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dipadam.')
          window.location = 'retList.php?result=SuccessfullyRegister';
          </SCRIPT>");

         header("refresh:2; Location:retList.php");
	} else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku gagal dipadam.')
          window.location = 'retList.php?result=SuccessfullyRegister';
          </SCRIPT>");
	}
?>