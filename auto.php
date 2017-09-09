<?php

  include("db_con.php");
				mysqli_query($con,"SET NAMES 'utf8'");
				mysqli_query($con,"SET CHARACTER SET 'utf8_unicode_ci'");
				mysqli_set_charset($con,'utf8');
				
	$result = mysqli_query($con,"select * from parents") or die(mysqli_error($con));
	
	$items = array();
	$i = 0;
	while ($row = mysqli_fetch_array($result))
	{
					echo $row['parentlname'];
					$items[$i++] = $row['parentlname'];
					
	}
	
    echo json_encode($items);

?>