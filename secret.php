<html>
<head>
<title>�t�H�[���̃f�[�^���󂯎��</title>
</head>
<body>
<?php 
	echo "���͓��e�F".@$_POST["text1"];
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
<table>
	<tr>
		<td><input type="text" name="text1"></td>
		<td><input type="submit" value="���M" name="sub1"></td>
	</tr>
</table>
</form>
</body>
</html>