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
	<script>
           function numPlus(n) {
                var p = document.getElementById(n);
                p.value++;
           }
		   function num_Plus(n) {
                var pp = document.getElementById(n);
				if(pp.value>0)
					pp.value--;
           }
    </script>
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
         <h2>儲值扣款系統</h2>
         <div class="section-line">
          <span></span>
         </div>
        
		<?php	
		//之後del
		ini_set('display_errors', 0);
		//之後del

		if(isset($_SESSION['BHSislogin'])){//已登入
			?><p></p><?php
			if($_POST['selectShop']!='')
				$lastShop=$_POST['selectShop'];
			require("conn_mysql.php");
			//所有店家存進$shop陣列中
			$shop = array();
			$sql='SELECT Permission FROM MEBER where (Permission!="學生" and Permission!="管理員" ) group by Permission';
			$sql2=mysqli_query($db_link, $sql);
			while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
				$shop[] = $row['Permission'];
			}
			$sql_query_login="SELECT * FROM MEBER WHERE ID='".$_SESSION['BHSusername']."'";
			$result=mysqli_query($db_link,$sql_query_login) or die("查詢失敗");	
			if ($result->num_rows > 0) 
			{
				while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
				{	
					//登入後固定刪除30天前完成的訂單
					$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
					$dateTime->modify('-30 day');
					//echo $dateTime->format("YmdHis");
					$sql='DELETE FROM record WHERE date<"'.$dateTime->format("YmdHis").'"';
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					
					//管理員身分已登入
					if($row[4]=="管理員"){
						$outputTable=1;
						//進行修改店家
						if(isset($_POST[modify])){
							//將勾選的店家刪除
							foreach($_POST[delShop] as $it => $value){
								$sql='DELETE FROM MEBER WHERE Permission="'.$value.'"';
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								$sql='DELETE FROM menu WHERE shop="'.$value.'"';
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								echo "<h3 style=\"color:green;\">$value 店家刪除成功</h3>";
							}
							//新增店家(店家不能重複、帳號要填寫正確、店名不能取做"學生"和"管理員"和填寫完整)
							if($_POST[addShopName]!='' and $_POST[addShopId]!=''){
								$fail=false;
								foreach($shop as $it => $value){
									if($_POST[addShopName]==$value){
										echo "<h3 style=\"color:red;\">新增失敗 '".$value."'已被註冊</h3>";
										$fail=true;
										break;
									}
								}
								$sql='SELECT * FROM MEBER WHERE ID="'.$_POST[addShopId].'"';
								$sql2=mysqli_query($db_link, $sql);
								while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
									if($row[Permission]!="管理員" and $row[Permission]!="學生"){
										echo "<h3 style=\"color:red;\">新增失敗 無法更改店家店名</h3>";
										$fail=true;
									}
								}
								$row=mysqli_num_rows($sql2);
								if($row==0){
									echo "<h3 style=\"color:red;\">新增失敗 ".$_POST[addShopId]."尚未註冊</h3>"; 
								}
								else if($_POST[addShopName]=="學生" or $_POST[addShopName]=="管理員"){
									$fail=true;
									echo "<h3 style=\"color:red;\">新增失敗 請更換店名</h3>";
								}
								else if(!$fail){
									$sql='UPDATE MEBER SET Permission="'.$_POST[addShopName].'" WHERE ID="'.$_POST[addShopId].'"';
									$sql2=mysqli_query($db_link, $sql) or die("Error");
									echo "<h3 style=\"color:green;\">".$_POST[addShopName]." 新增成功<br></h3>";
								}
							}
							else if( ($_POST[addShopName]!='' and $_POST[addShopId]=='')or($_POST[addShopName]=='' and $_POST[addShopId]!='') ){
								echo "<h3 style=\"color:red;\">新增失敗 請填寫完整</h3>";
							}
						}
						//顯示所有店家並重新抓取店家名稱的陣列(可做新增刪除)
						$shop = array();
						$sql='SELECT Permission FROM MEBER where (Permission!="學生" and Permission!="管理員" ) group by Permission';
						$sql2=mysqli_query($db_link, $sql);
						while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
							$shop[] = $row['Permission'];
						}
						?><form action="" method="post"><?php
							echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
								echo "<td>店家</td> <td></td> <tr></tr>";
								foreach($shop as $it => $value){
									echo "<td>$value</td>";
									echo '<td><input type="checkbox" name="delShop[]" value="'.$value.'"></td>';
									echo "<tr></tr>";
								}
								echo '<td><input type="text" name="addShopName" placeholder="新增店家" style="text-align:center;"></td>';
								echo '<td><input type="text" name="addShopId" placeholder="店家帳號" style="text-align:center;"></td>';
								echo "<tr></tr>";
							echo "</table>";
							echo '<center><input type="submit" name="modify" value="修改/刪除"></center>';
						echo "</form>";
					}
					//學生登入
					else if($row[4]=="學生"){
						?><form action="" method="post"><?php
							//餐廳下拉式選單Start
							echo "<select name='selectShop'>";
								foreach ($shop as $it => $value){
									if($value==$lastShop){
										echo "<option selected value="."$value"." >"."$value"."</option>";
									}
									else{
										echo "<option value="."$value"." >"."$value"."</option>";
									}
								}
							echo "</select>";
							//餐廳下拉式選單End
							echo '<input type="submit" value="查詢"><br>';
						echo '</form>';
						echo "學生登入<br>";
						$outputTable=2;
						$money=$row['Amount'];
						$customer=$row['ID'];
						echo "目前金額為$money<br>";
						//送出訂單
						$sql='SELECT * FROM record WHERE(id="'.$customer.'" and status=1) ORDER BY record.date ASC';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						$row=mysqli_num_rows($sql2);
						if($row!=0){
							echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
								echo '<td colspan="6">送出訂單</td><tr></tr>';
								echo "<td>日期</td>";
								echo "<td>店家</td>";
								echo "<td>食物</td>";
								echo "<td>數量</td>";
								echo "<td>金額</td>";
								echo "<td></td>";
								echo "<tr></tr>";
								$sql='SELECT * FROM record WHERE(id="'.$customer.'" and status=1) ORDER BY record.date ASC';
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
									?><form action="shop.php" method="post"><?php
										//按下取消餐點
										if(isset($_POST['delDate']) and $row['date']==$_POST['delDate'] ){
											$sql='DELETE FROM record WHERE id="'.$customer.'" and date="'.$_POST['delDate'].'"';
											$sql=mysqli_query($db_link, $sql) or die("Error");
											unset($_POST['nextStateDate']);  // 釋放變數資源
											continue;
										}
										echo "<td>".$row['date']."</td>";
										echo "<td>".$row['shop']."</td>";
										echo "<td>".$row['food']."</td>";
										echo "<td>".$row['num']."</td>";
										echo "<td>".$row['money']."</td>";
										echo '<input type="hidden" name="delDate" value="'.$row['date'].'">';
										echo '<td><input type="submit" name="delOrder" value="取消餐點" ></td>';
										echo "<tr></tr>";
									echo "</form>";
								}
							echo "</table><br>";
						}
						//顯示消費紀錄
						$sql='SELECT * FROM record WHERE(id="'.$customer.'" and status!=1 ) ORDER BY record.date ASC';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						$row=mysqli_num_rows($sql2);
						if($row!=0){
							echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
								echo '<td colspan="5">消費紀錄</td><tr></tr>';
								echo "<td>日期</td>";
								echo "<td>店家</td>";
								echo "<td>食物</td>";
								echo "<td>數量</td>";
								echo "<td>金額</td>";
								echo "<tr></tr>";
								$sql='SELECT * FROM record WHERE(id="'.$customer.'" and status!=1 ) ORDER BY record.date ASC';
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
									echo "<td>".$row['date']."</td>";
									echo "<td>".$row['shop']."</td>";
									echo "<td>".$row['food']."</td>";
									echo "<td>".$row['num']."</td>";
									echo "<td>".$row['money']."</td>";
									echo "<tr></tr>";
								}
							echo "</table>";
						}
					}
					//店家登入
					else{
						$lastShop=$row[4];
						echo "<h2>$lastShop<br></h2>";
						echo "店家登入<br>";
						echo "目前金額為".$row['Amount']."<br>";
						$shopMoney=$row['Amount'];
						$outputTable=3;
						//顯示菜單
						?><form action="" method="post"><?php
							echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
								echo '<td><input type="text" name='.'"shopName'.'" style="text-align:center;" value='.$lastShop.'></td>';
								echo '<td>價格</td>'.'<tr></tr>';
								$sql='SELECT * FROM menu where shop="'.$lastShop.'"';
								$sql2=mysqli_query($db_link, $sql) or die("查詢失敗");
								$n=0;
								while($row = mysqli_fetch_array($sql2)){
									$BeforeFood[$n]=$row[food];
									$BeforePrice[$n]=$row[price];
									$n++;
									echo '<td><input type="text" name="editMenuFood[]"'.'value="'.$row[food].'" style="text-align:center;"></td>';
									echo '<td><input type="text" name="editMenuPrice[]"'.' value="'.$row[price].'" style="text-align:center;" size=2 oninput="value=value.replace(/[^\d]/g,'."''".')"></td>';
									echo '<tr></tr>';
								}
								for($i=0;$i<5;$i++, $n++){
									$BeforeFood[$n]='';
									$BeforePrice[$n]='';
									echo '<td>新增欄位:<input type="text" name="editMenuFood[]"'.'value="" style="text-align:center;"></td>';
									echo '<td><input type="text" name="editMenuPrice[]"'.' value="" style="text-align:center;" size=2 oninput="value=value.replace(/[^\d]/g,'."''".')"></td>';
									echo '<tr></tr>';
								}
							echo "</table>";
							echo '<center><input type="submit" name="modify" value="修改"></center>';
						echo"</form>";
						//按下修改鍵觸發事件
						if(isset($_POST['modify'])){
							//qq
							$java=0;
							//更改店名
							$sucess=true;
							if($lastShop!=$_POST[shopName]){
								foreach($shop as $it => $value){
									if($_POST[shopName]==$value ){
										echo '<h3 style="color:red;">'.$_POST[shopName]."已被使用<br></h3>";
										$sucess=false;
										break;
									}
								}
								if($_POST[shopName]=="學生" or $_POST[shopName]=="管理員"){
									echo "店名更改失敗 請更換店名<br>";
									$sucess=false;
								}
								if($sucess){
									$java=1;
									//qq
									$reply.=$lastShop.' 成功修改為 => '.$_POST[shopName].'\n';
									$sql='UPDATE MEBER SET Permission="'.$_POST[shopName].'" WHERE (Permission="'.$lastShop.'")';
									$sql2=mysqli_query($db_link, $sql) or die("Error");
									$sql='UPDATE menu SET shop="'.$_POST[shopName].'" WHERE (shop="'.$lastShop.'")';
									$sql2=mysqli_query($db_link, $sql) or die("Error");
									$sql='UPDATE record SET shop="'.$_POST[shopName].'" WHERE shop="'.$lastShop.'"';
									$sql2=mysqli_query($db_link, $sql) or die("Error");
									echo "$sql<br>";
									$lastShop=$_POST[shopName];
								}
							}
							//檢查是否有產品填寫重複
							$afterMenu=$_POST['editMenuFood'];
							sort($afterMenu);
							for($i=0;$i<($n-1);$i++){
								if($afterMenu[$i]==$afterMenu[$i+1] and $afterMenu[$i]!=''){
									$failModify=true;
									echo '<h3 style="color:red;">"'.$afterMenu[$i].'"重複出現了</h3>';
								}
							}
							//檢查是否只填產品或價格
							for($i=0;$i<$n;$i++){
								if( $_POST['editMenuFood'][$i]!='' && $_POST['editMenuPrice'][$i]=='' ){
									$failModify=true;
									echo '<h3 style="color:red;">"'.$_POST['editMenuFood'][$i].'"沒有填寫價格<br></h3>';
								}
								else if( $_POST['editMenuFood'][$i]=='' && $_POST['editMenuPrice'][$i]!='' ){
									$failModify=true;
									echo '<h3 style="color:red;">"'.$_POST['editMenuPrice'][$i].'"沒有填寫產品<br></h3>';
								}
							}
							//進行修改菜單
							if(!$failModify){
								$diff=array();
								//找出不一樣的填寫內容，存入diff[]
								for($i=0;$i<$n;$i++){
									if($BeforeFood[$i] != $_POST['editMenuFood'][$i] or $BeforePrice[$i] != $_POST['editMenuPrice'][$i]){
										array_push($diff, $i);
									}
									echo $_POST['editMenuFood'][$i]." ".$_POST['editMenuPrice'][$i]."  ".$BeforeFood[$i]." ".$BeforePrice[$i]."<br>";
						//			$BeforeFood[$i]
						//			$BeforePrice[$i]
						//			$_POST['editMenuFood'][$i]
						//			$_POST['editMenuPrice'][$i]
								}
								//將不一樣的資料刪除
								foreach($diff as $it => $value){
									$sql='DELETE FROM menu WHERE (shop="'.$lastShop.'" and food='.'"'.$BeforeFood[$value].'")';
									$sql2=mysqli_query($db_link, $sql) or die(Error);
								}
								//將填寫不一樣的資料加入菜單
								
								foreach($diff as $it => $value){
									$java=1;
									//修改資料庫菜單
									if($_POST['editMenuFood'][$value]!='' and $_POST['editMenuPrice'][$value]!=''){
										$sql='INSERT INTO menu(shop, food, price) VALUES ("'.$lastShop.'",'.'"'.$_POST['editMenuFood'][$value].'",'.$_POST['editMenuPrice'][$value].')';
										$sql2=mysqli_query($db_link, $sql);
										//javascript顯示修改和新增成功
										if($BeforeFood[$value]!='' and $BeforePrice[$value]!=''){
											$reply.=$BeforeFood[$value]." ".$BeforePrice[$value].' 成功修改為 => '.$_POST['editMenuFood'][$value]." ".$_POST['editMenuPrice'][$value].'\n';
										}
										else if($BeforeFood[$value]=='' and $BeforePrice[$value]==''){
											$reply.=$_POST['editMenuFood'][$value]." ".$_POST['editMenuPrice'][$value].' 新增成功\n';
										}
									}
									//javascript顯示刪除成功
									else if($_POST['editMenuFood'][$value]=='' and $_POST['editMenuPrice'][$value]==''){
										$reply.=$BeforeFood[$value]." ".$BeforePrice[$value].' 刪除成功\n';
									}
								}
								if($java==1){
									echo '<script language="javascript">alert("'."$reply".'")</script>';
									echo "<script  language=\"JavaScript\">location.href=\"shop.php\";</script>";
								}
							}
						}
					}
				}
			}		
		}
		else{
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
        <p>
		<?php
			if($outputTable==1){
				echo "<center>";
					?><form action="" method="post" ><?php
						echo '<input type="password" name="'.'cardId'.'" placeholder="請輸入查詢者卡號" style="text-align:center;" value="'.$_POST[cardId].'">';
						echo '<input type="submit" name="search" value="查詢"><br>';
					echo "</form>";
					?><form action="" method="post" ><?php
					//按下查詢鍵(先檢查是否輸入有效卡號，顯示學號和餘額)
					if(isset($_POST[cardId]) and $_POST[cardId]!=''){
						$sql='SELECT * FROM MEBER WHERE CardID="'.$_POST[cardId].'"';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						$row=mysqli_num_rows($sql2);
						if($row==0){
							echo '<h3 style="color:red;">'."此卡尚未註冊<br></h3>";
						}
						else{
							while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
								$customer=$row['ID'];
								$money=$row['Amount'];
							}
							echo "$customer<br>";
							echo "餘額為:".$money."<br>";
							echo '<input type="text" name="add" placeholder="請輸入儲值金額" style="text-align:center;" oninput="value=value.replace(/[^\d]/g,'."''".')">';
							echo '<input type="hidden" name="cardId" value="'.$_POST[cardId].'">';
							echo '<input type="submit" name="btnAdd" value="儲值"><br>';
							//按下儲值鍵
							$java=0;
							if(isset($_POST[btnAdd]) and $_POST[add]!=''){
								$java=1;
								$sql='UPDATE MEBER SET Amount="'.($_POST[add]+$money).'" WHERE ID="'.$customer.'"';
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
								$sql='INSERT INTO record(date, id, shop, food, num, money, status) VALUES ("'.$dateTime->format("YmdHis").'","'.$customer.'","管理員","儲值",1,"'.$_POST[add].'",0)';
								$reply.="加值前餘額為$money".'\n'."加值".$_POST[add]."後餘額為".($money+$_POST[add]).'\n';
							}
							if($java==1){
								$sql2=mysqli_query($db_link, $sql) or die("Error");
								echo '<script language="javascript">alert("'."$reply".'")</script>';
								echo "<script  language=\"JavaScript\">location.href=\"shop.php\";</script>";
							}
						}
					}
					echo "</form>";
				echo "</center>";
			}
			//顯示使用者選取的菜單
			else if(isset($_POST['selectShop']) && $outputTable==2){
				?><form action="" method="post"><?php
					echo'<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
					echo '<td>'.$_POST['selectShop'].'</td>'.'<td>價格</td>'.'<td>數量</td>'.'<tr></tr>';
						$sql='SELECT * FROM menu where shop="'.$lastShop.'"';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						$n=0;
						while($row = mysqli_fetch_array($sql2)){
							echo '<td>'.$row[food].'</td>';
							echo '<td>'.$row[price].'</td>';
							$food[$n]=$row[food];
							$price[$n]=$row[price];
							$n++;
							echo '<td><input onclick="num_Plus('.$n.')" type="button" value="-">';
							//echo '<input type="text" name="num[]" style="text-align:center;" size=2 oninput="value=value.replace(/[^\d]/g,'."''".')">';
							echo '<input id="'.$n.'" type="text" name="num[]"'.' value=0 style="text-align:center;" size=2 oninput="value=value.replace(/[^\d]/g,'."''".')">';
							echo '<input onclick="numPlus('.$n.')" type="button" value="+"></td>';
							echo '<tr></tr>';
						}
					echo "</table>";
					echo '<input type="hidden" name="selectShop" value="'.$lastShop.'">';
					
					echo '<center><input type="submit" name="order" value="確定"></center>';
				echo"</form>";
				//按下點餐確定鍵觸發事件
				echo '<center>';
				if(isset($_POST['order'])){
					$java=0;
					$total=0;
					$dateTime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
					foreach($_POST['num'] as $it => $value){
						if($value>0){
							$java=1;
							$reply.="$lastShop $food[$it] $price[$it]*$value".'\n';
							//echo "$lastShop $food[$it] $price[$it]*$value<br>";
							$orderFood.=$food[$it].'<br>';
							$orderNum.=$value.'<br>';
							$total+=$price[$it]*$value;
						}
					}
					$reply.="總金額為$total".'\n';
				}
				echo '</center>';
				if($java==1){
					$sql='INSERT INTO record(date, id, shop, food, num, money, status) VALUES ('.$dateTime->format("YmdHis").', '.$_SESSION['BHSusername'].', "'.$lastShop.'", "'.$orderFood.'", "'.$orderNum.'", '.$total.', 1)';
					//echo "$sql";
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					echo '<script language="javascript">alert("'."$reply".'")</script>';
					echo "<script  language=\"JavaScript\">location.href=\"shop.php\";</script>";
				}
			}
			//else if(isset($_POST['selectShop']) && $outputTable==3){
			else if($outputTable==3){
				echo "<center>";
				//顯示點餐情形
				for($i=1;$i<5;$i++){
					echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
						if($i==1){echo '<td colspan="5">尚未結帳餐點</td><tr></tr>';echo "<td>時間</td><td>客人</td><td>餐點</td><td>數量</td><td>價格</td><tr></tr>";}
						elseif($i==2){echo '<td colspan="5">製作中的餐點</td><tr></tr>';echo "<td>時間</td><td>客人</td><td>餐點</td><td>數量</td><td></td><tr></tr>";}
						elseif($i==3){echo '<td colspan="5">可取餐的餐點</td><tr></tr>';echo "<td>時間</td><td>客人</td><td>餐點</td><td>數量</td><td></td><tr></tr>";}
						elseif($i==4){echo '<td colspan="5">交易完成的餐點</td><tr></tr>';echo "<td>時間</td><td>客人</td><td>餐點</td><td>數量</td><td>價格</td><tr></tr>";}
						$sql='SELECT * FROM record where (record.status='.$i.' and record.shop="'.$lastShop.'") ORDER BY record.date ASC';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						if($i==2){
							while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
								?><form action="shop.php" method="post"><?php
									//按下製作完成狀態2->3
									if(isset($_POST['nextStateDate']) and $row['date']==$_POST['nextStateDate'] and $row['id']==$_POST['nextStateId'] ){
										$sql='UPDATE record SET status=3 WHERE(id="'.$_POST['nextStateId'].'" and date="'.$_POST['nextStateDate'].'")';
										$sql=mysqli_query($db_link, $sql) or die("Error");
										unset($_POST['nextStateDate']);  // 釋放變數資源
										continue;
									}
									echo "<td>".$row['date']."</td>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['food']."</td>";
									echo "<td>".$row['num']."</td>";
									echo '<input type="hidden" name="nextStateDate" value="'.$row['date'].'">';
									echo '<input type="hidden" name="nextStateId" value="'.$row[id].'">';
									echo '<td><input type="submit" name="make" value="製作完成" ></td>';
									echo "<tr></tr>";
								echo "</form>";
							}
						}
						else if($i==3){
							while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
								?><form action="shop.php" method="post"><?php
									//按下取餐完成狀態3->4
									if(isset($_POST['nextStateDate']) and $row['date']==$_POST['nextStateDate'] and $row['id']==$_POST['nextStateId'] ){
										$sql='UPDATE record SET status=4 WHERE(id="'.$_POST['nextStateId'].'" and date="'.$_POST['nextStateDate'].'")';
										$sql=mysqli_query($db_link, $sql) or die("Error");
										unset($_POST['nextStateDate']);  // 釋放變數資源
										continue;
									}
									echo "<td>".$row['date']."</td>";
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['food']."</td>";
									echo "<td>".$row['num']."</td>";
									echo '<input type="hidden" name="nextStateDate" value="'.$row['date'].'">';
									echo '<input type="hidden" name="nextStateId" value="'.$row['id'].'">';
									echo '<td><input type="submit" name="make" value="取餐完成" ></td>';
									echo "<tr></tr>";
								echo "</form>";
							}
						}
						//顯示狀態1和狀態4的點單
						else{
							while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
								echo "<td>".$row['date']."</td>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['food']."</td>";
								echo "<td>".$row['num']."</td>";
								echo "<td>".$row['money']."</td>";
								echo "<tr></tr>";
							}
						}
					echo "</table><br>";
				}
				//店家結帳窗口
				?><form action="" method="post"><?php
					echo '<input type="text" name='.'"cardId'.'" style="text-align:center;" value="'.$_POST['cardId'].'">';
					echo '<input type="submit" name="btnCheckout" value="結帳"><br>';
				echo "</form>";
				//按下結帳按鈕
				if(isset($_POST[cardId])){
					//利用卡號取得學號
					$sql='SELECT ID FROM MEBER WHERE CardID="'.$_POST[cardId].'"';
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
						$customer=$row[ID];
						echo "$customer<br>";
					}
					//顯示學生的訂單
					$sql='SELECT * FROM record where(id="'.$customer.'" and status="1") ORDER BY date ASC';
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					?><form action="" method="post"><?php
						echo '<table width="100%" border="5" style="text-align:center;word-break: break-all;">';
							echo "<td>時間</td><td>客人</td><td>餐點</td><td>數量</td><td>價格</td><td>付費</td><tr></tr>";
							while ($row = mysqli_fetch_array($sql2, MYSQLI_BOTH)){
								echo "<td>".$row['date']."</td>";
								echo "<td>".$row['id']."</td>";
								echo "<td>".$row['food']."</td>";
								echo "<td>".$row['num']."</td>";
								echo "<td>".$row['money']."</td>";
								echo '<td><input type="checkbox" name="pay[]" value="'.$row['date'].'"></td>';
								echo "<tr></tr>";
							}
						echo "</table>";
						echo '<input type="hidden" name="cardId" value="'.$_POST['cardId'].'">';
						echo '<input type="submit" name="btnPay" value="付款"><br>';
					echo "</form>";
				}
				if(isset($_POST['btnPay'])){
					echo "按下付款鍵<br>";
					$java=0;
					//計算付款費用
					$cost=0;
					foreach($_POST['pay'] as $it => $value){
						$sql='SELECT * FROM record WHERE(id="'.$customer.'" and status=1 and date="'.$value.'")';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
							$cost+=$row['money'];
						}
					}
					//計算使用者金錢
					$sql='SELECT Amount FROM MEBER WHERE id="'.$customer.'"';
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
						$money=$row['Amount'];
					}
					$sql='SELECT Amount FROM MEBER WHERE Permission="'.$lastShop.'"';
					$sql2=mysqli_query($db_link, $sql) or die("Error");
					while($row=mysqli_fetch_array($sql2, MYSQLI_BOTH)){
						$shopMoney=$row['Amount'];
					}
					echo "目前有$money<br>";
					echo "花費$cost<br>";
					//判斷是否可以交易
					if($money<$cost){
						echo '<h3 style="color:red;">'."金額不足 交易失敗<br></h3>";
					}
					//完成付款
					else{
						$java=1;
						$sql='UPDATE MEBER SET Amount="'.($money-$cost).'" WHERE ID="'.$customer.'"';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						$reply.="顧客餘額為".($money-$cost).'\n';
						$sql='UPDATE MEBER SET Amount='.($shopMoney+$cost).' WHERE Permission="'.$lastShop.'"';
						$sql2=mysqli_query($db_link, $sql) or die("Error");
						foreach($_POST['pay'] as $it => $value){
							$sql='UPDATE record SET status=2 WHERE(id="'.$customer.'" and date="'.$value.'")';
							$sql2=mysqli_query($db_link, $sql) or die("Error");
						}
					}
				}
				if($java==1){
					echo '<script language="javascript">alert("'."$reply".'")</script>';
					echo "<script  language=\"JavaScript\">location.href=\"shop.php\";</script>";
				}
				echo "</center>";
			}
		
		
		
		
		
		
		
		
		?>
		</p>
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