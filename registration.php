<html>
<head>
<meta charset ="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Registration Form</title>
<link rel = "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style>
.padding-top-10{
	padding-top:15px;
}
.padding-left-10{
	padding-left:40px
}

.padding-right-10{
	padding-right:10px
}

.header{
	background-color:#2e2dd8;
}

.alert-box {
	padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;  
}

.success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    display: none;
}

</style>
<div id="alertsuccess" class="alert-box success">Successful Alert !!!</div>
<nav class="navbar navbar-default">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html"><span class="glyphicon glyphicon-home"></span> EXPO2017</a>
    </div>
	

  </div>
</nav>



<div class="container-fluid padding-left-10" style="max-height:100%; padding-top:5px;">
<div class ="row" style="max-width:100%; ">
	<div class="well well-sm"><img src="img/logo_reg.png"/> CSITEXPO2K17</div>
</div>

<div class="row padding-top-10  "style=" max-width:100%;height:68%; background:transparent url(img/try.jpg);" >
<div class ="col-lg-4 col-md-6 col-sm-8">
<div class="container-fluid padding-top-10 ">
	<div class="panel panel-default">
		<div class="panel-heading">Registration</div>
		<div class= "panel-body">
			<form action="process.php" method="GET">
			
				<label for="fname" class="control-label">Name:</label>
				<div class="row">
					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required/>
					</div>
					
					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id="mname" name="mname" placeholder="M.I" required/>
					</div>
					
					<div class="col-md-4 col-xs-4">
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Surname" required/>
					</div>
				</div>
				
				<!--<label for="course" class="control-label padding-top-10">Course:</label>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" id="course" placeholder="Your Course"/>
					</div>
				</div>	-->
													
				<label for="email" class="control-label padding-top-10">Email Address:</label>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" id="email" name="email" placeholder="Your email add" required />
					</div>
				</div>		

				<label for="contact" class="control-label padding-top-10">Contact (optional):</label>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" id="pnumber" name="pnumber" placeholder="Your Contact Number"/>
					</div>
				</div>	

				<label for="school" class="control-label padding-top-10">School:</label>
				<div class="row">
					<div class="col-md-8">
						<input type="text" class="form-control" id="school" name="school" placeholder="Your school"/>
					</div>
				</div>					
								
				<div class="row padding-top-10">
					<div class="col-md-12">
					<input class="btn btn-primary" type="submit" value="register">
					</div>
				</div>

				
				
			</form>
		</div>
		</div>
	</div>
   </div>
</div>

<div class ="row padding-top-10" style="max-width:100%; ">
	<div class="well well-sm"><img src="img/logo_reg.png"/></div>
</div>


</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Use downloaded version of Bootstrap -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>