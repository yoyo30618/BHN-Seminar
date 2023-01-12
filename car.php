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
         <h2>車證狀態</h2>
         <div class="section-line">
          <span></span>
         </div>
         <p>以下為您的車證狀態，如果需要延長期限請到******</p>
		<?php	
		if(isset($_SESSION['BHSislogin']))
		{
			require("conn_mysql.php");
			$sql_query_login="SELECT * FROM MEBER WHERE ID='".$_SESSION['BHSusername']."'";
			$result=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");	
			if ($result->num_rows > 0) 
			{
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
				{	
					if($row[4]=="管理員")
					{
						?>
						<form action="" method="post">
							學號：<input type="text" name="FindID" value="<?php if(isset($_POST['FindID'])) { echo $_POST['FindID']; } ?>">
							<input type="submit" name="submit">
						</form>
						<?php
							$FIND="0";
							if($_POST['FindID']=="")	$FIND="1";
								if($_POST['FindID']!=""){
									$sql_query_Carcheck="SELECT * FROM MEBER WHERE ID='".$_POST['FindID']."'";
									$result2=mysqli_query($db_link,$sql_query_Carcheck) or die("查詢失敗");	
									while ($row2 = mysqli_fetch_array($result2, MYSQLI_BOTH))
									{
										echo "該帳號車證到期日".$row2[5];
										$FIND="1";
										$today = date('Y-m-d') ;
										if(strtotime($row2[5])>strtotime($today))
										{
											echo "<h3 style=\"color:green;\">車證正常使用中</h3>";	
										}	
										else
										{
											echo "<h3 style=\"color:red;\">車證已到期</h3>";	
										}
									}
								}
								if($FIND=="0")
									echo "無此帳號";	
							
							?>
							<br>
						<form action="" method="post">
							欲修改學號：<input type="text" name="FindID" value="<?php if($FIND=="1") { echo $_POST['FindID']; } ?>"><br>
							欲修改日期：<input type="date" name="ChangeDate">
							<input type="submit" name="ChangeDay">
						</form>
						<?php
							if($_POST['FindID']!=""){
								if($FIND=="0")
								{
										echo "無此帳號";
								}
								else
								{
									if($_POST['ChangeDate']!=""){
										$sql_query_Carchange="UPDATE MEBER SET Car =\"".$_POST['ChangeDate']."\" WHERE ID='".$_POST['FindID']."'";
										$result3=mysqli_query($db_link,$sql_query_Carchange) or die("修改失敗");
										echo "車證日期已更新，請重新查詢";
									}
								}
							}
					}
					else
					{?>
						<p>到期日為：<?php echo $row[5];?></p>	
					<?php
						$today = date('Y-m-d') ;
						if(strtotime($row[5])>strtotime($today))
						{
							echo "<h3 style=\"color:green;\">車證正常使用中</h3>";	
						}	
						else
						{
							echo "<h3 style=\"color:red;\">車證已到期</h3>";	
						}
					}
					
				}
			}					
		}
		else
		{	//未登入
			echo "<p>登入後方可查詢車證狀態</p>";
		}
		?>	
        </div>
       </div>
      </div>
     </div>
       </div>
       <div class="col-md-12 col-lg-12 col-xl-6">
        <div class="analysis-content">
         <h2>停車證管理</h2>
         <p>1.辦理身分：<br>
			具本學年度有效學籍之學生(含四年制大學生、博碩生、進修制學生、暑期碩士班學生)。<br>
			2.辦理方式：<br>
			請以班級為單位填妥機踏車申請名冊(如附件)，先向總務處出納組完成繳費後，憑收據至校園安全中心領取停車證。<br>
			3.收費標準：<br>
			(1)上學期申請：機車停車證效期1學年，新台幣100元。<br>
			(2)下學期申請：機車停車證效期0.5學年，新台幣50元。<br>
			(3)腳踏車：免費。
		</p>
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