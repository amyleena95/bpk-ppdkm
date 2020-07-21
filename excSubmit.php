<?php 
	 if (isset($_POST['btnSubmit'])){

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

		//SQL Insert INTO
		$sql = "INSERT INTO exchange (exc_staffIC, exc_staffName, exc_ppdFileNo, exc_deptFileNo, exc_oldSchool, exc_newSchool, exc_sendReferNo, exc_sendDate, exc_receiveReferNo, exc_receiveDate, exc_newPPD, exc_newState, exc_sendType, exc_notes) VALUES ( '$exc_staffIC', '$exc_staffName', '$exc_ppdFileNo', '$exc_deptFileNo', '$exc_oldSchool', '$exc_newSchool', '$exc_sendReferNo', '$exc_sendDate', '$exc_receiveReferNo', '$exc_receiveDate', '$exc_newPPD', '$exc_newState', '$exc_sendType', '$exc_notes')";

		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

		if ($result){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
	        window.alert('Buku berjaya direkodkan.')
	        window.location = 'excNew.php?result=SuccessfullyRegister';
	        </SCRIPT>");

	         header("Location:excList.php");
		}
	 }

?>