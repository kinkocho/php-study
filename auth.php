<?php
session_start();

// 設定
define("LOGINID", "abcd");
define("LOGINPASS", "1234");
define("AUTHADMIN", "1");

// 権限チェック
if (!chk_auth()) {
	disp_login();
	exit();
}

// ログイン画面
function disp_login() {
	?>
	<html>
	<head>
	<title></title>
	</head>
	<body>
	<h3>ログイン画面</h3>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		<table border="1">
			<tr>
			<td>ユーザID</td>
			<td><input type="text" name="1_id"></td>
			</tr>
			<tr>
			<td>パスワード</td>
			<td><input type="password" name="1_pass"></td>
			</tr>
		</table>
		<input type="submit" name="sub" value="ログイン">
	</form>
	</body>
	</html>
	<?php
}

// ユーザ権限チェック
function chk_auth() {
	if (isset($_POST["1_id"]) and isset($_POST["1_pass"])) {
		if ($_POST["1_id"] == LOGINID and $_POST["1_pass"] == LOGINPASS) {
			$_SESSION["auth"] = AUTHADMIN;
			return true;
		} else {
			return false;
		}
	} else {
		if (!isset($_SESSION["auth"])) {
			return false;
		} else {
			if ($_SESSION["auth"] == AUTHADMIN) {
				return true;
			} else {
				return false;
			}
		}
	}
}
?>