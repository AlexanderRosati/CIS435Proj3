<?php
    session_start();
    
    //make sure user is authorized to use page
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
        echo '<script>alert(\'You are not authorized to use this application!\');'
             . 'window.location = \'/CIS435Proj3\';</script>';
	exit();
    }

    if(isset($_POST['submit'])) {
	//get access to db    
	include('../model/database.php');
        
	//query
	$sql = 'DELETE FROM products WHERE productCode=:code';

	//create prepared statement
	$pre_stmt = $db->prepare($sql);

	//delete record
	$pre_stmt->execute(['code' => $_POST['code']]);
    }
    
    header('Location: product_list.php');
?>
