<?php
    
    include('../view/header.php');

    $error = "";

    // submit email entered
    if(isset($_POST['submit'])){
        $custEmail = 'email';
        echo $custEmail;

        $query = 'SELECT * FROM customer WHERE email = :email';

        $prep_stmt = $db->prepare($query);
        $prep_stmt->execute(['email' => $custEmail]);

        $customerResult = $prep_stmt->fetchAll();

        echo $customerResult->name . '<br>';

        /* if($customerResult){
            header('Location: register_product.php');
        }
        else{
            $error = "A customer with that email address was not found.";
        } */

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


</main>



<?php include('../view/footer.php'); ?>