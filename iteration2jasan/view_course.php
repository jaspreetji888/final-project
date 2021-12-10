<?php
include("include/conn.php");
include("include/authentication.php");
if(!isset($_GET['id'])){
echo "<script>window.location.href='home.php'</script>";
}else{
	$course_id = $_GET['id'];
	$email_session = $_SESSION['teacherloggedin'];
	$fetch_uname = "SELECT * FROM teachers where email='$email_session'";
	$fetch_uname_run = mysqli_query($conn,$fetch_uname);
	$fetch_uname_data = mysqli_fetch_array($fetch_uname_run);
	$user_id = $fetch_uname_data['id'];
					
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

	.format_link,.format_link:hover{
		color: white;
		text-decoration: underline;
		font-size: 20px;
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
		 View Course Topics </h1> <a class="format_link" href="add_content.php?id=<?php echo $course_id; ?>">Click here to Add Content</a></div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Course Name</th>
			        <th>Topic Name</th>
			        <th>Video URL</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;

			    		$fetch_history="SELECT * FROM course_content where course_id='$course_id'";
						$fetch_history_run=mysqli_query($conn,$fetch_history);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_history_run)){
			    			$topic_name=$fetch_data['topic_name'];
			    			$course_id=$fetch_data['course_id'];
			    			$video_url=$fetch_data['video_url'];
			    			$uploaded_on=$fetch_data['uploaded_on'];
			    			$topic_id=$fetch_data['id'];
			    			$find_course_name="SELECT * FROM courses where id='$course_id'";
			    			$find_course_name_run=mysqli_query($conn,$find_course_name);
			    			$fetch_course_name=mysqli_fetch_array($find_course_name_run);
			    			$course_name=$fetch_course_name['course_name'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $course_name; ?></td>
					        <td><?php echo $topic_name; ?></td>
					        <td><?php echo $uploaded_on;  ?></td>
					        <td> 
								<a href="view_content.php?id=<?php echo $topic_id;  ?>&course_id=<?php echo $course_id;  ?>">View</a>/<a href="delete_content.php?id=<?php echo $topic_id;  ?>&course_id=<?php echo $course_id;  ?>">Delete</a>
					        </td>
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