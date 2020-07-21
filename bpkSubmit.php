<?php if (isset($_POST['btnSubmit']))
{

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

    //SQL Query 01 -- Insert new record
    $sql= "INSERT INTO bpk (bpk_staffIC, bpk_staffName, bpk_category, bpk_school, bpk_ppdFileNo, bpk_deptFileNo, bpk_position, bpk_staffGrade, bpk_apptDate1, bpk_apptDate2, bpk_confirmDate1, bpk_confirmDate2, bpk_retOption, bpk_retAge, bpk_updateDate, bpk_notes) VALUES ('$bpk_staffIC', '$bpk_staffName', '$bpk_category', '$bpk_school', '$bpk_ppdFileNo', '$bpk_deptFileNo', '$bpk_position', '$bpk_staffGrade', '$bpk_apptDate1', '$bpk_apptDate2', '$bpk_confirmDate1', '$bpk_confirmDate2', '$bpk_retOption', '$bpk_retAge', '$bpk_updateDate', '$bpk_notes')";

    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

    //Popup Message Script
    if($result && $bpk_category == 'PPD')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya direkodkan.')
          window.location = 'bpkAddBook.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListPPD.php");
      }
      else if($result && $bpk_category == 'GB')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya direkodkan.')
          window.location = 'bpkAddBook.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListGB.php");
      }
       else if($result && $bpk_category == 'SK')
      {
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Buku berjaya direkodkan.')
          window.location = 'bpkAddBook.php?result=SuccessfullyRegister';
          </SCRIPT>");

          header("Location:bpkListSchool.php");
      }
      else
      { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal.')
          window.location = 'bpkAddBook.php';
          </SCRIPT>");
      }
  }

?>