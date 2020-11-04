<?php
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
