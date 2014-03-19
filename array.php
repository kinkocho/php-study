<html>
<head>
<title>配列</title>
</head>
<body>
<?php 
	for ($i = 0; $i < count(@$_POST["check1"]); $i++) {
		echo "<p>".$_POST["check1"][$i]."が選択されました。";
	}
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
	<table>
		<tr>
			<td>
			<input type="checkbox" name="check1[]" value="PHP">PHP
			<input type="checkbox" name="check1[]" value="Perl">Perl
			<input type="checkbox" name="check1[]" value="ASP">ASP
			<input type="checkbox" name="check1[]" value="JSP">JSP
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="送信" name="sub1">
			</td>
		</tr>
	</table>
</form>
</body>
</html>