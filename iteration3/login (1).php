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
      <div class="panel-heading" style="text-align: center;"><h1>Signin Form</h1></div>
      <div class="panel-body">
      	<form class="form-horizontal" action="#" method="POST">
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
	$pwd=$_POST['pwd'];
	$sql="SELECT * from admin where email='$email' and pwd='$pwd'";
	$sql_find=mysqli_query($conn,$sql);
	if(mysqli_num_rows($sql_find)>0){
		$_SESSION['userloggedin']=$email;
		echo "<script>alert('Admin Logged in')</script>";
		echo "<script>window.location.href='home.php'</script>";
	}else{
		echo "<script>alert('Admin User Not Found!! Please Login')</script>";
		echo "<script>window.location.href='login.php'</script>";

	}
}

?>
</body>
</html>