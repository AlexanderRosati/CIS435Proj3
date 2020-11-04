<?php
    //include header
    include('../view/header.php');

    $err_msg = "";

    //if form is submitted
    if (isset($_POST['submit'])) {
	// get values from text fields
	$code = $_POST['code'];
        $name = $_POST['name'];
	$ver = $_POST['ver'];
	$reldate = $_POST['release'];

        // check to see if any fields are empty
	if (!empty($code) && !empty($name) && !empty($ver) && !empty($reldate)) {
            include('../model/database.php'); //include db
            $sql = 'INSERT INTO products (productCode, name, version, releaseDate)'
	           . 'VALUES (:code, :name, :ver, :reldate)';
	    $pre_stmt = $db->prepare($sql);
	    $pre_stmt->execute(['code' => $_POST['code'], 
	                        'name' => $_POST['name'],
		                'ver' => $_POST['ver'],
		                'reldate' => $_POST['release']]);
	    header('Location: product_list.php'); 
	} else {
            $err_msg = "You must fill in all of the fields above.";
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
        <input id="release" type="text" name="release" placeholder="Release Date"><br><br>
        <label class="fixed-width">&nbsp;</label>
        <input type="submit" name="submit" value="Add Product"><br><br>
    </form>
    <p class="error"><?php echo $err_msg; ?></p>
</main>

<?php
    include('../view/footer.php');
?>
