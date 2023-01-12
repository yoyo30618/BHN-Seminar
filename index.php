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
    <!-- Strat Welcome Area -->
	<section class="intro-area">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="service-single">
						<div class="service-icon">
							<img src="img/services/1.png" alt="Service" />
						</div>
						<h3>儲值扣款</h3>
						<p align="left">將與臺東大學多家學生餐廳合作，新增校內餐廳儲值以及付款功能，帶給使用者更便利的體驗。</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="service-single">
						<div class="service-icon">
							<img src="img/services/2.png" alt="Service" />
						</div>
						<h3>空間借用</h3>
						<p align="left">參照圖書館空間借閱模式，利用學生證進行教室借閱，以節省鑰匙的維護，使教室的借用更為自動且方便。</p>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="service-single">
						<div class="service-icon">
							<img src="img/services/3.png" alt="Service" />
						</div>
						<h3>停車證管理</h3>
						<p align="left">藉由汽機車進出正門或側門時，	透過學生證感應的方式，可以記錄學生是否有繳納停車費，幫助學校管理以及統整。</p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- End Welcome Area -->
    <!-- Start Analysis Area -->
    <section class="analysis-area section-padding">
     <div class="container">
      <div class="row">
       <div class="col-md-12 col-lg-12 col-xl-6">
	   
<div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="section-title">
         <h2>合作店家</h2>
         <div class="section-line">
          <span></span>
         </div>
         <p>東大GO便利系統結合了儲值與扣款功能，並將邀請校內各家學生餐廳共同合作，以下為共同合作之店家。</p>
        </div>
       </div>
      </div><!--
      <div class="row">
       <div class="col-md-12">
        <div class="blog-slider owl-carousel owl-theme">
         <div class="single-news">
          <figure>
           <img src="img/blog/1.jpg" alt="news" />
          </figure>
          <div class="blog-content">
           <h4><a href="#">The Superfood Gold Rush</a></h4>
           <ul class="blog-meta list-style">
            <li><a href="#"><i class="far fa-user"></i>Eula Wolff</a></li>
            <li><a href="#"><i class="far fa-calendar-alt"></i>27 August 2018</a></li>
           </ul>
          </div>
         </div>
         <div class="single-news">
          <figure>
           <img src="img/blog/2.jpg" alt="Img" />
          </figure>
          <div class="blog-content">
           <h4><a href="#">Let’s Talk About seo</a></h4>
           <ul class="blog-meta list-style">
            <li><a href="#"><i class="far fa-user"></i>Javon Borer</a></li>
            <li><a href="#"><i class="far fa-calendar-alt"></i>28 August 2018</a></li>
           </ul>
          </div>
         </div>
         <div class="single-news">
          <figure>
           <img src="img/blog/3.jpg" alt="Img" />
          </figure>
          <div class="blog-content">
           <h4><a href="#">Our Australian Expansion</a></h4>
           <ul class="blog-meta list-style">
            <li><a href="#"><i class="far fa-user"></i>Pierce Blick</a></li>
            <li><a href="#"><i class="far fa-calendar-alt"></i>27 August 2018</a></li>
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>-->
     </div>
       </div>
			<?php
				require("conn_mysql.php");
				$sql_query_user="SELECT  count(if(`Permission`='學生',1,null) )FROM `MEBER`";
				$sql_query_admin="SELECT  count(if(`Permission`='管理員',1,null) )FROM `MEBER`";
				$resultuser=mysqli_query($db_link,$sql_query_user);
				$resultadmin=mysqli_query($db_link,$sql_query_admin);
				$rowuser = mysqli_fetch_array($resultuser, MYSQLI_BOTH);
				$rowadmin = mysqli_fetch_array($resultadmin, MYSQLI_BOTH);
				?>
		<div class="col-md-12 col-lg-12 col-xl-6">
        <div class="analysis-content">
         <h2>目前註冊人數之類的</h2>
         <p>本系統旨在幫助臺東大學校內學生、師長、以及行政人員，藉由新增各項便利的服務，以增加使用者的福利，並將各項便利系統結合學生證的感應功能來實現，已達到增加學生證的使用率這一目的。</p>
         <div class="about-count">
          <div class="counter-content-single">
           <h2><span class="timer" data-from="0" data-to="<?php echo $rowuser[0];?>" data-speed="200" data-refresh-interval="1"><?php $rowuser[0];?></span></h2>
           <h4>位註冊同學</h4>
          </div>
          <div class="counter-content-single">
           <h2><span class="timer" data-from="0" data-to="0" data-speed="200" data-refresh-interval="1">0</span></h2>
           <h4>家合作店家</h4>
          </div>
          <div class="counter-content-single">
           <h2><span class="timer" data-from="0" data-to="<?php echo $rowadmin[0];?>" data-speed="200" data-refresh-interval="1"><?php $rowadmin[0];?></span></h2>
           <h4>位管理員</h4>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <!-- End Analysis Area -->
    <!-- Start Choose Us Area -->
    <section class="choose-area section-padding">
     <div class="container">
      <div class="row">
       <div class="col-md-12">
        <div class="section-title">
         <h2>這個系統的特色好處	</h2>
         <div class="section-line">
          <span></span>
         </div>
		 </div>
       </div>
      </div>
      <div class="row">
       <div class="col-md-12">
        <div class="service-provide-block">
         <!-- Single Service Provide -->
         <div class="service-provide-single">
          <div class="service-provide-icon">
           <span class="flaticon-chart"></span>
          </div>
          <h4><a href="#">方便</a></h4>
          <p>一卡學生證在手，將可完整使用本系統提供之功能。</p>
         </div>
         <!-- Single Service Provide -->
         <div class="service-provide-single">
          <div class="service-provide-icon">
           <span class="flaticon-promotion"></span>
          </div>
          <h4><a href="#">實用</a></h4>
          <p>包含了本校師生們常會使用到的各種功能。</p>
         </div>
         <!-- Single Service Provide -->
         <div class="service-provide-single">
          <div class="service-provide-icon">
           <span class="flaticon-money"></span>
          </div>
          <h4><a href="#">紀錄</a></h4>
          <p>使用者的各項使用紀錄都會保存在資料庫中，方便使用者可以查看。</p>
         </div>
        </div>
       </div>
      </div>
     </div>
    </section>
    <!-- End Choose Us Area -->
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