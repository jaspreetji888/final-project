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
		<h1  class="border_heigth"><br></h1>	
		
	</div>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading"><h1 style="text-align: center;">
		Add Content for Course 
		<?php  
			if(isset($_GET['id'])){
				$id=$_GET['id'];	
				$find_course=mysqli_query($conn,"SELECT * FROM courses where id='$id'");
				$fetch_content=mysqli_fetch_array($find_course);
				$course_name=$fetch_content['course_name'];
				echo $course_name;
			}else{
				echo "<script>alert('Please Select Course')</script>";
				echo "<script>window.location.href='courses.php'</script>";
			}
		 ?></h1></div>
		 <div class="panel-body">
		 	<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="course_name">Topic Name:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="course_name" placeholder="Enter Topic Name" name="topic_name" required="required">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="course_name">Upload Video:</label>
		      <div class="col-sm-10">          
		        <input type="file" class="form-control" name="file" required="required">
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <input type="submit" class="btn btn-default" name="submit" value="Add Content">
		      </div>
		    </div>
		</form>
		 </div>
	</div>
</div>

</body>
</html>

<?php 
if(isset($_POST['submit'])){
	$topic_name=$_POST['topic_name'];
	$target_dir='../course_videos/';
	$rand_num=rand();
	$target_file=$target_dir.$topic_name.$rand_num.basename($_FILES["file"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
	{
	    echo "File Format Not Suppoted";
	} 
	else
	{
	$video_path=$topic_name.$rand_num.$_FILES['file']['name'];
	mysqli_query($conn,"INSERT INTO course_content (`course_id`, `topic_name`, `video_url`) values('$id','$topic_name','$video_path')");
	move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);
	echo "<script>alert('uploaded')</script>";
	echo "<script>window.location.href='courses.php'</script>";
	}
}

?>