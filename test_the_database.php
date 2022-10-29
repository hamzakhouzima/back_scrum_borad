<?php 


require "database.php";

$request="SELECT * from tasks";

$query=mysqli_query($connect,$request);

$fetch=mysqli_fetch_assoc($query);




print_r($fetch);








?>
