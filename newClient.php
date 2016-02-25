
<?php 

if(isset($_POST['insert']))
{
		$name=$_POST["name"];
		$age=$_POST["age"];
		$address=$_POST["address"];
		$taka=$_POST["taka"];
		$date=$_POST["date"];
		
		require_once "config.php";
		//$db=get_connection();
		
		$result = "insert into  client(name,age,address,taka,date) Values('$name','$age','$address', '$taka','$date')";
		$sql= mysql_query($result);
		//$Message="Data Insert Succesfull";
		
					
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>New Client</title>
	<?php include('header.php') ?>
	
</head>

<body>

<div class="container">

		<div class="container">
		
			<div class="col-md-12 column">
				<?php include('nav.php') ?>
			</div>

				<div class="col-md-4">
			
					<div class="login-panel panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">New Client</h3>
						</div>
						
						<div class="panel-body">
							<form role="form" method="POST" action="#">
								<fieldset>
									<div class="form-group">
										
											Client Name : 
										<input class="form-control" placeholder="Client Name" name="name" type="text">
									</div>
									
									<div class="form-group">
										Age :
										<input class="form-control" placeholder="Age" name="age" type="text" value="">
									</div>
									
									<div class="form-group">
										Address :
										<input class="form-control" placeholder="Address" name="address" type="text" value="">
									</div>
									
									<div class="form-group">
										Loan Amount :
										<input class="form-control" placeholder="Taka" name="taka" type="text" value="">
									</div>
									
									<div class="form-group">
										Date :
										<input type="date"  class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" />
										
									</div>
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-primary btn-block" value="Add" name="insert">
									
								</fieldset>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-md-8">
					<h2>Client List </h2>
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="active">
								<th>Name</th>				  
								<th>Age</th>
								<th>Address</th>
								<th>Total Loan</th>
								<th>Date</th>
								<th></th>
								
							</tr>
							 <tbody>



                        <?php 
						
								require_once "config.php";
								
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM client order by id desc";
								
								//echo"Connection get";
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{	
									
										
									echo '<tr >';
									echo '<td>'.$row["name"].'</th>';
									echo '<td>'.$row["age"].'</td>';
									echo '<td>'.$row["address"].'</td>'; 
									echo '<td>'.$row["taka"].'</td>';
									echo '<td>'.$row["date"].'</td>'; 
									
									$url="showTransection.php?id=".$row["id"];
		 							echo '<td>'.'<a class="btn btn-danger" href='.$url.'>View</a>'.'</td>';
									 
									
									echo '</tr>';
									
										
								}
								//mysql_close($db);

									
						?>

                    </tbody>
							
					</thead>
						
				</table>
			
		</div>
		</div>
    </div>

     <?php  //echo $Message; ?>


</body>

</html>
