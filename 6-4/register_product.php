<?php
    
    include('../view/header.php');
    // set customer variable from previous page
    $currentCustomer = $_SESSION['customerName'];
    include('../model/database.php');

?>
<main>
<h2>Register Product</h2>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <label class="fixed-width" for="customerName">Customer:</label><?php echo $currentCustomer;?><br><br>
    <label class="fixed-width" for="Product">Product:</label>
    <select id="procudtList" name="productList">
    <option value="">---Products---</option>
        <?php
            $productQuery = 'SELECT name FROM products';
            $prep_stmt = $db->prepare($productQuery);
            $prep_stmt->execute();
            $productList = $prep_stmt->fetchAll(PDO::FETCH_OBJ); 
        ?>
        <?php 
        foreach($productList as $productItem): ?>
                <option value="<?php echo $productItem->name; ?>"><?php echo $productItem->name; ?></option>
	    <?php endforeach; ?>
	</select><br><br>
    <label class="fixed-width"></label>
    <input name="submit" type="submit" value="Register Product"></input> <br><br>
</form>


</main>



<?php include('../view/footer.php'); ?>