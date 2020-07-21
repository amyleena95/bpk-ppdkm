<?php 
	include ('connection.php');

	$update = false;
	$ret_staffIC = '';
	$ret_staffName = '';
	$ret_position = '';
	$ret_grade = '';
	$ret_ppdFileNo = '';
	$ret_deptFileNo = '';
	$ret_retAge = '';
	$ret_retDate = '';
	$ret_sendDate = '';
	$ret_sendRefer = '';
	$ret_recDate = '';
	$ret_recRefer = '';
	$ret_notes = '';

	if (isset($_GET['edit'])) {

		$ret_staffIC = $_GET['edit'];
		$update = true;

		$sql = "SELECT * FROM retirement WHERE ret_staffIC = '$ret_staffIC'";

		$result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

		if (mysqli_num_rows($result) == 1 ) {

			$n = mysqli_fetch_array($result);
			$ret_staffIC = $n['ret_staffIC'];
			$ret_staffName = $n['ret_staffName'];
			$ret_position = $n['ret_position'];
			$ret_grade = $n['ret_grade'];
			$ret_ppdFileNo = $n['ret_ppdFileNo'];
			$ret_deptFileNo = $n['ret_deptFileNo'];
			$ret_retAge = $n['ret_retAge'];
			$ret_retDate = $n['ret_retDate'];
			$ret_sendDate = $n['ret_sendDate'];
			$ret_sendRefer = $n['ret_sendRefer'];
			$ret_recDate = $n['ret_recDate'];
			$ret_recRefer = $n['ret_recRefer'];
			$ret_notes = $n['ret_notes'];
		}
	}

	if (isset($_POST['btnEdit'])){

		$ret_staffIC = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_staffIC']));
	    $ret_staffName =mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_staffName']));
	    $ret_position = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_position']));
	    $ret_grade = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_grade']));
	    $ret_ppdFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_ppdFileNo']));
	    $ret_deptFileNo = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_deptFileNo']));
	    $ret_retAge = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_retAge']));
	    $ret_retDate = mysqli_real_escape_string($myConnection, $_POST['ret_retDate']);
	    $ret_sendDate = mysqli_real_escape_string($myConnection, $_POST['ret_sendDate']);
	    $ret_sendRefer = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_sendRefer']));
	    $ret_recDate = mysqli_real_escape_string($myConnection, $_POST['ret_recDate']);
	    $ret_recRefer = mysqli_real_escape_string($myConnection,strtoupper( $_POST['ret_recRefer']));
	    $ret_notes = mysqli_real_escape_string($myConnection, strtoupper($_POST['ret_notes']));

		$sqlUpdate = "UPDATE retirement SET ret_staffName = '$ret_staffName', ret_position = '$ret_position', ret_grade = '$ret_grade', ret_ppdFileNo = '$ret_ppdFileNo', ret_deptFileNo = '$ret_deptFileNo', ret_retAge = '$ret_retAge',
			ret_retDate = '$ret_retDate', ret_sendDate = '$ret_sendDate',
			ret_sendRefer = '$ret_sendRefer', ret_recDate = '$ret_recDate',
			ret_recRefer = '$ret_recRefer', ret_notes = '$ret_notes'
			WHERE ret_staffIC = '$ret_staffIC'";
			
		$resultUpdate = mysqli_query($myConnection, $sqlUpdate) or die(mysqli_error($myConnection));

		// var_dump($sqlUpdate);

		if($resultUpdate)
      	{
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya dikemaskini.')
          window.location = 'retList.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:retList.php");

      	} else {
      		echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal.')
          window.location = 'retNew.php?edit='$bpk_staffIC';
          </SCRIPT>");
      	}
	}
?>

