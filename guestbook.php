<html>
<head>
<title>GUEST BOOK</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
	<table border="1">
		<tr>
			<td>お名前</td>
			<td><input type="text" name="g_name" size="30"></td>
		</tr>
		<tr>
			<td>メールアドレス</td>
			<td><input type="text" name="g_mail" size="30"></td>
		</tr>
		<tr>
			<td>メッセージ</td>
			<td><textarea rows="5" cols="30" name="g_mes"></textarea></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="書き込み">
			</td>
		</tr>
	</table>
</form>
<!-- 部品２：データベースへ接続 -->
<?php
	$sv = "localhost";
	$dbname = "mytest";
	$user = "root";
	$pass = "root";
	$port = "8889";
	
// 	$mysqli = new mysqli($sv, $user, $pass, $dbname, $port);
	
	$conn = mysql_connect($sv, $user, $pass) or die("error");
	mysql_select_db($dbname);
?>

<!-- 部品３：メッセージ書き込みスクリプト -->
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$g_name = cnv_dbstr($_POST["g_name"]);
	$g_mail = cnv_dbstr($_POST["g_mail"]);
	$g_mes = cnv_dbstr($_POST["g_mes"]);
	
	if (!empty($g_name) and !empty($g_mes)) {
		// データを追加する
		$sql = "INSERT INTO guestdata(g_name,g_mail,g_mes,g_date) ";
		$sql .= "VALUES(";
		$sql .= "'" . $g_name . "',";
		$sql .= "'" . $g_mail . "',";
		$sql .= "'" . $g_mes . "',";
		$sql .= "'" . date("Y/m/d H:i:s") . "'";
		$sql .= ")";
		
// 		$result = $mysqli->query($link, $query)
		
		$res = mysql_query($sql,$conn);
		if ($res) {
			echo "<p>書き込みありがとうございました。</p>";
		} else {
			echo "sfdsfdsfsd";
		}
	} else {
		echo "<p><b>お名前とメッセージを入力してください。</b></p>";
	}
}

function cnv_dbstr($string) {
	$string = htmlspecialchars($string);
	
	if (get_magic_quotes_gpc()) {
		$string = stripcslashes($string);
	}
	
	$string = mysql_escape_string($string);
	return $string;
}
?>

<!-- 部品４：メッッセージ表示スクリプト -->
<?php 
$sql = "SELECT * FROM guestdata order by id desc";
$res = mysql_query($sql,$conn) or die("select error");

while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	echo "<hr>";
	if (!is_null($row["g_mail"])) {
		echo  "kkkkk";
//		echo "<a href=\"ma:" . $row["_mail"]."\">" . $row["g_name"] . "</a>";
	} else {
		echo $row["g_name"];
	}
	
	echo "(" . date("Y/m/d H:i",strtotime($row["g_date"])) . ")";
	echo "<p>" . nl2br($row["g_mes"]) . "</p>";
}
?>
</body>
</html>