<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
<?php
session_start();
if (isset($_SESSION['username']))
{
?>



<?php
}
else
{
	echo 'Παρακαλώ συνδεθείτε για να έχετε πρόσβαση.Μετάβαση στην σελίδα σύνδεσης...';
	header("refresh:3;url=index.html" );

}
?>
</body>






</html>





