<?php 
session_start();

if (!isset($_SESSION['user'])){
  header("Location: login.php");
  die("Redirecting to Login Page.");
}

$thisPage = 'bpkdaerah';

include_once("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sistem Pengurusan BPK</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="header">
    <?php include 'inc/header.php'; ?>
  </div>
   <?php include 'inc/navbar.php';?>
  <br>

  <div class="row">
    <div class="fullcolumn">
      <div class="container">
        <table border="0" align="center">
          <tr>
            <td colspan="3">
              <h2 align="center">BPK Daerah | Pilihan Utama</h2>
            </td>
          </tr>
  		
  		<tr>
            <td colspan="3">
              <?php 
                $sql = "SELECT * FROM bpk";
                
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                $bpkcount = mysqli_num_rows($result);
              ?>
              <h2 align="left">Jumlah Kesuluruhan Buku:               
                <?php echo $bpkcount; ?> buku</h2>
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <h4 align="center"><a href="bpkSummary.php">Lihat Rumusan</h4>
            </td>
          </tr>
  		
          <tr>
            <td>
              <h3 align="center">Tambah Rekod</h3>
              <a href="bpkAddBook.php"><img class="imgmenu" src="img/tambahrekod.png" alt="Tambah Baru"/></a>
            </td>

            <td>
              <h3 align="center">Senarai Buku</h3>
              <a  href="bpkListHome.php"><img class="imgmenu" src="img/senarai.png" alt="Lihat senarai buku"/></a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="footer2">
    <?php include 'inc/footer.php'; ?>
  </div>

</body>
</html>
