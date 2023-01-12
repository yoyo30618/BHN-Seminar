<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	if(isset($_POST['login']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$check="0";
		require("conn_mysql.php");
		$sql_query_login="SELECT * FROM MEBER where ID='$username'";
		$result1=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");
		while($row=mysqli_fetch_array($result1))
		{
			if($row[6]==$password)
			{
				if($row[7]=="正常使用中")
					$check="1";
				else if($row[7]=="審核中")
					$check="2";
				else
					$check="-1";
			}
		}
		if(($username=='')||($password==''))
		{
			echo"<script  language=\"JavaScript\">alert('使用者名稱或密碼不能為空');location.href=\"login.php\";</script>";
			//header('refresh:3;url=login.php');
			//echo "使用者名稱或密碼不能為空,3秒後跳轉到登入頁面";
			//exit;
		}
		else if(($check=="1"))
		{
			//登入成功將資訊儲存到session中
			$_SESSION['BHSusername']=$username;
			$_SESSION['BHSislogin']=1;
			//如果勾選7天內自動儲存,則將其儲存到cookie
			if($_POST['remember']=="yes")
			{
				setcookie("BHSusername",$username,time()+7*24*60*60);
				setcookie("BHScode",md5($username.md5($password)),time()+7*24*60*60);
			}
			else
			{
				setcookie("BHSusername",$username);
				setcookie("BHScode",md5($username.md5($password)));
			}
			//跳轉到使用者首頁
			header('refresh:1;url=index.php');
		}
		else if(($check=="2"))
		{
			//使用者名稱或密碼錯誤
			echo"<script  language=\"JavaScript\">alert('此帳號仍在申請中，請持學生證至XXX綁定卡號');location.href=\"login.php\";</script>";
			//header('refresh:3;url=login.php');
			//echo "<br>";
			//echo "帳號停權中，請洽管理員";
			//exit;
		}
		else if(($check=="-1"))
		{
			//使用者名稱或密碼錯誤
			echo"<script  language=\"JavaScript\">alert('帳號停權中，請洽管理員');location.href=\"about.php\";</script>";
			//header('refresh:3;url=login.php');
			//echo "<br>";
			//echo "帳號停權中，請洽管理員";
			//exit;
		}
		else
		{
			//使用者名稱或密碼錯誤
			echo"<script  language=\"JavaScript\">alert('使用者名稱或密碼錯誤');location.href=\"login.php\";</script>";
			//header('refresh:3;url=login.php');
			//echo "<br>";
			//echo "使用者名稱或密碼錯誤,3秒後跳轉到登入頁面";
			//exit;
		}
		
		
	}
?>