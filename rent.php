<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>東大GO便利</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<!-- all css here -->
	<!-- bootstrap v4.1.3 css -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- font-awesome css -->
	<link rel="stylesheet" href="css/fontawesome.min.css" />
	<!-- flaticon css -->
	<link rel="stylesheet" href="css/flaticon.css" />
	<!-- selectize css -->
	<link rel="stylesheet" href="css/selectize.css" />
	<!-- owl-carousel css -->
	<link rel="stylesheet" href="css/owl.carousel.min.css" />
	<link rel="stylesheet" href="css/owl.theme.default.min.css" />
	<!-- animate css -->
	<link rel="stylesheet" href="css/animate.min.css" />
	<!-- venobox css -->
	<link rel="stylesheet" href="css/venobox.css" />
	<!-- style css -->
	<link rel="stylesheet" href="style.css" />
	<!-- modernizr js -->
	<script src="js/vendor/modernizr-custom.js"></script>
	<!--[if lt IE 9]><script src="../../oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="../../oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		<style type="text/css">
		ul li{margin:0;padding:0;}
		form{margin:40px 30px 0;}
		form li{list-style:none;padding:5px 0;}
		form li label{float:left;width:70px;text-align:right}
		form li a{font-size:12px;color:#999;text-decoration:none}
		.login_btn{border:none;background:#01A4F1;color:#fff;font-size:14px;font-weight:bold;height:28px;line-height:28px;padding:0 10px;cursor:pointer;}
		form li img{vertical-align:top}
	</style>
</head>
<body>

	<div class="wrapper-content">
		<div class="wrapper">
		<!-- Start Header Area -->
			<header class="header">
				<div class="header-top-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="header-top">
									<div class="certified-text">
										<span><a href="index.php">東大GO便利</a></span>
									</div>
									<div class="tag-text">
										<span>自動東大、方便逼卡、安全保障、真D超棒</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-bottom">
					<div class="container">
						<div class="row">
							<div class="header-info">
								<!-- Start Navigation -->
								<nav class="navbar navbar-expand-lg navbar-dark">
								<a href="index.php"><img src="img/logo/logo.png" alt="logo" width="70" height="70"/></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
								<div class="collapse navbar-collapse" id="navbarNav">
									<ul class="navbar-nav">
										<?php
											header("Content-Type:text/html;charset=utf-8");
											session_start();
											//首先判斷Cookie是否有記住使用者資訊
											if(isset($_COOKIE['BHSusername']))
											{
												$_SESSION['BHSusername']=$_COOKIE['BHSusername'];
												$_SESSION['BHSislogin']=1;
											}
										?>
										<li class="nav-item active"><a class="nav-link" href="index.php">首頁</a></li>
										<li class="nav-item">
										<?php
											if(isset($_SESSION['BHSislogin']))
												echo "<a class=\"nav-link\" href=\"personal.php\">個人頁面</a>";
										?>
										</li>
										<li class="nav-item"><a class="nav-link" href="shop.php">儲值扣款</a></li>
										<li class="nav-item"><a class="nav-link" href="rent.php">空間借用</a></li>
										<li class="nav-item"><a class="nav-link" href="car.php">停車證管理</a></li>
										<li class="nav-item"><a class="nav-link" href="about.php">關於我們</a></li>
										<li class="nav-item">
										<div class="login-btn">
										<?php
											if(isset($_SESSION['BHSislogin']))
											{
												//已經登入
												echo "<a class=\"btn\" href=\"logout.php\">".$_COOKIE['BHSusername']." 登出</a>";
											}
											else
											{	//未登入
												echo "<a class=\"btn\" href=\"login.php\">登入</a>";
											}
										?>
											<!--<a class="btn" href="#">登入</a>-->
										</div></li>
									</ul>
								</div>
								</nav>
								<!-- End Navigation -->
							</div>
						</div>
					</div>
				</div>
			</header>
    <!-- End Header Area -->
    <!-- Start Analysis Area -->
    <section class="intro-area">
     <div class="container">
      <div class="row">
       <div class="col-md-12 col-lg-12 col-xl-6">
	   
	   
<div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="section-title">
         <h2>空間借用</h2>
         <div class="section-line">
          <span></span>
         </div>
        
		<?php	
		//之後del
		ini_set('display_errors', 0);
		//之後del
		if(isset($_SESSION['BHSislogin'])){//已登入
			//echo ("已登入<br>");
			$lastclass=$_POST['class'];
			$lastSelectDate=$_POST[SelectDate];
			//--------------上下一週+-7天(START)--------------
			$dateTime = new DateTime("$lastSelectDate");
			if(isset($_POST['lastWeek'])) { 
				$dateTime->modify('-7 day');
			} 
			if(isset($_POST['nextWeek'])) { 
				$dateTime->modify('+7 day');
			}
			$lastSelectDate=$dateTime->format("Y/m/d");
			//--------------上下一週+-7天(END)--------------
			$classroom=array("C302","C303","C402");//所有教室
			//echo '<a href="rent.php">空間借用</a>';
			require("conn_mysql.php");
			$sql_query_login="SELECT * FROM MEBER WHERE ID='".$_SESSION['BHSusername']."'";
			$result=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");	
			if ($result->num_rows > 0) 
			{
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
				{
					if($row[4]=="管理員")//管理員登入
					{
						echo '<a href="inquireID.php">使用者借用查詢<br></a>';
						echo '<a href="inquire.php">以日為單位</a>';
						//echo '<input type="button" value="以日為單位" onclick="location.href='."'inquire.php'".'">'."<br>";
						?><form action="" method="post">
							管理員身分已登入<br><?php
							//日期選單Star
							if($lastSelectDate!="")
								echo '請選擇查詢日期:<input type="date" name="SelectDate"  value="'.$dateTime->format("Y/m/d").'">';//填寫預設
							else
								echo '請選擇查詢日期:<input type="date" name="SelectDate">';
							//日期選單End & 下拉式選單Star
							echo "<select name='class'>";
								foreach ($classroom as $it => $value){
									if($value==$lastclass){
										echo "<option selected value="."$value"." >"."$value"."</option>";
									}
									else{
										echo "<option value="."$value"." >"."$value"."</option>";
									}
								}
							echo "</select>";
							//下拉式選單End
							echo '<input type="submit" value="查詢"><br>';
						?></form><?php
						if($lastclass==""){echo("<h3 style=\"color:red;\">請選擇教室</h3>");}
						else{$outputTable=1;}
					}
					else//使用者登入
					{
						echo '<a href="inquire.php">查詢空間借用</a>';
						?><form action="" method="post">
							使用者身分已登入<br><?php
							//日期選單Star
							//if($lastSelectDate!="")
							//	echo '請選擇查詢日期:<input type="date" name="SelectDate"  value="'.$dateTime->format("Y/m/d").'">';//填寫預設
							//else
							//	echo '請選擇查詢日期:<input type="date" name="SelectDate">';
							
							//日期選單End & 下拉式選單Star
							echo "<select name='class'>";
								foreach ($classroom as $it => $value){
									if($value==$lastclass){
										echo "<option selected value="."$value"." >"."$value"."</option>";
									}
									else
									{
										echo "<option value="."$value"." >"."$value"."</option>";
									}
								}
							echo "</select>";
							//下拉式選單End
							echo '<input type="submit" value="查詢"><br>';
						?></form><?php
						if($lastclass==""){echo("<h3 style=\"color:red;\">請選擇教室</h3>");}
						else{$outputTable=2;}
					}
				}
			}					
		}
		else
		{?>
			未登入<br>
		<?php
		}
		?>	
        </div>
       </div>
      </div>
     </div>
	 
       </div>
       <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="analysis-content">
        <?php
		if($outputTable==1){//管理者TableOutput
			$sql = 'SHOW TABLES LIKE "'.$_POST['class'].'"';
			$sql2=mysqli_query($db_link, $sql) or die("請選擇教室");
			$rows=mysqli_num_rows($sql2);
			if($rows==""){echo"找不到教室!";}
			else 
			{
			?>
				<form action="" method="post">
					<!-- -----------上下一週按鈕START----------- -->
					<input type="hidden" name="SelectDate" value=<?php echo"\"$lastSelectDate\"";?>>
					<input type="hidden" name="class" value=<?php echo"\"$lastclass\"";?>>
					<center><input type="submit" name="lastWeek" value="上一週">
					<input type="hidden" name="SelectDate" value=<?php echo"\"$lastSelectDate\"";?>>
					<input type="hidden" name="class" value=<?php echo"\"$lastclass\"";?>>
					<input type="submit" name="nextWeek" value="下一週"></center>
					<!-- -----------上下一週按鈕END----------- -->
				</form>
				<?php
				/*$dateTime = strtotime($lastSelectDate);//將MySQL的datetime轉換格式
				$dateTime = new DateTime('$lastSelectDate');
				$date = new DateTime('2000-12-31');
				$dateTime = new DateTime("$dateTime", new DateTimeZone('Asia/Taipei'));*/
				//$date = new DateTime('2000-12-31');
				/*$date = new DateTime("$lastSelectDate");
				$date->modify('+1 month');
				echo $date->format('Y-m-d') . "<br>";
				$date->modify('+2 month');
				echo $date->format('Y-m-d') . "<br>";*/
				?>
				<form action="" method="post">
					<table width="100%" border="5" style="text-align:center;word-break:break-all;table-layout:fixed;">
						<tr>
						<td></td><?php
						for($i=0;$i<7;$i++)//顯示日期
						{
							//$dateTime = new DateTime("$lastSelectDate");
							$dateTime->modify('+'.$i.' day');
							echo'<td>'.$dateTime->format("m/d")."<br>".$dateTime->format("(D)").'</td>';
						}?>
						</tr><tr>
						<?php
						for($col=18;$col<25;$col++)//顯示時段
						{
							echo sprintf("<td>%02d:00~%02d:00</td>", $col%24, (($col+1)%24));
							for($i=0;$i<7;$i++)
							{
								$dateTime = new DateTime("$lastSelectDate");
								$dateTime->modify('+'.$i.' day');
								$hr = substr(strval("00".($col%24)),-2,2);//轉換時間格式
								$sql="select * from ".$lastclass." where date = ".$dateTime->format("Ymd").$hr."0000";
								$sql2=mysqli_query($db_link, $sql);
								$rows=mysqli_num_rows($sql2);
								if($rows!="")//有人借用(可刪除)
								{
									while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH))
									{	
										echo '<td>'."<font color=.'green'.>$row[name]";
										echo '<br><input type="checkbox" name="'.$dateTime->format("D")."[]".'"value="'."del".$dateTime->format("Ymd").$hr."00".'"></td>';
									}
								}
								else//沒人借用(可新增)
								{
									echo '<td><br><input type="checkbox" name="'.$dateTime->format("D")."[]".'"value="'."add".$dateTime->format("Ymd").$hr."00".'"></td>';
								}
							}
							echo'</tr><tr>';
						}?>
					</table>
					<br><center>借用人學號: <input type="test" name="rent_name">
					<input type="hidden" name="SelectDate" value=<?php echo"\"$lastSelectDate\"";?>>
					<input type="hidden" name="class" value=<?php echo"\"$lastclass\"";?>>
					<input type="submit" value="變更"></center>
				</form>
				<?php
				$java=0;
				if($_POST[rent_name]=="")
				{
					echo "<center><h3 style=\"color:red;\">請加上借用人學號</h3></center>";
					$rent_name="請加上借用人學號";
				}
				else
				{
					$sql="SELECT * FROM MEBER WHERE ID='".$_POST['rent_name']."'";
					$sql2=mysqli_query($db_link, $sql);
					$rows=mysqli_num_rows($sql2);
					if($rows=="" or $rows=="0"){
						echo '<center><h3 style="color:red;">'.$_POST['rent_name']." 使用者尚未註冊!<br></h3></center>";
					}
					else{
						$rent_name=$_POST['rent_name'];
						$sql='SELECT CardID FROM MEBER WHERE ID="'.$rent_name.'"';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
							$cardID = $row['CardID'];
						}
					}
				}
				for($i=0;$i<7;$i++){
					$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
					$dateTime->modify('+'.$i.' day');
					$check=$_POST[$dateTime->format(D)];//表單打勾的部分
					foreach($check as $value){
						//echo "$value<br>";
						$cmd=substr($value,0,3);//看是要刪除還是新增
						$value=substr($value,3);
						$hr=substr($value,-4,2);
						$hr = substr(strval("00".($hr%24)),-2,2);//轉換時間格式
						if($cmd=="del" and $rent_name==$_POST['rent_name'])//修改借用
						{
							$java=1;
							$sql="UPDATE ".$lastclass.' SET name="'.$rent_name.'", CardID="'.$cardID.'" WHERE date ='.$value."00";
							//echo "$sql<br>";
							$sql2=mysqli_query($db_link, $sql) or die("錯誤");
							if($sql2){
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 修改借用".'\n';
							}
							else{
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 修改借用失敗".'\n';
							}
						}
						else if($cmd=="del")//刪除借用
						{
							$java=1;
							$sql="DELETE FROM ".$lastclass." WHERE date =".$value."00";
							echo "$sql<br>";
							$sql2=mysqli_query($db_link, $sql) or die("錯誤");
							if($sql2){
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 取消借用".'\n';
							}
							else{
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 取消借用失敗".'\n';
							}
						}
						else if($cmd=="add" and $rent_name==$_POST['rent_name'])//新增借用
						{
							$java=1;
							$sql="INSERT INTO ".$lastclass."(date, day, name, purpose, CardID) VALUES(".$value."00, '".$dateTime->format("D")."', '".$_POST[rent_name]."', 'administrator', ".'"'.$cardID.'")';
							//echo "$sql<br>";
							$sql2=mysqli_query($db_link, $sql) or die("Error");
							if($sql2){
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 借用成功".'\n';
							}
							else{
								$reply.=$dateTime->format("Y/m/d")." ".$hr.":00"." ~ ".($hr+1).":00 借用失敗".'\n';
							}
						}
						//echo $reply;
					}
				}
				if($java==1){
					echo '<script language="javascript">alert("'."$reply".'")</script>';
					echo "<script  language=\"JavaScript\">location.href=\"rent.php\";</script>";
				}
			}
		}
		else if($outputTable==2){//使用者TableOutput
			$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
			if($lastclass==""){echo("<h3 style=\"color:red;\">請選擇教室</h3>");}
			else{
		?>
				<form action="" method="post">
				<table width="100%" border="5" style="text-align:center;word-break: break-all;">
					<tr>
					<td></td><?php
					for($i=0;$i<7;$i++)
					{
						$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
						$dateTime->modify('+'.$i.' day');
						echo'<td>'.$dateTime->format("m/d")."<br>".$dateTime->format("(D)").'</td>';
					}?>
					</tr><tr>
					<?php
					for($col=18;$col<25;$col++)
					{	
						echo sprintf("<td>%02d:00~%02d:00</td>", $col%24, (($col+1)%24));
						for($i=0;$i<7;$i++)
						{
							$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
							$dateTime->modify('+'.$i.' day');
							$hr = substr(strval("00".($col%24)),-2,2);//轉換時間格式
							$sql="SELECT * FROM ".$lastclass." WHERE date=".$dateTime->format("Ymd").$hr."0000";
							//echo "$sql<br>";
							$sql2=mysqli_query($db_link, $sql);
							$rows=mysqli_num_rows($sql2);
							$sql="SELECT * FROM ".$lastclass." WHERE date=".$dateTime->format("Ymd").$hr."0000 and name=".$_SESSION['BHSusername'];
							//echo "$sql<br>";
							$sql2=mysqli_query($db_link, $sql);
							$user_rows=mysqli_num_rows($sql2);
							if($user_rows!=""){echo"<td><font color=.'green'.>已預約</td>";}
							else if($rows!=""){echo"<td>被預約</td>";}
							else{echo '<td><input type="checkbox" name="'.$dateTime->format("D")."[]".'"value="'.$hr.'"></td>';}
						}
						echo'</tr><tr>';
					}
					?>
				</table>
				<br><center>借用目的: <input type="test" name="purpose">
				<input type="hidden" name="SelectDate" value=<?php echo"\"$lastSelectDate\"";?>>
				<input type="hidden" name="class" value=<?php echo"\"$lastclass\"";?>>
				<input type="submit"></center>
				</form><?php
				$total=0;
				$already=0;
				for($i=0;$i<7;$i++){//統計要借用的總時間
					$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
					$dateTime->modify('+'.$i.' day');
					$check=$_POST[$dateTime->format(D)];
					foreach($check as $value){
						$total++;
					}
				}
				$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
				foreach ($classroom as $it => $value){//統計已借用的總時間
					$sql="SELECT * FROM $value WHERE (date >= ".$dateTime->format("YmdH"."0000")." or date = ".$dateTime->format("Ymd"."000000").") and name=".$_SESSION['BHSusername'];
					$sql2=mysqli_query($db_link, $sql);
					$rows=mysqli_num_rows($sql2);
					if($rows!="")
					{
						/*while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
							echo "$row[date]<br>";
						}*/
						$already+=$rows;
						$total+=$rows;
					}
				}
				//echo "已借用:$already<br>總共:$total<br>";
				if($total>4){//判斷是否可借的
					echo "<center><h3 style=\"color:red;\">借用失敗<br>最大借用時間為4小時<br> 你已借用".$already."小時，無法再借用".($total-$already)."小時</h3></center>";	
					//echo "<center><h3 style=\"color:red;\">借用失敗<br>最大借用時間為4小時<br> 你已借用".$already."小時</h3></center>";	
				}
				else if($total<=4){
					$java=0;
					for($i=0;$i<7;$i++){
						$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
						$dateTime->modify('+'.$i.' day');
						$check=$_POST[$dateTime->format(D)];//有勾選的項目
						foreach($check as $value){
							if($_POST[purpose]=="")
							{
								echo "<center><h3 style=\"color:red;\">請加上借用目的</h3></center>";
							}
							else
							{
								$java=1;
								$sql='SELECT CardID FROM MEBER WHERE ID="'.$_SESSION['BHSusername'].'"';
								echo "$sql<br>";
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
									$cardID = $row['CardID'];
								}
								//$sql="INSERT INTO ".$lastclass."(date, day, name, purpose, CardID) VALUES(".$dateTime->format("Ymd").$value."0000".", '".$dateTime->format("D")."', ".$_SESSION['BHSusername'].", '".$_POST[purpose]."')";
								$sql="INSERT INTO ".$lastclass."(date, day, name, purpose, CardID) VALUES(".$dateTime->format("Ymd").$value."0000".", '".$dateTime->format("D")."', '".$_SESSION['BHSusername']."', '".$_POST[purpose]."', '".$cardID."')";
								//echo($sql."<br>");
								$sql2=mysqli_query($db_link, $sql);
								if($sql2)
									$reply.=$dateTime->format("Y/m/d")." ".$value.":00"." ~ ".($value+1).":00 借用成功".'\n';
								else
									$reply.=$dateTime->format("Y/m/d")." ".$value.":00"." ~ ".($value+1).":00 借用失敗".'\n';
							}
						}
					}
					if($java==1){
						echo '<script language="javascript">alert("'."$reply".'")</script>';
						echo "<script  language=\"JavaScript\">location.href=\"rent.php\";</script>";
					}
				}
			}
		}
		?>
        </div>
       </div>
      </div>
     </div>
    </section>
    <!-- End Analysis Area -->
    <!-- Start Client Logo Area -->
    <div class="client-log-area section-padding">
     <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="client-logo-slider owl-carousel owl-theme">
         <div class="client-logo-single">
          <a href="car.php">停車證管理</a>
         </div>
         <div class="client-logo-single">
          <a href="shop.php" >儲值扣款</a>
         </div>
         <div class="client-logo-single">
          <a href="rent.php" >空間借用</a>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
    <!-- End Client Logo Area -->
    <!-- Start Footer Area -->
    <footer class="footer-area">
     <div class="footer-top">
      <div class="container">
       <div class="row">
        <div class="col-md-6 col-lg-3">
         <div class="footer-info">
          <div class="footer-logo">
           <a href="index.php"><img src="img/logo/logo.png" alt="logo" width="70" height="70"/></a>
          </div>
          <!-- <p>自動東大<br>方便逼卡<br>安全保障<br>真的超棒<br></p>-->
          <div class="call-us">
           <h5>聯絡熊熊 <a href="">(09) 70998902</a></h5>
          </div>
         </div>
        </div>
        <div class="col-md-6 col-lg-5">
         <div class="footer-info">
          <h4><p>自動東大，方便逼卡，安全保障，真的超棒。<br></p></h4>
         </div>
        </div>
		
       </div>
      </div>
     </div>
     <div class="footer-bottom">
      <div class="container">
       <div class="row">
        <div class="col-md-12">
         <div class="footer-bottom-content">
          <p>Copyright &copy; 2020.Company name All rights reserved.熊豪恩</p>
         </div>
        </div>
       </div>
      </div>
     </div>
     <!-- Start Back To Top Area -->
     <div class="back-to-top">
      <span>回到頁首</span>
     </div>
     <!-- End Back To Top Area -->
    </footer>
    <!-- End Footer Area -->
   </div>
  </div>
  <!-- Start Custom Cursor -->
  <div class="custom-cursor">
   <div id="cursor">
    <div id="cursor-ball"></div>
   </div>
  </div>
  <!-- End Custom Cursor -->
  <!-- all js here -->
  <!-- jquery version -->
  <script src="js/jquery-3.1.1.min.js"></script>
  <!-- popper js -->
  <script src="js/popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- selectize -->
  <script src="js/selectize.js"></script>
  <!-- icheck -->
  <script src="js/icheck.min.js"></script>
  <!-- owl.carousel js -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- appear js -->
  <script src="js/jquery.appear.js"></script>
  <!-- easing js -->
  <script src="js/jquery.easing.1.3.min.js"></script>
  <!-- venobox js -->
  <script src="js/venobox.min.js"></script>
  <!-- countTo js -->
  <script src="js/jquery.countTo.js"></script>
  <!-- wow js -->
  <script src="js/wow.min.js"></script>
  <!-- loadMoreResults js -->
  <script src="js/loadMoreResults.js"></script>
  <!-- TweenMax js -->
  <script src="js/TweenMax.js"></script>
  <!-- main js -->
  <script src="js/main.js"></script> 
 </body>
</html>