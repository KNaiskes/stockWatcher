<?php
session_start();

if(!isset($_SESSION['user']))
{
	header('location: login-form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("dashboard-menu.php"); ?>
<link rel="stylesheet" type="text/css" href="css/dashboard-style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Dashboard </title>
</head>

<body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script tpye="text/javascript">

setInterval(function(){
	$.ajax({
	url:'getStockList.php',
	type:'GET',
	success: function(data){
		var obj= jQuery.parseJSON(data);
		obj = obj.toString().split(",");
		console.log(obj);

		for(var i=0; i < obj.length; i++){

			$.getJSON("https://finance.google.com/finance/info?client=ig&q="+obj[i]+
				"&callback=?",function (response) {

			var getStock = response[0];

			$('#testTable tr:last').after('<tr><td>'+getStock.t+'</td><td>'+getStock.l+'</td><td>'+getStock.c+' '+'('+getStock.cp+'%)'+'</td><td>'+getStock.lt+'</td></tr>');
			
			});
			$("#testTable td").remove();
		}

		$("#showresults").html("Updating prices every 10 seconds");
		console.log("go");
	}
});
},10000); 

</script>


<form action="addStock.php" method="post">
<p>
<label for="stock"><b><i>Enter a new stock to your list:</label> 
<input type="text" name="userStocks" id="userStocks">
<button type="submit"> Add </button>
</form>

<div id="testTable">
<br />
<table width="670" cellpadding="0" border="1" align="center" cellspacing="0">
<tbody>
  <tr >
  <th>Name</th>
  <th>Price</th>
  <th>Change</th>
  <th>Last Trade Date</th>
</tr>
</tbody>
</table>
</div>


</body>
</html>
