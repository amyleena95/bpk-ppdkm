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
<style type="text/css">
    ul.breadcrumb {
  padding: 10px 16px;
  list-style: none;
  background-color: #eee;
  }
  ul.breadcrumb li {
    display: inline;
    font-size: 18px;
  }
  ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
  }
  ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
  }
  ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
  }

  * {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
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
            <h2 align="center">Kategori</h2>
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
          <td>
            <h3 align="center">PPD</h3>
            <a href="bpkListPPD.php"><img class="imgmenu" src="img/ppd.png" alt="BPK Daerah"/></a>
          </td>

          <td>
            <h3 align="center">Guru-Guru Besar</h3>
            <a href="bpkListGB.php"><img class="imgmenu" src="img/gb.png" alt="Persaraan"/></a>
          </td>

          <td>
            <h3 align="center">Sekolah</h3>
            <a href="bpkListSchool.php"><img class="imgmenu" src="img/sk.png" alt="Pertukaran"/></a>
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
