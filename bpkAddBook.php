<?php
session_start();

//check if user is logged in or not
if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage="addBook";

//Include 'edit' php code
include ('bpkEdit.php');

//Include 'submit' code
include ('bpkSubmit.php');
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

                <!--Category-->
                <tr>
                  <td>Kategori</td>
                  <td>
                    : <select name="bpk_category" id="category" value="<?php echo $bpk_category; ?>" required>
                      <option value="<?php echo $bpk_category; ?>"><?php echo $bpk_category; ?></option>
                      <option value="PPD">PPD</option>
                      <option value="GB">Guru Besar</option>
                      <option value="SK">Sekolah</option>
                    </select>
                  </td>
                </tr>


                <!--Nama Pegawai-->
                <tr>
                  <td>Nama Pegawai</td>
                  <td>: <input type="text" name="bpk_staffName" size="60" autocomplete="off" value="<?php echo $bpk_staffName; ?>" required></td>
                </tr>

                <!--No Kad Pengenalan-->
                <tr>
                  <td>No. Kad Pengenalan</td>
                  <td>: <input type="text" name="bpk_staffIC" size="60" autocomplete="off" value="<?php echo $bpk_staffIC; ?>" required
                    <?php if ($update == true): ?>
                      readonly
                    <?php endif ?>
                    ></td>
                </tr>

                 <!--No. Fail PPD-->
                <tr>
                  <td>No. Fail PPD</td>
                  <td>: <input type="text" name="bpk_ppdFileNo" size="60" autocomplete="off" value="<?php echo $bpk_ppdFileNo; ?>"></td>
                </tr>

                <!--No. Fail Jabatan-->
                <tr>
                  <td>No. Fail Jabatan</td>
                  <td>: <input type="text" name="bpk_deptFileNo" size="60" autocomplete="off" value="<?php echo $bpk_deptFileNo; ?>" required></td>
                </tr>

                <!--Jawatan-->
                <tr>
                  <td>Jawatan</td>
                  <td>: <input type="text" name="bpk_position" size="60" autocomplete="off" value="<?php echo $bpk_position; ?>" required></td>
                </tr>

                <!--Gred-->
                <tr>
                  <td>Gred</td>
                  <td>: <input type="text" name="bpk_staffGrade" size="60" autocomplete="off" value="<?php echo $bpk_staffGrade; ?>" required></td>
                </tr>


                <!--School or PPD-->
                <tr>
                  <td>Sekolah</td>
                  <td>: <input type="text" name="bpk_school" size="60" autocomplete="off" value="<?php echo $bpk_school; ?>"></td>
                </tr>

               
                <tr>
                  <td colspan="2"><h3 align="center">Tarikh-tarikh Penting</h1></td>
                </tr>

                <!--Tarikh Lantikan-->
                <tr>
                  <td>Tarikh Lantikan</td>
                  <td>: <input type="date" name="bpk_apptDate1" size="60" autocomplete="off" value="<?php echo $bpk_apptDate1; ?>"></td>
                </tr>

                <!--Tarikh Pengesahan Dalam Perkhidmatan 1-->
                <tr>
                  <td>Tarikh Pengesahan dalam <br>Pekhidmatan 1</td>
                  <td>: <input type="date" name="bpk_confirmDate1" size="60" autocomplete="off" value="<?php echo $bpk_confirmDate1; ?>" required></td>
                </tr>

                <!--Tarikh Lantikan 2-->
                <tr>
                  <td>Tarikh Lantikan 2 <br> <i>(Isi jika ada.)</i></td>
                  <td>: <input type="date" name="bpk_apptDate2" size="60" autocomplete="off" value="<?php echo $bpk_apptDate2; ?>"></td>
                </tr>


                <!--Tarikh Pengesahan Dalam Perkhidmatan 2-->
                <tr>
                  <td>Tarikh Pengesahan dalam <br>Pekhidmatan 2 <i>(Isi jika ada.)</i></td>
                  <td>: <input type="date" name="bpk_confirmDate2" size="60" autocomplete="off" value="<?php echo $bpk_confirmDate2; ?>"></td>
                </tr>

                <!--Tarikh Kemas Kini-->
                <tr>
                  <td>Tarikh Kemaskini</i></td>
                  <td>: <input type="date" name="bpk_updateDate" size="60" autocomplete="off" value="<?php echo $bpk_updateDate; ?>"></td>
                </tr>

                <tr>
                  <td colspan="2"><h3 align="center">Maklumat Persaraan</h1></td>
                </tr>

                <!--Umur Persaraan-->
                <tr>
                  <td>Umur Persaraan</i></td>
                  <td>: <input type="text" name="bpk_retAge" size="17" autocomplete="off" value="<?php echo $bpk_retAge; ?>"></td>
                </tr>

                <!--Opsyen Persaraan-->
                <tr>
                  <td>Opsyen Persaraan</td>
                  <td>
                    : <select name="bpk_retOption" value="<?php echo $bpk_retOption; ?>" required>
                      <option value="<?php echo $bpk_retOption; ?>"><?php echo $bpk_retOption; ?></option>
                      <option value="KWSP">KWSP</option>
                      <option value="Pencen">Pencen</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td>Catatan</td>
                  <td>: <input type="textarea" name="bpk_notes" size="60" autocomplete="off" value="<?php echo $bpk_notes; ?>"></td>
                </tr>

                <tr>
                  <td><input type="reset" value="Kosongkan" class="btnSubmit"></td>
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
