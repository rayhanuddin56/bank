<?php 

	require_once "config.php";
	$id = $_GET['id'];
	
	echo $id;
	
	$sql ="SELECT * FROM client WHERE id='$id'";
	
	$result = mysql_query($sql);
	
	while($row=mysql_fetch_array($result))
	{	
		
		$loanDate = $row["date"];
		$totalLoan	= $row["taka"];
			
	}
	
	$sql ="SELECT * FROM transection WHERE id='$id'";
	
	$result = mysql_query($sql);
	
	$i = 0;
	
	while($row=mysql_fetch_array($result))
	{	
		
		$i++;
		${"depositDate".$i} 	= date_create($row["date"]);
		${"depositAmount".$i}	= $row["amount"];
		
	}
	
	
	echo ${"depositDate".$i}->format('Y-m-d').'</br>';
	echo $depositDate2->format('Y-m-d').'</br>';
	echo $depositDate3->format('Y-m-d').'</br>';
	
	echo $depositAmount1.'</br>';
	echo $depositAmount2.'</br>';
	echo $depositAmount3.'</br>';
	
	$dateDifference = date_diff($depositDate2,$depositDate3);
	echo $a=$dateDifference->format("%d days");
	
	echo $a*3;
	
	
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deposits</title>
	<?php include('header.php') ?>
</head>

<body>
	<div class="container">
		<div class="col-md-12 column">
			<?php include('nav.php') ?>
		</div>
		
		
		
	</div>
	
</body>

</html>