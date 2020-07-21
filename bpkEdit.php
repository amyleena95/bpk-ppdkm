<?php 
	include ('connection.php');

	$update = false;
	$bpk_staffIC = '';
  	$bpk_staffName = '';
	$bpk_category = '';
	$bpk_school = '';
	$bpk_ppdFileNo = '';
	$bpk_deptFileNo = '';
	$bpk_position = '';
	$bpk_staffGrade = '';
	$bpk_apptDate1 = '';
	$bpk_apptDate2 = '';
	$bpk_confirmDate1 = '';
	$bpk_confirmDate2 = '';
	$bpk_retOption = '';
	$bpk_retAge = '';
	$bpk_updateDate = '';
	$bpk_notes = '';

	if (isset($_GET['edit'])) {
		$bpk_staffIC = $_GET['edit'];
		$update = true;
		$sql = "SELECT * FROM bpk WHERE bpk_staffIC = '$bpk_staffIC'";
		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

		if (mysqli_num_rows($result) == 1 ) {
			$n = mysqli_fetch_array($result);
			$bpk_staffIC = $n['bpk_staffIC'];
  			$bpk_staffName = $n['bpk_staffName'];
			$bpk_category = $n['bpk_category'];
			$bpk_school = $n['bpk_school'];
			$bpk_ppdFileNo = $n['bpk_ppdFileNo'];
			$bpk_deptFileNo = $n['bpk_deptFileNo'];
			$bpk_position = $n['bpk_position'];
			$bpk_staffGrade = $n['bpk_staffGrade'];
			$bpk_apptDate1 = $n['bpk_apptDate1'];
			$bpk_apptDate2 = $n['bpk_apptDate2'];
			$bpk_confirmDate1 = $n['bpk_confirmDate1'];
			$bpk_confirmDate2 = $n['bpk_confirmDate2'];
			$bpk_retOption = $n['bpk_retOption'];
			$bpk_retAge = $n['bpk_retAge'];
			$bpk_updateDate = $n['bpk_updateDate'];
			$bpk_notes = $n['bpk_notes'];

		}
	}

	if (isset($_POST['btnEdit'])){
		
	  $bpk_staffIC = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_staffIC']));
	  $bpk_staffName = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_staffName']));
	  $bpk_category = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_category']));
	  $bpk_school = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_school']));
	  $bpk_ppdFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_ppdFileNo']));
	  $bpk_deptFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_deptFileNo']));
	  $bpk_position = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_position']));
	  $bpk_staffGrade = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_staffGrade']));
	  $bpk_apptDate1 = mysqli_real_escape_string($myConnection, $_POST['bpk_apptDate1']);
	  $bpk_apptDate2 = mysqli_real_escape_string($myConnection, $_POST['bpk_apptDate2']);
	  $bpk_confirmDate1 = mysqli_real_escape_string($myConnection, $_POST['bpk_confirmDate1']);
	  $bpk_confirmDate2 = mysqli_real_escape_string($myConnection, $_POST['bpk_confirmDate2']);
	  $bpk_retOption = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_retOption']));
	  $bpk_retAge = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_retAge']));
	  $bpk_updateDate = mysqli_real_escape_string($myConnection, $_POST['bpk_updateDate']);
	  $bpk_notes = mysqli_real_escape_string($myConnection, strtoupper($_POST['bpk_notes']));

		$sqlUpdate = "UPDATE bpk SET 
			bpk_staffName = '$bpk_staffName', 
			bpk_category = '$bpk_category', 
			bpk_school = '$bpk_school', 
			bpk_ppdFileNo = '$bpk_ppdFileNo', 
			bpk_deptFileNo = '$bpk_deptFileNo', 
			bpk_position = '$bpk_position', 
			bpk_staffGrade = '$bpk_staffGrade', 
			bpk_apptDate1 = '$bpk_apptDate1', 
			bpk_apptDate2 = '$bpk_apptDate2', 
			bpk_confirmDate1 = '$bpk_confirmDate1', 
			bpk_confirmDate2 = '$bpk_confirmDate2', 
			bpk_retOption = '$bpk_retOption', 
			bpk_retAge = '$bpk_retAge', 
			bpk_updateDate = '$bpk_updateDate', 
			bpk_notes = '$bpk_notes' 
			WHERE bpk_staffIC = '$bpk_staffIC'";

		$resultUpdate = mysqli_query($myConnection, $sqlUpdate) or die(mysqli_error($myConnection));

	 if($resultUpdate && $bpk_category == 'PPD')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dikemaskini.')
          window.location = 'bpkListPPD.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListPPD.php");
      }
      else if($resultUpdate && $bpk_category == 'GB')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dikemaskini.')
          window.location = 'bpkListGB.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListGB.php");
      }
       else if($resultUpdate && $bpk_category == 'SK')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dikemaskini.')
          window.location = 'bpkListSchool.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListSchool.php");
      }
      else
      { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal.')
          window.location = 'bpkAddBook.php?edit='$bpk_staffIC';
          </SCRIPT>");
      }
  }
?>

