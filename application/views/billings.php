<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="<?= base_url();?>assets/style.css">
	<title>Client Billings</title>
	<script>
		$(document).ready(function(){ 
			var Chart = new CanvasJS.Chart("chart",{
				animatedEnabled: true,
				title: {
					text: "Client Billing 2011"
				},
				axisY: {
					title: "Estimate Cost"
				},
				axisX: {
					title: "Months"
				},
				data: [{
					type: "column",
					dataPoints: [
<?php						
		foreach($billings['billing_client'] as $value){
?>
			{ label: "<?= $value["month"]?>", y: <?= $value["total_cost"]?>},
<?php }	?>
					]
				}]
			});
			Chart.render();
		});
	</script>
</head>
<body>
	<div class="container">
		<div class="date">
			<form action="<?= base_url()?>billings/date_joined" method="post">
				<label>Date from: <input type="date" name="from_date"></label>
				<label>Date to: <input type="date" name="to_date"></label> 				
				<input type="submit" value="Show">
			</form>
		</div>
		<div class="data">
			<h2>List of Total Charges Per Month</h2>
			<table>
				<thead>
					<tr>
						<th>Month</th>
						<th>Year</th>
						<th>Total Cost</th>
					</tr>
				</thead>
				<tbody>
<?php 	
	foreach($billings['billing_client'] as $value){
?>
					<tr>
						<td><?= $value["month"]?></td>
						<td><?= $value["year"]?></td>
						<td><?= $value["total_cost"]?></td>
					</tr>
<?php	}	?>
				</tbody>
			</table>
		</div>
		
		<div id="chart"></div>
		<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
		<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	</div>
</body>
</html>