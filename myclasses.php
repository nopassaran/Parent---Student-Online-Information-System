<!doctype html>

<html lang="en" class="no-js">
<head>

	<title>Karakaxis Education</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:300,400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" media="screen">	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.migrate.js"></script>
	<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/jquery.appear.js"></script>
	<script type="text/javascript" src="js/jquery.countTo.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.imagesloaded.min.js"></script>
	<script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
		
	<!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
		(Load Extensions only on Local File Systems !  
		The following part can be removed on Server for On Demand Loading) -->	
	<script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<style>

.example3 .navbar-brand {
  height: 80px;
}

.example3 .nav >li >a {
  padding-top: 30px;
  padding-bottom: 30px;
}
.example3 .navbar-toggle {
  padding: 10px;
  margin: 25px 15px 25px 0;
}


</style>
</head>
<body>
<?php
session_start();?>
<br>




<div id="maindiv">
<img src="images/logo.png" alt="Dispute Bills">
</div>

<div class="example3">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-left">
	            <li>
	  Σύστημα Ενημέρωσης Γονέων
	  </li>
	  </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Βαθμοί</a></li>
          <li><a href="#">Απουσίες</a></li>
          <li><a href="#">Πρόοδος</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Πρόγραμμα <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Τμήματος</a></li>
			  <li class="divider"></li>

              <li><a href="#">Διαγωνισμάτων</a></li>
            </ul>
          </li>
		  <li><a href="#">Ανακοινώσεις</a></li>
		  <li><a href="#">Επαγγελματικός Προσανατολισμός</a></li>
		  <li><a href='logout.php'>Αποσύνδεση (<?php echo $_SESSION['username']; ?>) </a></li>

        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>

<?php
include("db_con.php");
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET CHARACTER SET 'utf8'");
if (isset($_SESSION['username']))
{
	
?>
<div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
	  <th>Ημερομηνία</th>
      <th>Μάθημα</th>
	  <th>Βαθμός(/100)</th>
      <th>Βαθμός(/20)</th>
	  <th>Διάρκεια</th>
	  <th>Παρατηρήσεις</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $result2 = mysqli_query($con,"SELECT * from tests where studentid =1 order by testdate,lessonid") or die(mysqli_error($con));
	$loop2 = 0;
	while($row2 = mysqli_fetch_array($result2))
	{
		$loop2++;
		?>
    <tr>
      <th scope="row"><?php echo $loop2; ?></th>
	        <td><?php echo date("d/m/Y", strtotime($row2['testdate']));  ?></td>

      <td><?php echo $row2['lessonid']; ?></td>
	  	   <td><?php echo $row2['grade'] * 5; ?></td>

	   <td><?php echo $row2['grade']; ?></td>
	   	   <td><?php echo $row2['mins']; ?></td>
	   	   <td><?php echo $row2['comments']; ?></td>


    </tr>
   <?php
	}
	?>
  </tbody>
 
 </table>
</div>


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