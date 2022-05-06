<?php

include './connection.php';
//prepare the sql statement
//$sql = "SELECT b.branch_id,employee_id,employee_name,salary,address,phone FROM employee e LEFT JOIN branches b ON 
//e.branch_id=b.branch_id  ";
$sql="SELECT * FROM Employee ";
//parse the statement
$statement = oci_parse($link, $sql);
//execute the sql
oci_execute($statement);
$data = array();
while($row = oci_fetch_assoc($statement)){
    array_push($data, $row);
}
//free the statement
oci_free_statement($statement);
//close the connection
oci_close($link);
//echo "<pre>";
//print_r($data);
//echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>

</style>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Bank Management System</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo_transparent.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logo_transparent.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style2.css">

</head>
<body class="bank_management">

    <!-- LOADER -->
    

    <div id="wrapper">

        <!-- Sidebar-wrapper -->
       <div id="sidebar-wrapper">
			<div class="side-top">
				<div class="logo-sidebar">
					<a href="index.php"><img src="images/logo2.png" alt="image"></a>
				</div>
				<ul class="sidebar-nav">
					<li><a class="active" href="adminbank.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="news.php">News</a></li>
				</ul>
			</div>
        </div>
        
        <!-- End Sidebar-wrapper -->

        <!-- Page Content -->
  <button type="button" class="block" onclick="window.location.href='register_employee.php';">Add Employee</button>
			 <?php    foreach ($data as $key=>$value){ ?>
			 	<img src="<?php echo $value['EMPLOYEE_PIC'];?>" alt="<?php echo $value['EMPLOYEE_ID']; ?>" title="<?php echo $value['EMPLOYEE_ID']; ?>" height="200px" width="250"/>
            <li>Branch ID: <?php echo $value['BRANCH_ID']; ?></li>
            <li>Employee ID: <?php echo $value['EMPLOYEE_ID']; ?></li>
            <li>Name: <?php echo $value['EMPLOYEE_NAME']; ?></li>
            <li>Salary:<?php echo $value['SALARY'];?></li>
            <li>Address:<?php echo $value['ADDRESS'];?></li>
            <li>Phone: <?php echo $value['PHONE']; ?></li>
           
        <a class="btn btn-light btn-radius btn-brd grd1 effect-1 butn" href="edit_employee.php?employee_id=<?php echo $value['EMPLOYEE_ID'];?>">Edit</a>
        	<a class="btn btn-light btn-radius btn-brd grd1 effect-1 butn" href="delete_employee.php?employee_id=<?php echo $value['EMPLOYEE_ID'];?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a><br><br>
    <?php } //loop ends ?>
 <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>

</body>
</html>
