<?php
include("include/conn.php");
include("include/authentication.php");
if(!isset($_GET['id'])){
echo "<script>window.location.href='home.php'</script>";
}else{
	$course_id = $_GET['id'];
	$email_session = $_SESSION['userloggedin'];
	$fetch_uname = "SELECT * FROM users where email='$email_session'";
	$fetch_uname_run = mysqli_query($conn,$fetch_uname);
	$fetch_uname_data = mysqli_fetch_array($fetch_uname_run);
	$user_id = $fetch_uname_data['id'];
					
}

// Progress calculation

$no_of_topic_in_course="SELECT count(topic_id) as total_count FROM view_history where course_id='$course_id' and user_id='$user_id'";
$run_query=mysqli_query($conn,$no_of_topic_in_course);
$fetch_topic_count=mysqli_fetch_array($run_query);
$total_topic_count=$fetch_topic_count['total_count'];


$topics_viewed="SELECT count(topic_id) as total_count FROM view_history where course_id='$course_id' and user_id='$user_id' and viewed_on<>'0000-00-00 00:00:00'";
$run_query=mysqli_query($conn,$topics_viewed);
$fetch_topic_count_viewed=mysqli_fetch_array($run_query);
$total_topic_count_viewed=$fetch_topic_count_viewed['total_count'];

$course_progress=$total_topic_count_viewed/$total_topic_count;


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
		 View Course Topics</h1> Progress for the course completion is <?php  echo (round($course_progress*100,2))."%"; ?></div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Course Name</th>
			        <th>Topic Name</th>
			        <th>Viewed on</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;

			    		$fetch_history="SELECT * FROM view_history where course_id='$course_id' and user_id='$user_id'";
						$fetch_history_run=mysqli_query($conn,$fetch_history);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_history_run)){
			    			$topic_id=$fetch_data['topic_id'];
			    			$view_history_id=$fetch_data['id'];
			    			$viewed_on_date=$fetch_data['viewed_on'];
			    			$find_course_name="SELECT * FROM courses where id='$course_id'";
			    			$find_course_name_run=mysqli_query($conn,$find_course_name);
			    			$fetch_course_name=mysqli_fetch_array($find_course_name_run);
			    			$course_name=$fetch_course_name['course_name'];
			    			$find_course_content="SELECT * from course_content where id='$topic_id'";
			    			$find_course_content_run=mysqli_query($conn,$find_course_content);
			    			$find_course_content_data=mysqli_fetch_array($find_course_content_run);
			    			$topic_name=$find_course_content_data['topic_name'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $course_name; ?></td>
					        <td><?php echo $topic_name; ?></td>
					        <td><?php echo $viewed_on_date;  ?></td>
					        <td> <?php   if($viewed_on_date=="0000-00-00 00:00:00"){
					        ?>
								<a href="view_content.php?id=<?php echo $topic_id;  ?>&course_id=<?php echo $course_id;  ?>">View</a>
					        <?php
					        }else{
					        	?>Topic Already viewed/
					        	<a href="view_content.php?id=<?php echo $topic_id;  ?>&course_id=<?php echo $course_id;  ?>"> Review</a>
					        	<?php
					        } ?></td>
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