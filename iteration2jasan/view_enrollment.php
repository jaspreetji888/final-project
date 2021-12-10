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
		 	$course_id=$_GET['id'];
		  	$fetch_course_name=mysqli_query($conn,"SELECT * FROM courses WHERE id='$course_id'");
			$fetch_course_name_run=mysqli_fetch_array($fetch_course_name);
			$course_name = $fetch_course_name_run['course_name'];
		  ?>Students Enrolled in <?php echo $course_name; ?></h1></div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Student Name</th>
			        <th>Enrolled on</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;

			    		$email_session=$_SESSION['teacherloggedin'];
					    $fetch_enroll="SELECT * FROM enroll where course_id='$course_id'";
					    $fetch_enroll_run=mysqli_query($conn,$fetch_enroll);
					    $fetch_enroll_data=mysqli_fetch_array($fetch_enroll_run);
					    $user_id= $fetch_enroll_data['user_id'];
					    $enrolled_on=$fetch_enroll_data['enrolled_on'];
						$fetch_uname="SELECT * FROM users WHERE id='$user_id'";
						$fetch_uname_run=mysqli_query($conn,$fetch_uname);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_uname_run)){
			    			$uname=$fetch_data['uname'];
			    			$id=$fetch_data['id'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $uname; ?></td>
					        <td><?php echo $enrolled_on; ?></td>
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