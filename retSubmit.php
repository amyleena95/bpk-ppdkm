<?php 
  if (isset($_POST['btnSubmit']))
  {
    
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

    //SQL Query to SUBMIT
    $sql = "INSERT INTO retirement (ret_staffIC, ret_staffName, ret_position, ret_grade, ret_ppdFileNo, ret_deptFileNo, ret_retAge, ret_retDate, ret_sendDate, ret_sendRefer, ret_recDate, ret_recRefer, ret_notes) VALUES ('$ret_staffIC','$ret_staffName','$ret_position','$ret_grade','$ret_ppdFileNo','$ret_deptFileNo','$ret_retAge','$ret_retDate','$ret_sendDate','$ret_sendRefer','$ret_recDate','$ret_recRefer','$ret_notes')";

    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

    if($result)
      {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Buku berjaya direkodkan.')
        window.location = 'retNew.php?result=SuccessfullyRegister';
        </SCRIPT>");

         header("Location:retList.php");
      }
  }

?>