<?php
    
    include('../view/header.php');
    
    $error = "";

    // submit email entered
    if(isset($_POST['submit'])){
        if(!empty($_POST['customerEmail'])){
            include('../model/database.php');
            $custEmail = htmlentities($_POST['customerEmail']);
    
            $query = 'SELECT firstName, lastName FROM customers WHERE email=:email';
    
            $prep_stmt = $db->prepare($query);
            $prep_stmt->execute(['email' => $custEmail]);
            $row = $prep_stmt->fetchAll();           
            $row_count = $prep_stmt->rowCount();
    
            if($row_count == 1){                
                foreach($row as $loginCustomer){
                    $custName = $loginCustomer['firstName'].' '.$loginCustomer['lastName'];
                }
                $_SESSION['customerName'] = $custName;
                header('Location: register_product.php');
            }
            else{
                $error = "A customer with that email address was not found.";
            } 

        }
    }

?>

<main>
<h2>Customer Login</h2>
<p>You must login before you can register a product.</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <label for="search">Email: </label> 
    <input type="text" name="customerEmail" id="customerEmail" placeholder="Email">
    <input name="submit" type="submit" value="Login"> <br><br>
</form>
<p class="error"><?php echo $error; ?></p>
</main>

<?php include('../view/footer.php'); ?>