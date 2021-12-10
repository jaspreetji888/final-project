<?php
include("include/conn.php");

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
		 Approve Course Content</h1> </div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Course Name</th>
			        <th>Topic Name</th>
			        <th>Status</th>
			        <th>Actions</th>
			        <th>View Content</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;

			    		$fetch_uname="SELECT * FROM course_content ";
						$fetch_uname_run=mysqli_query($conn,$fetch_uname);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_uname_run)){
		 	    			$course_id=$fetch_data['course_id'];
		 	    			$topic_name=$fetch_data['topic_name'];
		 	    			$id=$fetch_data['id'];
		 	    			$status=$fetch_data['status'];
		 	    			$coursee=mysqli_query($conn,"SELECT * FROM courses where id='$course_id'");
		 	    			$course_data=mysqli_fetch_array($coursee);
		 	    			$course_name=$course_data['course_name'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $course_name; ?></td>
					        <td><?php echo $topic_name; ?></td>
					        <td><?php if($status=="Approved"){ echo $status; }else{ echo $status; }  ?></td>
					      	<td><?php if($status=="Approved"){ ?> <a class="anchor_tag" href="block_content.php?id=<?php echo $id;  ?>">Reject Content </a> <?php  }else{ ?> <a class="anchor_tag" href="approve_content_update.php?id=<?php echo $id;  ?>">Approve Content</a> <?php }  ?></td>
					      	<td><a href="view_content.php?id=<?php echo $id;  ?>&course_id=<?php echo $course_id;  ?>">View</a></td>
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