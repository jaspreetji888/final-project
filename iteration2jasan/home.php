<?php
include("include/conn.php");
include("include/authentication.php");
?>
<html>
<?php include("include/head.php"); ?>
<style type="text/css">
	.border_heigth{
		-webkit-text-stroke: 2px black;
		color: white;
		font-size: 70px;
		text-align: center;
		margin-top: -15px;
		margin-left: 60px;	
	}
</style>
<body>
	
<?php  
include("include/nav.php");
?>  
	<div class="container">
		<h1  class="border_heigth">Welcome Teacher<br> <?php
			$email_session=$_SESSION['teacherloggedin'];
		 $fetch_uname="SELECT * FROM teachers where email='$email_session'";
		 $fetch_uname_run=mysqli_query($conn,$fetch_uname);
		 $fetch_uname_data=mysqli_fetch_array($fetch_uname_run);
		 echo $fetch_uname_data['teacher_name']; ?></h1>	
	</div>
</body>
</html>