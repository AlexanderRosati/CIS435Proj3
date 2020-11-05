    <?php include '../view/header.php'; 
        if(isset($_POST['first_name'])):
            // update user and print error message if necessary

        endif;
        if(isset($_POST['customerID'])):
            $customer_id =htmlspecialchars( $_POST['customerID']);
            include('../model/database.php');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            $query = 'SELECT * FROM customers WHERE customerID =:customer_id';
            $execute_query= $db->prepare($query);
            $execute_query->execute(['customer_id'=>$customer_id]);
            
            $searched_customers = $execute_query->fetch();
    ?>
<main>
    <h2>
        View/Update Customer
    </h2>

       

    <form action="modify_customer.php" method="post">
                
                <label for="first_name"> First Name: </label> <input type="text" name="first_name" id="first_name"><br><br>
                <label for="last_name"> Last Name: </label><input type="text" name="last_name" id="last_name"><br><br>
                <label for="address"> Address: </label><input type="text" name="address" id="address"><br><br>
                <label for="city"> City: </label><input type="text" name="city" id="city"><br><br>
                <label for="state"> State: </label><input type="text" name="state" id="state"><br><br>
                <label for="postal_code"> Postal Code: </label><input type="text" name="postal_code" id="postal_code"><br><br>
                <label for="country_code"> Country Code: </label><input type="text" name="country_code" id="postal_code"><br><br>
                <label for= "phone"> Phone: </label><input type="text" name="phone" id="phone"><br><br>
                <label for="email"> Email: </label><input type="text" name="email" id="email"><br><br>
                <label for="password"> Password: </label><input type="text" name="password" id="password"><br><br>
    </form>



    <?php  endif; ?>
</main>
<?php include '../view/footer.php'; ?>