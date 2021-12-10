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
		 Manage Teachers</h1> </div>
		 <div class="panel-body">
		 	<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>S.No</th>
			        <th>Teacher Name</th>
			        <th>Status</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php  
			    	$i=0;

			    		$fetch_teachers="SELECT * FROM teachers ";
						$fetch_teachers_run=mysqli_query($conn,$fetch_teachers);
		 	    		while($fetch_data=mysqli_fetch_array($fetch_teachers_run)){
		 	    			$id=$fetch_data['id'];
		 	    			$teacher_name=$fetch_data['teacher_name'];
		 	    			$status=$fetch_data['status'];
			    			$i=$i+1;
			    	?>
					      <tr>
					        <td><?php echo $i; ?></td>
					        <td><?php echo $teacher_name; ?></td>
					        <td><?php if($status=="Active"){ echo $status; }else{ echo $status; }  ?></td>
					      	<td><?php if($status=="Active"){ ?> <a class="anchor_tag" href="block_teacher.php?id=<?php echo $id;  ?>">Block User </a> <?php  }else{ ?> <a class="anchor_tag" href="activate_teacher.php?id=<?php echo $id;  ?>">Activate User</a> <?php }  ?></td>
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