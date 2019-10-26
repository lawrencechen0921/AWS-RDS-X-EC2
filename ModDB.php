<?php
include $_SERVER['DOCUMENT_ROOT'].'/setup.php';


if($_POST["subrec"]){
	$conn = new mysqli($GLOBALS["db_server"], $GLOBALS["db_user"], $GLOBALS["db_pasw"], $GLOBALS["db_name"]);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = 'INSERT INTO inventory (store,item,quantity) VALUES("'.$_POST["name"].'","'.$_POST["thuid"].'",'.$_POST["num"].')';
	$result = $conn->query($sql);
	$conn->close();
	echo "<script>location.href='/'</script>";
}
if($_GET["del"]){
	$conn = new mysqli($GLOBALS["db_server"], $GLOBALS["db_user"], $GLOBALS["db_pasw"], $GLOBALS["db_name"]);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = 'DELETE FROM inventory WHERE id='.$_GET["del"].'';
	$result = $conn->query($sql);
	$conn->close();
	echo "<script>location.href='/'</script>";
}

?>