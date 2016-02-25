<?php

	if(isset($_POST['insert']))
	{
		$id=$_GET['id'];
		$date=$_POST["date"];
		$taka=$_POST["taka"];
		
		require_once "config.php";
		//$db=get_connection();
		
		$result = "insert into  transection(id,date,amount) Values('$id','$date','$taka')";
		$sql= mysql_query($result);
		//$Message="Data Insert Succesfull";
		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

 
    <title>Deposits</title>
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
							<h3 class="panel-title">New Deposit</h3>
						</div>
						
						<div class="panel-body">
							<form role="form" method="POST" action="#">
								<fieldset>
									
									<div class="form-group">
										Date :
										<input type="date"  class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" />
										
									</div>
									<div class="form-group">
										Loan Amount :
										<input class="form-control" placeholder="Taka" name="taka" type="text" value="">
									</div>
									
									
									
									<!-- Change this to a button or input when using this as a form -->
									
									<input type="submit" class="btn  btn-primary btn-block" value="Add" name="insert">
									
									
									
									
								</fieldset>
							</form>
						</div>
					</div>
					
					<?php 
						
						require_once "config.php";
						
						$id=$_GET['id']; // client unique id
						
						$sql ="SELECT * FROM transection WHERE id='$id'";
						
						
						
						$result = mysql_query($sql);
						$row=mysql_fetch_array($result);
						
						$url="calculation.php?id=".$row["id"];
						echo '<a class="btn btn-danger" href='.$url.'>Calculation</a>';
							 
								
					?>
					
				</div>
				
				<div class="col-md-8">
					<h2>Deposit List </h2>
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="active">
												  
								
								<th>Date</th>
								<th>Amount</th>
								<th></th>
								
								
							</tr>
							 <tbody>



                        <?php 
						
								require_once "config.php";
								
								$id=$_GET['id']; // client unique id
								//$id=$_SESSION['id'];
								$sql ="SELECT * FROM transection WHERE id='$id'";
								
								//echo"Connection get";
								
								$result = mysql_query($sql);
								
								while($row=mysql_fetch_array($result))
								{	
									
										
									echo '<tr >';
									
									echo '<td>'.$row["date"].'</td>'; 
									echo '<td>'.$row["amount"].'</td>'; 
									
									$url="editDeposit.php?id=".$row["serial"];
		 							echo '<td>'.'<a class="btn btn-danger" href='.$url.'>Edit</a>'.'</td>';
									 
									
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