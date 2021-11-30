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
			        <th>Added By</th>
			        <th>Enroll</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;
			    		$email_session=$_SESSION['userloggedin'];
					    $fetch_uname="SELECT * FROM users where email='$email_session'";
					    $fetch_uname_run=mysqli_query($conn,$fetch_uname);
					    $fetch_uname_data=mysqli_fetch_array($fetch_uname_run);
					    $user_id= $fetch_uname_data['id'];
						$fetch_class="SElECT * from courses where id NOT IN(    SELECT course_id FROM enroll e where user_id='$user_id')";
						$fetch_class_run=mysqli_query($conn,$fetch_class);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_class_run)){
			    			$course_name=$fetch_data['course_name'];
			    			$id=$fetch_data['id'];
			    			$teacher_id=$fetch_data['created_by'];
			    			$find_subject="SELECT * from teachers where id='$teacher_id'";
			    			$find_subject_run=mysqli_query($conn,$find_subject);
			    			$find_subject_data=mysqli_fetch_array($find_subject_run);
			    			$teacher_name=$find_subject_data['teacher_name'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $course_name; ?></td>
					        <td><?php echo $teacher_name; ?></td>
					        <td><a href="enroll_course.php?id=<?php echo $id;  ?>">Enroll Course</a></td>
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