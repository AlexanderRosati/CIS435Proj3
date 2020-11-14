<?php
    
    include('../view/header.php');

    $error = "";

    // submit email entered
    if(isset($_POST['submit'])){
        $custEmail = 'customerLogin';
        echo $custEmail;

        $query = 'SELECT * FROM technician WHERE email LIKE :email';

        $prep_stmt = $db->prepare($query);
        $prep_stmt->execute(['email' => $custEmail]);

        $customerResult = $prep_stmt->fetchAll();

        if($customerResult){
            header('Location: register_product.php');
        }
        else{
            $error = "A customer with that email address was not found.";
        }

    }








?>


<main>
<h2>Customer Login</h2>
<p>You must login before you can register a product.</p>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <label for="search">Email: </label> 
    <input type="text" name="email" id="login" placeholder="email">
    <input type="submit" value="submit"> <br><br>
</form>


</main>



<?php include('../view/footer.php'); ?>