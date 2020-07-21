<?php
session_start();

//check if user is logged in or not
if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage= "excNew";

//Include 'edit' php code
include ('excEdit.php');

//Include 'submit' code
include ('excSubmit.php');
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
                    <td colspan="2"><h1 align="center">Kemaskini Rekod</h1></td>
                  <?php else: ?>
                    <td colspan="2"><h1 align="center">Tambah Rekod Baharu</h1></td>
                  <?php endif ?>
                </tr>

                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Am</h1></td>
                </tr>

                <!--Nama Pegawai-->
                <tr>
                  <td>Nama Pegawai</td>
                  <td>: <input type="text" name="exc_staffName" size="60" autocomplete="off" value="<?php echo $exc_staffName; ?>" required></td>
                </tr>

                <!--No Kad Pengenalan-->
                <tr>
                  <td>No. Kad Pengenalan</td>
                  <td>: <input type="text" name="exc_staffIC" size="60" autocomplete="off" value="<?php echo $exc_staffIC; ?>" required
                    <?php if ($update == true): ?>
                      readonly
                    <?php endif ?>
                    ></td>
                </tr>

                <!--No. Fail PPD-->
                <tr>
                  <td>No. Fail PPD</td>
                  <td>: <input type="text" name="exc_ppdFileNo" size="60" autocomplete="off" value="<?php echo $exc_ppdFileNo; ?>"></td>
                </tr>

                <!--No. Fail Jabatan-->
                <tr>
                  <td>No. Fail Jabatan</td>
                  <td>: <input type="text" name="exc_deptFileNo" size="60" autocomplete="off" value="<?php echo $exc_deptFileNo; ?>" required></td>
                </tr>

                <!--Sekolah Lama-->
                <tr>
                  <td>Sekolah Lama</td>
                  <td>: <input type="text" name="exc_oldSchool" size="60" autocomplete="off" value="<?php echo $exc_oldSchool; ?>" required></td>
                </tr>
               
               <!--Sekolah Baru-->
                <tr>
                  <td>Sekolah Baru</td>
                  <td>: <input type="text" name="exc_newSchool" size="60" autocomplete="off" value="<?php echo $exc_newSchool; ?>" required></td>
                </tr>

                <!--Divide-->
                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Surat Menyurat</h1></td>
                </tr>

                <!--No Rujukan Surat Penghantar-->
                <tr>
                  <td>No. Rujukan Surat Penghantar</td>
                  <td>: <input type="text" name="exc_sendReferNo" size="60" autocomplete="off" value="<?php echo $exc_sendReferNo; ?>" required></td>
                </tr>

                <!--Tarikh Menghantar Surat-->
                <tr>
                  <td>Tarikh Penghantaran Surat</td>
                  <td>: <input type="date" name="exc_sendDate" size="60" autocomplete="off" value="<?php echo $exc_sendDate; ?>" required></td>
                </tr>

                <!--No Rujukan Surat Penerimaan-->
                <tr>
                  <td>No. Rujukan Surat Penerimaan</td>
                  <td>: <input type="text" name="exc_receiveReferNo" size="60" autocomplete="off" value="<?php echo $exc_receiveReferNo; ?>" required></td>
                </tr>

                <!--Tarikh Penerimaan Surat-->
                <tr>
                  <td>Tarikh Penerimaan Surat</td>
                  <td>: <input type="date" name="exc_receiveDate" size="60" autocomplete="off" value="<?php echo $exc_receiveDate; ?>"></td>
                </tr>

                <!--Divide-->
                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Penempatan Baru</h1></td>
                </tr>

                <!--PPD Baru-->
                <tr>
                  <td>PPD Baru</td>
                  <td>: <input type="text" name="exc_newPPD" size="60" autocomplete="off" value="<?php echo $exc_newPPD; ?>" required></td>
                </tr>

                <!--Negeri Baru-->
                <tr>
                  <td>Negeri Baru</td>
                  <td>: <input type="text" name="exc_newState" size="60" autocomplete="off" value="<?php echo $exc_newState; ?>" required></td>
                </tr>

                <!--Cara Penghantaran Buku-->
                <tr>
                  <td>Cara Penghantaran <br/><i>(Isikan no. pengesanan pos kalau melalui pos)</i></td>
                  <td>: <input type="text" name="exc_sendType" size="60" autocomplete="off" value="<?php echo $exc_sendType; ?>" required></td>
                </tr>

                <!--Catatan-->
                <tr>
                  <td>Catatan</td>
                  <td>: <input type="textarea" name="exc_notes" size="60" autocomplete="off" value="<?php echo $exc_notes; ?>"></td>
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
