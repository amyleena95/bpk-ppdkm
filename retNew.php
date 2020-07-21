<?php
session_start();

//check if user is logged in or not
if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage= "retNew";

//Include 'edit' php code
include ('retEdit.php');

//Include 'submit' code
include ('retSubmit.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sistem Pengurusan Maklumat BPK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
    <div class="header">
      <?php include 'inc/header.php'; ?>
    </div>

    <div>
      <?php include 'inc/navbar.php'; ?>
    </div>

    <div class="row">
      <div class="fullcolumn">
           <div class="container">
            <table border="0" align="center" font-size="14px">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <tr>
                  <?php if ($update == true): ?>
                    <td colspan="2"><h1 align="center">Persaraan | Kemaskini Rekod</h1></td>
                  <?php else: ?>
                    <td colspan="2"><h1 align="center">Persaraan | Tambah Rekod Baharu</h1></td>
                  <?php endif ?>
                </tr>

                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Am</h1></td>
                </tr>

                <!--Nama Pegawai-->
                <tr>
                  <td>Nama Pegawai</td>
                  <td>: <input type="text" name="ret_staffName" size="60" autocomplete="off" value="<?php echo $ret_staffName; ?>" required></td>
                </tr>

                <!--No Kad Pengenalan-->
                <tr>
                  <td>No. Kad Pengenalan</td>
                  <td>: <input type="text" name="ret_staffIC" size="60" autocomplete="off" value="<?php echo $ret_staffIC; ?>" required
                    <?php if ($update == true): ?>
                      readonly
                    <?php endif ?>
                    ></td>
                </tr>

                <!--Jawatan Pegawai-->
                <tr>
                  <td>Jawatan</td>
                  <td>: <input type="text" name="ret_position" size="60" autocomplete="off" value="<?php echo $ret_position; ?>" required></td>
                </tr>

                <!--Gred-->
                <tr>
                  <td>Gred</td>
                  <td>: <input type="text" name="ret_grade" size="60" autocomplete="off" value="<?php echo $ret_grade; ?>" required></td>
                </tr>

                <!--No. Fail PPD-->
                <tr>
                  <td>No. Fail PPD</td>
                  <td>: <input type="text" name="ret_ppdFileNo" size="60" autocomplete="off" value="<?php echo $ret_ppdFileNo; ?>"></td>
                </tr>

                <!--No. Fail Jabatan-->
                <tr>
                  <td>No. Fail Jabatan</td>
                  <td>: <input type="text" name="ret_deptFileNo" size="60" autocomplete="off" value="<?php echo $ret_deptFileNo; ?>" required></td>
                </tr>

                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Persaraan</h1></td>
                </tr>

                <!--Umur Persaraan-->
                <tr>
                  <td>Umur Persaraan</i></td>
                  <td>: <input type="text" name="ret_retAge" size="17" autocomplete="off" value="<?php echo $ret_retAge; ?>"></td>
                </tr>

                <!--Tarikh Bersara-->
                <tr>
                  <td>Tarikh Bersara</td>
                  <td>: <input type="date" name="ret_retDate" size="60" autocomplete="off" value="<?php echo $ret_retDate; ?>"></td>
                </tr>

                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Surat Menyurat</h1></td>
                </tr>

                <!--Tarikh Menghantar Surat-->
                <tr>
                  <td>Tarikh Penghantaran Surat</td>
                  <td>: <input type="date" name="ret_sendDate" size="60" autocomplete="off" value="<?php echo $ret_sendDate; ?>"></td>
                </tr>

                <!--No Rujukan Surat Penghantar-->
                <tr>
                  <td>No. Rujukan Surat Penghantar</td>
                  <td>: <input type="text" name="ret_sendRefer" size="60" autocomplete="off" value="<?php echo $ret_sendRefer; ?>" required></td>
                </tr>

                <!--Tarikh Penerimaan Surat-->
                <tr>
                  <td>Tarikh Penerimaan Surat</td>
                  <td>: <input type="date" name="ret_recDate" size="60" autocomplete="off" value="<?php echo $ret_recDate; ?>"></td>
                </tr>

                <!--No Rujukan Surat Penerimaan-->
                <tr>
                  <td>No. Rujukan Surat Penerimaan</td>
                  <td>: <input type="text" name="ret_recRefer" size="60" autocomplete="off" value="<?php echo $ret_recRefer; ?>" required></td>
                </tr>

                <!--Catatan-->
                <tr>
                  <td>Catatan</td>
                  <td>: <input type="textarea" name="ret_notes" size="60" autocomplete="off" value="<?php echo $ret_notes; ?>"></td>
                </tr>

                <tr>
                  <td>
                    <input type="reset" value="Kosongkan" class="btnSubmit">
                  </td>

                  <td>
                    <?php if ($update == true): ?>
                      <input type="submit" name="btnEdit" value="Kemaskini" class="btnSubmit">
                    <?php else: ?>
                      <input type="submit" name="btnSubmit" value="Hantar" class="btnSubmit">
                    <?php endif ?>
                  </td>
                </tr>
              </form>
            </table>
          </div>
      </div>
    </div>

    <div class="footer2">
      <?php include 'inc/footer.php'; ?>
    </div>

  </body>
</html>
