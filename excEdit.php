<?php
	include ('connection.php');

	$update = false;
	$exc_staffIC = '';
	$exc_staffName = '';
	$exc_ppdFileNo = '';
	$exc_deptFileNo = '';
	$exc_oldSchool = '';
	$exc_newSchool = '';
	$exc_sendReferNo = '';
	$exc_sendDate = '';
	$exc_receiveReferNo = '';
	$exc_receiveDate = '';
	$exc_newPPD = '';
	$exc_newState = '';
	$exc_sendType = '';
	$exc_notes = '';

	if (isset($_GET['edit'])) {

		$exc_staffIC = $_GET['edit'];
		$update = true;

		$sql = "SELECT * FROM exchange WHERE exc_staffIC = '$exc_staffIC'";

		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

		if (mysqli_num_rows($result) == 1 ) {

			$n = mysqli_fetch_array($result);
			$exc_staffIC = $n['exc_staffIC'];
			$exc_staffName = $n['exc_staffName'];
			$exc_ppdFileNo = $n['exc_ppdFileNo'];
			$exc_deptFileNo = $n['exc_deptFileNo'];
			$exc_oldSchool = $n['exc_oldSchool'];
			$exc_newSchool = $n['exc_newSchool'];
			$exc_sendReferNo = $n['exc_sendReferNo'];
			$exc_sendDate = $n['exc_sendDate'];
			$exc_receiveReferNo = $n['exc_receiveReferNo'];
			$exc_receiveDate = $n['exc_receiveDate'];
			$exc_newPPD = $n['exc_newPPD'];
			$exc_newState = $n['exc_newState'];
			$exc_sendType = $n['exc_sendType'];
			$exc_notes = $n['exc_notes'];

		}
	}

	if (isset($_POST['btnEdit'])){

		$exc_staffName = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_staffName']));
		$exc_staffIC = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_staffIC']));
		$exc_ppdFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_ppdFileNo']));
		$exc_deptFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_deptFileNo']));
		$exc_oldSchool = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_oldSchool']));
		$exc_newSchool = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_newSchool']));
		$exc_sendReferNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_sendReferNo']));
		$exc_sendDate = mysqli_real_escape_string($myConnection, $_POST['exc_sendDate']);
		$exc_receiveReferNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_receiveReferNo']));
		$exc_receiveDate = mysqli_real_escape_string($myConnection, $_POST['exc_receiveDate']);
		$exc_newPPD = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_newPPD']));
		$exc_newState = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_newState']));
		$exc_sendType = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_sendType']));
		$exc_notes = mysqli_real_escape_string($myConnection, strtoupper($_POST['exc_notes']));

		//SQL Update
		$sqlUpdate = "UPDATE exchange SET exc_staffName = '$exc_staffName', exc_ppdFileNo = '$exc_ppdFileNo', exc_deptFileNo = '$exc_deptFileNo', exc_oldSchool = '$exc_oldSchool', exc_newSchool = '$exc_newSchool', exc_sendReferNo = '$exc_sendReferNo', exc_sendDate = '$exc_sendDate', exc_receiveReferNo = '$exc_receiveReferNo', exc_receiveDate = '$exc_receiveDate', exc_newPPD = '$exc_newPPD', exc_newState = '$exc_newState', exc_sendType = '$exc_sendType', exc_notes = '$exc_notes' WHERE exc_staffIC = '$exc_staffIC'";

		$resultUpdate = mysqli_query($myConnection, $sqlUpdate) or die(mysqli_error($myConnection));

		if($resultUpdate)
      	{
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dikemaskini.')
          window.location = 'excList.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:excList.php");

      	} else {
      		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal.')
          window.location = 'excNew.php?edit='$bpk_staffIC';
          </SCRIPT>");
      	}

	}
?>