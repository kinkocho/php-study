<?php
session_start();

// �ݒ�
define("LOGINID", "abcd");
define("LOGINPASS", "1234");
define("AUTHADMIN", "1");

// �����`�F�b�N
if (!chk_auth()) {
	disp_login();
	exit();
}

// ���O�C�����
function disp_login() {
	?>
	<html>
	<head>
	<title></title>
	</head>
	<body>
	<h3>���O�C�����</h3>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
		<table border="1">
			<tr>
			<td>���[�UID</td>
			<td><input type="text" name="1_id"></td>
			</tr>
			<tr>
			<td>�p�X���[�h</td>
			<td><input type="password" name="1_pass"></td>
			</tr>
		</table>
		<input type="submit" name="sub" value="���O�C��">
	</form>
	</body>
	</html>
	<?php
}

// ���[�U�����`�F�b�N
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