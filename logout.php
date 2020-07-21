<?php
		session_start();
		session_unset();
		$_SESSION = array();
		session_destroy();
		session_write_close();
		setcookie(session_name(),'',0,'/');

		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.location = 'login.php?page=home';
        </SCRIPT>");

 ?>
