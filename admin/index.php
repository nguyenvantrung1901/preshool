<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nha Trang Preshool</title>
</head>

<body>
	<style>
		input {
			border: 2px solid blue;
		}
	</style>
<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
if ($_POST['fSubmit'] == 1) {
	echo "Da submit<br>";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "preschool";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' LIMIT 1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if ($row['password'] == md5($_POST['password'])) {
				echo "<p>Dang nhap thanh cong</p>";

				?>
				<table>
					<th>
					</th>

				</table>





				<?php
			} else {
				echo "<br>Sai mat khau";
			}
		} else {
			echo "<br>Khong ton tai username";
		}

	   mysql_close($conn);



	// Kiem tra user dung hay chua
	// Chua
	// Dung > danh sach bai viet

} else {
	echo "Chua submit";
}
?>
<h1 style="font-style: italic; color: #F44336;">Đăng nhập</h1>
<form action="index.php" method="post">
	<input type="hidden" name="fSubmit" value="1">
	<input type="text" name="username">
	<input type="password" name="password"  class="border_red">
	<button type="submit">Đăng nhập</button>
</form>
</body>
</html>
