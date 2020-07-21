<!-- php script to handle login: start -->
<?php
 include_once("connection.php");

 //login user
 if(isset($_POST['login']))
{

     $username=mysqli_real_escape_string($myConnection, $_POST['usr_username']);
     $password = mysqli_real_escape_string($myConnection, $_POST['usr_password']);

     $sql = "SELECT * FROM `user` WHERE `usr_username` = '$username' AND `usr_password` = '$password'";
     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
     $row = mysqli_fetch_array($res);
     $status = $row['usr_status'];


     if (mysqli_num_rows($res)==0) {

           echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Wrong username or password')
          window.location = 'login.php?page=LoginFail';
          </SCRIPT>");

     } else {

        session_start();
        $_SESSION['user'] = $row['usr_username'];
        $_SESSION['UserID'] = $row['user_id'];
        $_SESSION['role'] = $row['usr_role'];

        $user = $_SESSION['user'];

        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location = 'index.php';
        </SCRIPT>");
    }
}
?> <!-- php script to handle login: end -->

<!DOCTYPE html>
<html>
	<head>
    <title> Log Masuk</title>

    <!-- css library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- javascript library -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>

	<body>
    <div class="header">
      <?php include 'inc/header.php'; ?>
    </div>
    <br>
    <div class="row">
      <div class="container">
        <h4 align='center'>Sila log masuk untuk menggunakan sistem. </h4>
        <table border="0" align="center">
        <form method="POST" action="login.php">
          <tr>
            <td colspan="2"><h2 align="center">Log Masuk </h2></td>
          </tr>
          <tr>
            <td>Nama Pengguna : </td>
            <td><input type="text" name="usr_username" placeholder="Masukkan Nama Pengguna" autocomplete="off" size="30" required></td>
          </tr>
          <tr>
            <td>Kata Laluan : </td>
            <td><input type="password" name="usr_password" placeholder="Masukkan Kata Laluan" size="30" required></td>
          </tr>
          <tr>
            <td colspan="2"> <center><input type="submit" name="login" value="Login" class="btnSubmit"></center></td>
          </tr>
        </form>
      </table>
      </div>
    </div>
  </body>
</html>