<?php
    //include header
    include('../view/header.php');

    // make sure user is admin
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
        echo '<script>alert(\'You are not authorized to access this page\');'
             . 'window.location = \'/CIS435Proj3\';</script>';
	exit();

    }

    $err_msg = "";

    //if form is submitted
    if (isset($_POST['submit'])) {
	// get values from text fields
	$code = strtoupper($_POST['code']);
        $name = $_POST['name'];
	$ver = $_POST['ver'];
	$reldate = $_POST['release'];
	$date_valid = FALSE;

	//validate date
	if(preg_match("/\d{4}-\d{2}-\d{2}/", $reldate)) {
	    $date = explode('-', $reldate);
            $date_valid = checkdate($date[1], $date[2], $date[0]);
	    $date_valid = $date_valid && (intval($date[0]) < 2050 && intval($date[0]) > 1949);
	}

	if(strlen($code) > 10) {
	    $err_msg = 'Code cannot be longer than 10 characters';
	} else if(strlen($name) > 50) {
	    $err_msg = 'Product name cannot be longer than 50 characters';
	} else if(!filter_var($ver, FILTER_VALIDATE_FLOAT)) {
            $err_msg = 'Version must be floating point number';
	} else if(!($date_valid)) {
	    $err_msg = 'Please enter a valid date';
	} else {
            // check to see if any fields are empty
	    if (!empty($code) && !empty($name) && !empty($ver) && !empty($reldate)) {
                include('../model/database.php'); //include db
                $sql = 'INSERT INTO products (productCode, name, version, releaseDate)'
	               . 'VALUES (:code, :name, :ver, :reldate)';
	        $pre_stmt = $db->prepare($sql);
	        $pre_stmt->execute(['code' => $code, 
	                            'name' => $name,
		                    'ver' => $ver,
				    'reldate' => $reldate]);
	        echo $pre_stmt->rowCount();
	        header('Location: product_list.php');
	    } else {
                $err_msg = "You must fill in all of the fields above.";
	    }
	}
    }
?>

<main>
    <h1>Add Product</h1><br>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <label class="fixed-width" for="code">Code: </label>
        <input id="code" type="text" name="code" placeholder="Product Code"><br><br>
        <label class="fixed-width" for="name">Name: </label>
        <input id="name" type="text" name="name" placeholder="Product Name"><br><br>
        <label class="fixed-width" for="ver">Version: </label>
        <input id="ver" type="text" name="ver" placeholder="Product Version"><br><br>
        <label class="fixed-width" for="release">Release Date: </label>
        <input id="release" type="text" name="release" placeholder="Release Date">
        <span> &nbsp;&nbsp;Use 'yyyy-mm-dd' format'</span><br><br>
        <label class="fixed-width">&nbsp;</label>
        <input type="submit" name="submit" value="Add Product"><br><br>
    </form>
    <p><a href="product_list.php">View Product List</a></p><br>
    <p class="error"><?php echo $err_msg; ?></p>
</main>

<?php
    include('../view/footer.php');
?>
