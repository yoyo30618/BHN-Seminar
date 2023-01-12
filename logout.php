<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	//清除session
	$username=$_SESSION['BHSusername'];
	$_SESSION=array();
	session_destroy();
	//清除cookie
	setcookie("BHSusername",'',time()-1);
	setcookie("BHScode",'',time()-1);
	header("Location:/BHN-Seminar"); 
	//確保重定向後,後續程式碼不會被執行 

	exit;
?>