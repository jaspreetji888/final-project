<?php
include("include/conn.php");
include("include/authentication.php");
if(!isset($_GET['id'])){
echo "<script>window.location.href='home.php'</script>";
}else{
	$topic_id=$_GET['id'];
	$course_id=$_GET['course_id'];
	$email_session=$_SESSION['teacherloggedin'];
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
			  <source src="../course_videos/<?php echo $video_url  ?>" type="video/mp4">
			</video>
		 </div>
	</div>
</div>

</body>
</html>