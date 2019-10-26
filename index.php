<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

include $_SERVER['DOCUMENT_ROOT'].'/setup.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Inventory System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>

  <body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Store</th>
							<th>Item</th>
							<th>Quantity</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$conn = new mysqli($GLOBALS["db_server"], $GLOBALS["db_user"], $GLOBALS["db_pasw"], $GLOBALS["db_name"]);
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}	
					$sql = 'SELECT * FROM inventory';
					if($result = $conn->query($sql)){
						while($row = $result->fetch_assoc()){
							echo '<tr>';
							echo '<td>'.$row['store'].'</td>';
							echo '<td>'.$row['item'].'</td>';
							echo '<td>'.$row['quantity'].'</td>';
							echo '<td><a class="btn btn-danger" href="ModDB.php?del='.$row['id'].'">Delete</a></td>';
							echo '</tr>';
						}
						$conn->close();
					}
					else{
						$sqlCre='CREATE TABLE inventory (id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY, store VARCHAR(30), item VARCHAR(30), quantity INTEGER)';
						$sqlIns='INSERT INTO inventory (store, item, quantity) VALUES 
							( "Puerto Rico", "Amazon Echo", 12), 
							( "Paris", "Amazon Dot", 3 ),
							( "Detroit", "Amazon Tap", 5 )';
						$result = $conn->query($sqlCre);
						$result = $conn->query($sqlIns);
						$conn->close();
						echo "<script>location.href='/'</script>";
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form role="form" action="ModDB.php" method="POST">
				<div class="form-group">
					<label for="name">
						Name
					</label>
					<input type="text" class="form-control" id="name" name="name" />
				</div>
				<div class="form-group">
					<label for="thuid">
						Student ID
					</label>
					<input type="text" class="form-control" id="thuid" name="thuid" />
				</div>
				<div class="form-group">
					<label for="num">
						Number Only
					</label>
					<input type="text" class="form-control" id="num" name="num" />
				</div>
				<input type="submit" class="btn btn-primary" id="subrec" name="subrec" value="Submit" />
			</form>
			</div>
		</div>
    </div>
	
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>
