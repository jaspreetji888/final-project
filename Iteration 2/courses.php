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
		  ?>Available Courses List</h1></div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Course Name</th>
			        <th>View Course</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;
			    		$email_session=$_SESSION['teacherloggedin'];
					    $fetch_uname="SELECT * FROM teachers where email='$email_session'";
					    $fetch_uname_run=mysqli_query($conn,$fetch_uname);
					    $fetch_uname_data=mysqli_fetch_array($fetch_uname_run);
					    $teacher_id= $fetch_uname_data['id'];
						$fetch_class="SELECT * FROM courses WHERE created_by='$teacher_id'";
						$fetch_class_run=mysqli_query($conn,$fetch_class);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_class_run)){
			    			$course_name=$fetch_data['course_name'];
			    			$id=$fetch_data['id'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $course_name; ?></td>
					        <td><a href="view_course.php?id=<?php echo $id;  ?>">View</a></td>
					      </tr>

			    	<?php
			    		}
			    	?>
			    </tbody>
			  </table>
		 </div>
	</div>
</div>

</body>
</html>