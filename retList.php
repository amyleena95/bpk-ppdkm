<?php
session_start();

if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

include_once("connection.php");
$thisPage="retList";
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
        <h2>Senarai Buku Bersara</h2>

        <!--To count book-->
        <?php 
          $sql = "SELECT * FROM retirement";

          $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

          $retCount = mysqli_num_rows($result);

        ?>

        <h3>Jumlah buku: <?php echo $retCount; ?></h3>
        <a href="retNew.php">Tambah Rekod</a>
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
                <form method="post" action="retList.php?search=search">
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
                <th><center>Jawatan</center></th>
                <th><center>Gred</center></th>
                <th><center>No. Fail PPD</center></th>
                <th><center>No. Fail Jabatan</center></th>
                <th><center>Umur Persaraan</center></th>
                <th><center>Tarikh Bersara</center></th>
                <th><center>Tarikh Surat Penghantar Ke JPNS</center></th>
                <th><center>Rujukan Surat Penghantar</center></th>
                <th><center>Tarikh Surat Penerimaan JPNS</center></th>
                <th><center>Rujukan Surat Penerimaan</center></th>
                <th><center>Catatan</center></th>
                <th><center>Tindakan</center></th>
              </tr>
            </thead>

            <tbody>

              <!-- PHP CODE: retrieve record-->
              <?php 
                if(isset($_POST['search'])) {
                  $search = $_POST['search'];

                  $sql = "SELECT * FROM retirement
                          WHERE ( ret_staffIC LIKE '%" . $search . "%' OR ret_deptFileNo LIKE '%" . $search . "%' OR ret_staffName LIKE '%" . $search . "%')";
                }else{
                  $sql = "SELECT * FROM retirement";
                }
            
                 $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                 if (mysqli_num_rows($result)==0){
                    echo "Tiada rekod dijumpai.";
                  }else{
                    $count = 1;
                
                    while($row = mysqli_fetch_assoc($result))
                      { 
                        $ret_staffIC = $row['ret_staffIC'];
                        $ret_staffName = $row['ret_staffName'];
                        $ret_position = $row['ret_position'];
                        $ret_grade = $row['ret_grade'];
                        $ret_ppdFileNo = $row['ret_ppdFileNo'];
                        $ret_deptFileNo = $row['ret_deptFileNo'];
                        $ret_retAge = $row['ret_retAge'];
                        $ret_retDate = $row['ret_retDate'];
                        $ret_sendDate = $row['ret_sendDate'];
                        $ret_sendRefer = $row['ret_sendDate'];
                        $ret_recDate = $row['ret_recDate'];
                        $ret_recRefer = $row['ret_recRefer'];
                        $ret_notes = $row['ret_notes'];

                  ?>
                                             
                      <tr>
                        <td><center><?php echo $count; ?></center></td>
                        <td><center><?php echo $row['ret_staffName']; ?></center></td>
                        <td><center><?php echo $row['ret_staffIC']?></center></td>
                        <td><center><?php echo $row['ret_position']?></center></td>
                        <td><center><?php echo $row['ret_grade']?></center></td>
                        <td><center><?php echo $row['ret_ppdFileNo']?></center></td>
                        <td><center><?php echo $row['ret_deptFileNo']?></center></td>
                        <td><center><?php echo $row['ret_retAge']?></center></td>
                        <td><center><?php echo $row['ret_retDate']?></center></td>
                        <td><center><?php echo $row['ret_sendDate']?></center></td>
                        <td><center><?php echo $row['ret_sendRefer']?></center></td>
                        <td><center><?php echo $row['ret_recDate']?></center></td>
                        <td><center><?php echo $row['ret_recRefer']?></center></td>
                        <td><center><?php echo $row['ret_notes']?></center></td>
                        <td>
                          <center>
                            <a href="retNew.php?edit=<?php echo $row['ret_staffIC']; ?>" name='edit'>Kemaskini Rekod</a>
                            <br><hr>
                            <a href="retDel.php?del=<?php echo $row['ret_staffIC']; ?>" name='del'>Padam Rekod</i></a>
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
