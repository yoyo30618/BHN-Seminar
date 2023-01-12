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
											{	//為登入
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
		if(isset($_SESSION['BHSislogin'])){//已登入
			$lastname=$_POST[rent_name];
			//echo ("已登入<br>");
			echo '<a href="rent.php">空間借用</a>';
			?>
			<p></p><?php
			$classroom=array("C302","C303","C402");//所有教室
			$col_day=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
			require("conn_mysql.php");
			$sql_query_login="SELECT * FROM MEBER WHERE ID='".$_SESSION['BHSusername']."'";
			$result=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");	
			if ($result->num_rows > 0) 
			{
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
				{	
					if($row[4]=="管理員")//管理員身分已登入
					{
						?>
						<form action="" method="post">
							學號: <input type="test" name="rent_name" size="10" value="<?php if(isset($lastname)) { echo $lastname; } ?>">
							<input type="submit" value="查詢">
						</form>
						<form action="" method="post">
						
						
						<?php
							$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
							//echo $dateTime->format("YmdH"."0000")."<br>";
							if($lastname==""){
								echo "<h3 style=\"color:red;\">請輸入查詢人學號<br></h3>";
							}
							else{
								$sql="SELECT * FROM MEBER WHERE ID='".$lastname."'";
								$sql2=mysqli_query($db_link, $sql);
								$rows=mysqli_num_rows($sql2);
								if($rows=="" or $rows=="0"){
									echo '<h3 style="color:red;">'.$lastname." 使用者尚未註冊!<br></h3>";
								}
								else{
									foreach ($classroom as $it => $class){
										$sql="SELECT * FROM $class WHERE (date >= ".$dateTime->format("YmdH"."0000")." or date = ".$dateTime->format("Ymd"."000000").") and name=".$lastname;
										$sql2=mysqli_query($db_link, $sql) or die("錯誤");
										$rows=mysqli_num_rows($sql2);
										if($rows==""){echo "$class 查無資料<br>";}
										else	    {echo "$class 有".$rows."筆資料<br>";}
										//echo '<td>"sql='.$sql.'<br></td>';
										if($rows>0)
											$haveBorrow=1;//顯示右邊表格
									}
								}
							}
							
					}
					else//使用者身分已登入
					{
						echo '<script language="javascript">alert("'."權限不足!".'")</script>';
						echo "<script  language=\"JavaScript\">location.href=\"rent.php\";</script>";
						echo "權限不足!<br>";
					}
				}
			}					
		}
		else
		{
			echo "未登入<br>";
		}
		?>	
        </div>
       </div>
      </div>
     </div>
	 
       </div>
       <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="analysis-content">
         <!-- <h2></h2> -->
        <p><?php
		if($haveBorrow==1){
			$line=0;//是否顯示table第一欄
			foreach ($classroom as $it => $class){
				$sql="SELECT * FROM $class WHERE (date >= ".$dateTime->format("YmdH"."0000")." or date = ".$dateTime->format("Ymd"."000000").") and name=".$lastname;
				$sql2=mysqli_query($db_link, $sql) or die("錯誤");
				$rows=mysqli_num_rows($sql2);
				//if($rows==""){echo "沒有借用 $class<br>";}
				//else	    {echo "$class 有".$rows."筆資料<br>";}
				//echo '<td>"sql='.$sql.'<br></td>';
				if($rows>0 and $line==0)//顯示表格第一列
				{
					echo'<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
					echo'<tr>';
						echo'<td>教室</td>';
						echo'<td>時間</td>';
						echo'<td></td>';
					echo'</tr><tr>';
					$line++;
				}
				while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH))
				{
					echo '<td>'.$class.'</td>';
					$time = strtotime($row["date"]);//將MySQL的datetime轉換格式
					$temp = date("H", $time);
					$temp = substr(strval("00".($temp+1)%24),-2,2);//轉換時間格式
					$time = date("Y-m-d H:i", $time);
					echo '<td>'.$time."~".$temp.":00".'</td>';
					$time = strtotime($row["date"]);//將MySQL的datetime轉換格式
					$temp = date("YmdHis", $time);
					echo '<td><input type="checkbox" name="'.$class."[]".'"value="'.$temp.'"></td>';
					echo '<tr></tr>';
				}
			}
			if($line==1)
			{
				echo "</table>";
				echo '<br><center><input type="submit" value="取消借用"></center>';
			}
			$java=0;
			foreach ($classroom as $it => $room)//執行取消借用
			{
				if(isset($_POST[$room]))
				{
					$java=1;
					$check=$_POST[$room];
					foreach($check as $value)
					{
						echo "value=".$value."<br>";
						$time=$value;
						$sql="DELETE FROM ".$room." WHERE date =".$time;
						echo "$sql<br>";
						$sql2=mysqli_query($db_link, $sql) or die("錯誤");
						$hr=substr($value,-6,2);
						$hr = substr(strval("00".($hr%24)),-2,2);
						$time = strtotime($value);
						$time = date("Y/m/d",$time);
						if($sql2){
							$reply.=$time." ".$hr.":00"." ~ ".($hr+1).":00 取消借用".'\n';
						}
						else{
							$reply.=$time." ".$hr.":00"." ~ ".($hr+1).":00 取消借用失敗".'\n';
						}
						//echo $time." ".$hr.":00"." ~ ".($hr+1).":00<br>";
						//echo $reply;
					}
				}
			}
			if($java==1){
				echo '<script language="javascript">alert("'."$reply".'")</script>';
				echo "<script  language=\"JavaScript\">location.href=\"inquireID.php\";</script>";
			}
		}
		?>
		<input type="hidden" name="rent_name" value=<?php echo"\"$lastname\"";?>>
		</form>
		
		
		</p>
		</p>
        </div>
       </div>
      </div>
     </div>
    </section>
	<section class="project-area">
     <div class="container-fluid">
      <div class="row grid">
	  
       <div class="col-md-6 col-lg-3">
        <div class="grid-item mouse-move">
         <a href="#"><img src="img/projects/1.png" alt="Project" /></a>
         <div class="grid-hover">
          <h3>還沒想到放什麼</h3>
          <span>還沒想到放什麼</span>
         </div>
         <div class="grid-hover-link">
          <a href="#"><span class="flaticon-unlink"></span></a>
          <a class="venobox vbox-item" data-gall="myGallery" data-title="Local SEO Marketing" href="img/projects/1.jpg"><span class="flaticon-thin-expand-arrows"></span></a>
         </div>
        </div>
       </div>
       <div class="col-md-6 col-lg-3">
        <div class="grid-item mouse-move">
         <a href="#"><img src="img/projects/2.png" alt="Project" /></a>
         <div class="grid-hover">
          <h3>還沒想到放什麼</h3>
          <span>還沒想到放什麼</span>
         </div>
         <div class="grid-hover-link">
          <a href="#"><span class="flaticon-unlink"></span></a>
          <a class="venobox vbox-item" data-gall="myGallery" data-title="Local SEO Marketing" href="img/projects/2.jpg"><span class="flaticon-thin-expand-arrows"></span></a>
         </div>
        </div>
       </div>
       <div class="col-md-6 col-lg-3">
        <div class="grid-item mouse-move">
         <a href="#"><img src="img/projects/3.png" alt="Project" /></a>
         <div class="grid-hover">
          <h3>還沒想到放什麼</h3>
          <span>還沒想到放什麼</span>
         </div>
         <div class="grid-hover-link">
          <a href="#"><span class="flaticon-unlink"></span></a>
          <a class="venobox vbox-item" data-gall="myGallery" data-title="Local SEO Marketing" href="img/projects/3.jpg"><span class="flaticon-thin-expand-arrows"></span></a>
         </div>
        </div>
       </div>
       <div class="col-md-6 col-lg-3">
        <div class="grid-item mouse-move">
         <a href="#"><img src="img/projects/4.png" alt="Project" /></a>
         <div class="grid-hover">
          <h3>還沒想到放什麼</h3>
          <span>還沒想到放什麼</span>
         </div>
         <div class="grid-hover-link">
          <a href="#"><span class="flaticon-unlink"></span></a>
          <a class="venobox vbox-item" data-gall="myGallery" data-title="Local SEO Marketing" href="img/projects/4.jpg"><span class="flaticon-thin-expand-arrows"></span></a>
         </div>
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