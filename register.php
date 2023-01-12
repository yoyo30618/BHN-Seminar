<?php
function sendmail($mailaddress,$sub,$mes)
{
	require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
	require '/usr/share/php/libphp-phpmailer/class.smtp.php';
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->setFrom('BHN');
	$mail->addAddress($mailaddress);
	$mail->Subject = $sub;
	$mail->Body = $mes;
	$mail->IsSMTP();
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'ssl://smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Port = 465;
	$mail->Username = 'algolab.nttucsie@gmail.com';
	$mail->Password = 'nttucsiesec512!';
	if(!$mail->send()) {
	  echo 'Email is not sent.';
	  echo 'Email error: ' . $mail->ErrorInfo;
	} else {
	  echo 'Email has been sent.';
	}
}
session_start(); 
	$con=@mysqli_connect("127.0.0.1","BHN-Seminar","nttucsie")or die;
	mysqli_query($con,"SET NAMES utf8");
	$seldb=mysqli_select_db($con,"RFID")or die("connection failed");
	$username=trim($_POST['ID']);
	$name=trim($_POST['name']);
	$mail=trim($_POST['mail']);
	$phone=trim($_POST['phone']);
	$userpwd=trim($_POST['pw']);
	$userpwd2=trim($_POST['pw2']);
	$CarID=trim($_POST['CarID']);
	$check=0;
	if($username=="")
		$check=1;
	if($name=="")
		$check=1;
	if($mail=="")
		$check=1;
	if($phone=="")
		$check=1;
	if($userpwd=="")
		$check=1;
	if($check==1)
		echo"<script language=\"JavaScript\">alert('尚有資料未填寫，請重新輸入');location.href=\"redgister.php\";</script>";
	if($userpwd!=$userpwd2)
		echo"<script language=\"JavaScript\">alert('密碼與密碼確認不相符，請重新輸入');location.href=\"redgister.php\";</script>";
	else
	{
		$sql="SELECT * FROM MEBER WHERE ID='$username'";
		$result=mysqli_query($con,$sql);
		$temp=0;
		while($row1=mysqli_fetch_array($result))
		{
			if($row1[7]=="審核中")	
			{	
				echo"<script language=\"JavaScript\">alert('此帳號仍在申請中，請持學生證至XXX綁定卡號');location.href=\"redgister.php\";</script>";
				$temp=1;
				break;
			}
			if($row1[7]=="正常使用中")	
			{	
				echo"<script language=\"JavaScript\">alert('此帳號已被註冊，請重新輸入');location.href=\"redgister.php\";</script>";
				$temp=1;
				break;
			}
		}
		if($temp==0)
		{
			$sql="INSERT INTO `MEBER`(`ID`, `CardID`,`Phone`, `Amount`, `Permission`,`CardPassword`, `Status`, `Notice`,`Name`) VALUES (\"".$username."\",\"".$CarID."\",\"".$phone."\",\"0\",\"學生\",\"".$userpwd."\",\"正常使用中\",\"".$mail."\",\"".$name."\")";
			$result=mysqli_query($con,$sql)or die("failed");
			sendmail($mail,"東大便利GO註冊申請成功","感謝你註冊東大便利GO，等吧");
			echo"<script language=\"JavaScript\">alert('註冊完成！請持學生證至XXX綁定卡號，方可開始使用本系統');location.href=\"redgister.php\";</script>";
		}
	}
	mysqli_close ( $con );
?>
