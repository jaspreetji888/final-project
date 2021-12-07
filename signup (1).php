<?php
include("include/conn.php");
?>
<html>
<?php include("include/head.php"); ?>
<body>
	
<?php  
include("include/nav.php");
?>  
<div class="container">
 <div class="panel panel-primary">
      <div class="panel-heading" style="text-align: center;"><h1>Signup Form</h1></div>
      <div class="panel-body">
      	<form class="form-horizontal" action="#" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Teacher Name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="uname" placeholder="Enter User Name" name="uname" required="required">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Email:</label>
		      <div class="col-sm-10">
		        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Password:</label>
		      <div class="col-sm-10">          
		        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="required">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2">Phone Number:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="phno" placeholder="Enter Phone Number" name="phno" required="required">
		      </div>
		    </div>

		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <input type="submit" class="btn btn-default" name="submit" value="Submit">
		      </div>
		    </div>
		</form>
      </div>
    </div>
  
</div>

<?php 
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$phno=$_POST['phno'];
	$sql="SELECT * from teachers where teacher_name='$uname' and email='$email' and phno='$phno'";
	$sql_find=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_find)>0){
		echo "<script>alert('Teacher Already Found')</script>";
		echo "<script>window.location.href='signup.php'</script>";
	}else{
		$insert_rec="INSERT INTO `teachers`(`teacher_name`, `email`, `pwd`, `phno`) VALUES('$uname','$email','$pwd','$phno')";
		$insert_rec_run=mysqli_query($conn,$insert_rec);
		echo "<script>alert('Teacher Registered!! Please Login')</script>";
		echo "<script>window.location.href='login.php'</script>";

	}
}

?>
</body>
</html>