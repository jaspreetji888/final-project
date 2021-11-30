<?php
include("include/conn.php");
include("include/authentication.php");
if(!isset($_GET['id'])){
echo "<script>window.location.href='home.php'</script>";
}else{
	$topic_id=$_GET['id'];
	$email_session=$_SESSION['userloggedin'];
	$fetch_uname="SELECT * FROM users where email='$email_session'";
	$fetch_uname_run=mysqli_query($conn,$fetch_uname);
	$fetch_uname_data=mysqli_fetch_array($fetch_uname_run);
	$user_id= $fetch_uname_data['id'];
	$course_id=$_GET['course_id'];
	$current_date_time=date("Y-m-d H:i:s");
	$update_date_query="UPDATE view_history SET viewed_on='$current_date_time'  where course_id='$course_id' and topic_id='$topic_id' and user_id='$user_id'";
	$update_date_query_run=mysqli_query($conn,$update_date_query);
	$fetch_history="SELECT * FROM course_content where course_id='$course_id' and id='$topic_id'";
	$fetch_history_run=mysqli_query($conn,$fetch_history);
	$fetch_data_history_content=mysqli_fetch_array($fetch_history_run);
	$video_url=$fetch_data_history_content['video_url'];
	$topic_name=$fetch_data_history_content['topic_name'];
}
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
		<h1  class="border_heigth"><br></h1>	
		
	</div>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading"><h1 style="text-align: center;">
		 View <?php echo $topic_name; ?> Content</h1></div>
		 <div class="panel-body">
		 	<video width="320" height="240" controls>
			  <source src="course_videos/<?php echo $video_url  ?>" type="video/mp4">
			  Your browser does not support the video tag.
			</video>
		 </div>
	</div>
</div>

</body>
</html>