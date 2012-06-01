<html>
<head>
<title>WSDL Tester</title>
</head>
<body>
<h1>WSDL Tester</h1>

<form method="post" enctype="multipart/form-data"> 
<input type="file" name="datei"><br>
<input type="submit" value="Hochladen"> 
</form>

<pre>
<?php
if (isset ($_FILES['datei']) && strlen ($_FILES['datei']['name']) > 0)
{
	try {
		$time = time ();
		$filename = "upload/" . $time . "-" . $_FILES['datei']['name'];
		move_uploaded_file($_FILES['datei']['tmp_name'], $filename); 
		$client = new SoapClient($filename);
		echo "<h2>SOAP Functions</h2>\r\n";
		foreach ($client->__getFunctions() as $function)
		{
			echo "<li>" . $function . "</li>";
		}
		echo "<h2>SOAP Types</h2>\r\n";
		foreach ($client->__getTypes() as $type)
		{
			echo "<li>" . $type . "</li>";;
		}
	} catch (Exception $e) {  
		echo htmlentities($e->getMessage()); 
	} 
	
}
?>

</body>
</html>
