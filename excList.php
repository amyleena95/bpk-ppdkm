<?php
session_start();

if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage="excList";
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
        <h2>Senarai Pertukaran</h2>

        <!--To count book-->
        <?php 
          $sql = "SELECT * FROM exchange";

          $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

          $excCount = mysqli_num_rows($result);

        ?>

        <h3>Jumlah buku: <?php echo $excCount; ?></h3>
        <a href="excNew.php">Tambah Rekod</a>
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
                <form method="post" action="excList.php?search=search">
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
                <th><center>Nama</center></th>
                <th><center>No. KP</center></th>
                <th><center>No. Fail PPD</center></th>
                <th><center>No. Fail Jabatan</center></th>
                <th><center>Sekolah Lama</center></th>
                <th><center>Sekolah Baru</center></th>
                <th><center>Rujukan Surat Penghantar</center></th>
                <th><center>Tarikh Surat Penghantar</center></th>
                <th><center>Rujukan Surat Penerimaan</center></th>
                <th><center>Tarikh Surat Penerimaan</center></th>
                <th><center>PPD Baru</center></th>
                <th><center>Negeri Baru</center></th>
                <th><center>Cara Penghantaran</center></th>
                <th><center>Catatan</center></th>
                <th><center>Tindakan</center></th>
              </tr>
            </thead>

            <tbody>

              <!-- PHP CODE: retrieve record-->
              <?php 
                if(isset($_POST['search'])) {
                  $search = $_POST['search'];

                  $sql = "SELECT * FROM exchange
                          WHERE ( exc_staffIC LIKE '%" . $search . "%' OR exc_deptFileNo LIKE '%" . $search . "%' OR exc_staffName LIKE '%" . $search . "%')";
                }else{
                  $sql = "SELECT * FROM exchange";
                }
            
                 $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                 if (mysqli_num_rows($result)==0){
                    echo "Tiada rekod dijumpai.";
                  }else{
                    $count = 1;
                
                    while($row = mysqli_fetch_assoc($result))
                      { 
                        $exc_staffIC = $row['exc_staffIC'];
                        $exc_staffName = $row['exc_staffName'];
                        $exc_ppdFileNo = $row['exc_ppdFileNo'];
                        $exc_deptFileNo = $row['exc_deptFileNo'];
                        $exc_oldSchool = $row['exc_oldSchool'];
                        $exc_newSchool = $row['exc_newSchool'];
                        $exc_sendReferNo = $row['exc_sendReferNo'];
                        $exc_sendDate = $row['exc_sendDate'];
                        $exc_receiveReferNo = $row['exc_receiveReferNo'];
                        $exc_receiveDate = $row['exc_receiveDate'];
                        $exc_newPPD = $row['exc_newPPD'];
                        $exc_newState = $row['exc_newState'];
                        $exc_sendType = $row['exc_sendType'];
                        $exc_notes = $row['exc_notes'];
                  ?>
                                             
                      <tr>
                        <td><center><?php echo $count; ?></center></td>
                        <td><center><?php echo $row['exc_staffName']; ?></center></td>
                        <td><center><?php echo $row['exc_staffIC']; ?></center></td>
                        <td><center><?php echo $row['exc_ppdFileNo']; ?></center></td>
                        <td><center><?php echo $row['exc_deptFileNo']; ?></center></td>
                        <td><center><?php echo $row['exc_oldSchool']; ?></center></td>
                        <td><center><?php echo $row['exc_newSchool']; ?></center></td>
                        <td><center><?php echo $row['exc_sendReferNo']; ?></center></td>
                        <td><center><?php echo $row['exc_sendDate']; ?></center></td>
                        <td><center><?php echo $row['exc_receiveReferNo']; ?></center></td>
                         <td><center><?php echo $row['exc_receiveDate']; ?></center></td>
                        <td><center><?php echo $row['exc_newPPD']; ?></center></td>
                        <td><center><?php echo $row['exc_newState']; ?></center></td>
                         <td><center><?php echo $row['exc_sendType']; ?></center></td>
                        <td><center><?php echo $row['exc_notes']; ?></center></td>
                        <td>
                          <center>
                            <a href="excNew.php?edit=<?php echo $row['exc_staffIC']; ?>" name='edit'>Kemaskini Rekod</a>
                            <br><hr>
                            <a href="excDel.php?del=<?php echo $row['exc_staffIC']; ?>" name='del'>Padam Rekod</i></a>
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
