<?php
    
    include('../view/header.php');
    // set customer variable from previous page
    $currentCustomer = $_SESSION['currentCustomer'];
    //print_r($currentCustomer);
    include('../model/database.php');


    // submit info entered
    if(isset($_POST['submit'])){
        if($_POST['productList'] == ""){
            // if user clicks submit when no product was selected
            echo 'Error no product was selected.';
            exit();
        }
        else{
            $custID = $currentCustomer['customerID'];
            $registerProduct = ($_POST['productList']);
            echo $registerProduct;
            $currDate = date('Y-m-d');
    
            $query = 'INSERT INTO registrations (customerID, productCode, registrationDate) VALUES (:custID, :registerProduct, :currDate)';
    
            $prep_stmt = $db->prepare($query);
            $prep_stmt->execute([
                'custID' => $custID,
                'registerProduct' => $registerProduct,
                'currDate' => $currDate]);
    
            // display success message
            echo $prep_stmt->rowCount();
            if ($prep_stmt->rowCount() == 1) {
                echo '<main>';
                echo '<h1>Register Product</h1>';
                echo '<p>Product {'.$registerProduct.'} was registered succesfully</p>';
                echo '</main>';
                exit();
            } else {
                echo '<main>';
                echo '<h1>Register Product</h1>';
                echo 'The product was <em>not</em> registered.<br><br>';
                echo '</main>';
                exit();
            }
        }
       
    }
   
?>
<main>
<h2>Register Product</h2>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <label class="fixed-width" for="customerName">Customer:</label><?php echo $currentCustomer['firstName'].' '.$currentCustomer['lastName'];?><br><br>
    <label class="fixed-width" for="Product">Product:</label>
    <select id="productList" name="productList">
    <option value="">----Products----</option>
        <?php
            $productQuery = 'SELECT name, productCode FROM products';
            $prep_stmt = $db->prepare($productQuery);
            $prep_stmt->execute();
            $productList = $prep_stmt->fetchAll(PDO::FETCH_OBJ); 
        ?>
        <?php 
        foreach($productList as $productItem): ?>
                <option value="<?php echo $productItem->productCode; ?>"><?php echo $productItem->name; ?></option>
	    <?php endforeach; ?>
	</select><br><br>
    <label class="fixed-width"></label>
    <input name="submit" type="submit" value="Register Product"></input> <br><br>
</form>


</main>



<?php include('../view/footer.php'); ?>