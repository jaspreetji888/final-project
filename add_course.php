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
		 <?php 
		  ?>Add Course</h1></div>
		 <div class="panel-body">
		 	<form class="form-horizontal" action="#" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="course_name">Course Name:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" name="course_name" required="required">
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <input type="submit" class="btn btn-default" name="submit" value="Add Course">
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
	$course_name=$_POST['course_name'];
	$email=$_SESSION['teacherloggedin'];
	$find_teacher_id=mysqli_query($conn,"SELECT * FROM TEACHERS where email='$email'");
	$fetch_id=mysqli_fetch_array($find_teacher_id);
	$teacher_id=$fetch_id['id'];
	$sql_course_name=mysqli_query($conn,"SELECT count(*) countt FROM courses where course_name='$course_name' and created_by='$teacher_id'");
	$sql_course_name_fetch=mysqli_fetch_array($sql_course_name);
	if($sql_course_name_fetch['countt']>0){
		echo "<script>alert('Course Already Found')</script>";
		echo "<script>window.location.href='courses.php'</script>";
	}else{
		$insert_course=mysqli_query($conn,"INSERT INTO `courses`(`course_name`, `created_by`) VALUES('$course_name','$teacher_id')");
		echo "<script>alert('Course Added')</script>";
		echo "<script>window.location.href='courses.php'</script>";
	}

}
?>