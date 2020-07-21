<?php
session_start();

if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage="listPPD";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sistem Pengurusan Maklumat BPK</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
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
        <h2>Senarai BPK PPD</h2>

        <!--To count book-->
        <?php 
          $sql = "SELECT * FROM bpk WHERE bpk_category = 'PPD'";

          $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

          $ppdcount = mysqli_num_rows($result);
        ?>

        <h3>Jumlah buku: <?php echo $ppdcount; ?></h3>
        <a href="bpkAddBook.php">Tambah Rekod</a>
      </div>
    </div>
  </div>
    

    <div class="row">
      <div class="fullcolumn">
        <div class="container">
          <table style="border:0 !important;"> 
            <tr style="border:0 !important;">
              <td width="75%" style="border:0 !important;"></td>
              <td width="25%" style="border:0 !important;">
                <form method="post" action="bpkListPPD.php?search=search">
                  <input type="text" name="search" placeholder="Cari No. KP/Nama/No. Fail Jabatan" onblur='this.form.submit()' maxlength="13" autocomplete="off" align="right" size="50">
                 <noscript><input type="submit" value="Submit"></noscript>
              </form>
            </td>
          </tr>   
        </table>

        <div style="overflow-x:auto;">
          <table>
            <thead bgcolor="1D3557">
              <tr>
                <th><center>No.</center></th>
                <th><center>Nama Pegawai</center></th>
                <th><center>No. K/P</center></th>
                <th><center>No. Fail Jabatan</center></th>
                <th><center>Jawatan</center></th>
                <th><center>Gred</center></th>
                <th><center>Tarikh Perlantikan 1</center></th>
                <th><center>Tarikh Perlantikan 2</center></th>
                <th><center>Pengesahan Dalam Perkhidmatan 1</center></th>
                <th><center>Pengesahan Dalam Perkhidmatan 2</center></th>
                <th><center>Umur Persaraan</center></th>
                <th><center>Opsyen Persaraan</center></th>
                <th><center>Tarikh Kemaskini</center></th>
                <th><center>Catatan</center></th>
                <th><center>Tindakan</center></th>
              </tr>
            </thead>

            <tbody>

              <!-- PHP CODE: retrieve record-->
              <?php 
                if(isset($_POST['search'])) {
                  $search = $_POST['search'];

                  $sql = "SELECT * FROM bpk
                          WHERE bpk_category = 'PPD'
                          AND ( bpk_staffIC LIKE '%" . $search . "%' OR bpk_deptFileNo LIKE '%" . $search . "%' OR bpk_staffName LIKE '%" . $search . "%')";
                }else{
                  $sql = "SELECT * FROM bpk
                          WHERE bpk_category = 'PPD'";
                }
            
                 $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                 if (mysqli_num_rows($result)==0){
                    echo "Tiada rekod dijumpai.";
                  }else{
                    $count = 1;
                
                    while($row = mysqli_fetch_assoc($result))
                      { 
                        $bpk_staffIC = $row['bpk_staffIC'];
                        $bpk_staffName = $row['bpk_staffName'];
                        $bpk_category = $row['bpk_category'];
                        $bpk_school = $row['bpk_school'];
                        $bpk_ppdFileNo = $row['bpk_ppdFileNo'];
                        $bpk_deptFileNo = $row['bpk_deptFileNo'];
                        $bpk_position = $row['bpk_position'];
                        $bpk_staffGrade = $row['bpk_staffGrade'];
                        $bpk_apptDate1 = $row['bpk_apptDate1'];
                        $bpk_apptDate2 = $row['bpk_apptDate2'];
                        $bpk_confirmDate1 = $row['bpk_confirmDate1'];
                        $bpk_confirmDate2 = $row['bpk_confirmDate2'];
                        $bpk_retOption = $row['bpk_retOption'];
                        $bpk_retAge = $row['bpk_retAge'];
                        $bpk_updateDate = $row['bpk_updateDate'];
                        $bpk_notes = $row['bpk_notes'];
                  ?>
                                             
                      <tr>
                        <td><center><?php echo $count; ?></center></td>
                        <td><center><?php echo $row['bpk_staffName']; ?></center></td>
                        <td><center><?php echo $row['bpk_staffIC']; ?></center></td>
                        <td><center><?php echo $row['bpk_deptFileNo']; ?></center></td>
                        <td><center><?php echo $row['bpk_position'] ?></center></td>
                        <td><center><?php echo $row['bpk_staffGrade']?></center></td>
                        <td><center><?php echo $row['bpk_apptDate1']?></center></td>
                        <td><center><?php echo $row['bpk_apptDate2']?></center></td>
                        <td><center><?php echo $row['bpk_confirmDate1']?></center></td>
                        <td><center><?php echo $row['bpk_confirmDate2']?></center></td>
                        <td><center><?php echo $row['bpk_retAge']?></center></td>
                        <td><center><?php echo $row['bpk_retOption']?></center></td>
                        <td><center><?php echo $row['bpk_updateDate']?></center></td>
                        <td><center><?php echo $row['bpk_notes']?></center></td>
                        <td>
                          <center>
                            <a href="bpkAddBook.php?edit=<?php echo $row['bpk_staffIC']; ?>" name='edit'>Kemaskini Rekod</a>
                            <br><hr>
                            <a href="bpkDeletePPD.php?del=<?php echo $row['bpk_staffIC']; ?>" name='del'>Padam Rekod</i></a>
                          </center>
                        </td>
                      </tr>
                
                      <?php
                        $count++;
                      }
                   } 
                      ?>
            </tbody>
          </table>
        </div>
    </div>

    <div class="footer2">
      <?php include 'inc/footer.php'; ?>
    </div>
  </body>
</html>
