<html>
<head>
<title>�z��</title>
</head>
<body>
<?php 
	for ($i = 0; $i < count(@$_POST["check1"]); $i++) {
		echo "<p>".$_POST["check1"][$i]."���I������܂����B";
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
				<input type="submit" value="���M" name="sub1">
			</td>
		</tr>
	</table>
</form>
</body>
</html>