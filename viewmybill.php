 <html>
<head>
<?php
@$consumerid = $_POST['consumerid'];
include "navigationbar1.php";
include "dbconfigure.php";
//session_start();
//$u = $_SESSION['sun'];
?>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel=stylesheet type = text/css href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
  $(document).ready(function () {
$('#myTable123').DataTable();
$('.dataTables_length').addClass('bs-select');
});

  </script>

  <style>
    * {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}
  
body {
	background: linear-gradient(90deg, #C7C5F4, #776BCC);	
  	
}
  </style>

</head>
<body>

<div>


				<div class="container">
				    <div class=row>
				        <div class="col-sm-12">
  <h1 class = text-center style = "font-family : 'Monotype Corsiva' ; color : purple"><b>View Latest Pending Bill</b></h1>



</div>
    
</div>
</div>
<?php
//include "dbconfigure.php" ;


$query = "select * from bill where connectionid='$consumerid' and status='not paid'";
$rs = my_select($query);

echo "<div class = container>";
 
echo "<div class = row>";
echo "<div class = col-sm-12>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover table-sm' style = 'overflow: scroll;' id=myTable123>";
echo "<thead style = '		background: linear-gradient(90deg, #5D54A4, #7C78B8);	 color : #000' >";
echo "<tr>";
echo "<th>Bill ID</th>";
echo "<th>Connection ID</th>";
echo "<th>Bill For Month</th>";
echo "<th>Current Day Reading</th>";
echo "<th>Previous Day Reading</th>";
echo "<th>Current Night Reading</th>";
echo "<th>Previous Night Reading</th>";
echo "<th>Current Gas Reading</th>";
echo "<th>Previous Gas Reading</th>";
echo "<th>Final Amount</th>";
echo "<th>Due Date</th>";
echo "<th>Status</th>";
echo "<th>Payment</th>";
echo "</tr>";
echo "</thead>";

echo '<tbody id="myTable">';
while($column=mysqli_fetch_array($rs))
{
echo "<tr class='table-active'>";

echo "<td>$column[0]</td>";
echo "<td>$column[1]</td>";
echo "<td>$column[2]</td>";
echo "<td>$column[3]</td>";
echo "<td>$column[4]</td>";
echo "<td>$column[7]</td>";
echo "<td>$column[8]</td>";
echo "<td>$column[11]</td>";	
echo "<td>$column[12]</td>";
echo "<td>$column[16]</td>";
echo "<td>$column[17]</td>";
echo "<td>$column[18]</td>";
																				
echo '<td><a class = "btn btn-xs btn-warning" href="payment.php?id='.$column['billid'].'&total='.$column['finalamount'].'">
													Pay Now
													</a></td>';
																		
echo "</tr>";

}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";






?>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



</div>

</body>
</html>