    <?php include '../view/header.php'; 
   
       if(isset($_POST['submit'])):
       
            $customer_id=$firstName=$lastName=$address=$city=$state=$postalCode=$countryCode=$phone=$email=$user_password="";
            $error_message="";

            include('../model/database.php');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            if(isset($_POST['first_name'])){
                $firstName = htmlspecialchars ($_POST['first_name']);
                $lastName = htmlspecialchars ($_POST['last_name']);
                $address= htmlspecialchars($_POST['address']);
                $city = htmlspecialchars($_POST['city']);
                $state = htmlspecialchars($_POST['state']);
                $postalCode = htmlspecialchars($_POST['postal_code']);
                $countryCode = htmlspecialchars($_POST['country_code']);
                $phone = htmlspecialchars( $_POST['phone']);
                $email = htmlspecialchars($_POST['email']);
                $user_password = htmlspecialchars($_POST['password']);
                $customer_id= htmlspecialchars($_POST['customerID']);
     


                
                #Error Checking 
                if(strlen($firstName) >50){
                    $error_message = "First Name is greater than 50 characters ";
                }
                elseif(strlen($lastName)>50){
                    $error_message = "Last Name is greater than 50 characters ";
                }
                elseif(strlen($lastName)>50){
                    $error_message = "Last Name is greater than 50 characters ";
                }
                elseif(strlen($address)>50){
                    $error_message = "Address is greater than 50 characters ";
                }
                elseif (strlen($city)>50) {
                    $error_message = "City is greater than 50 characters ";
                }
                elseif (strlen($state)>50) {
                    $error_message = "state is greater than 50 characters ";
                }
                elseif (strlen($postalCode)>20) {
                    $error_message = "Post Code  is greater than 20 characters ";
                }
                elseif (strlen($countryCode)>2) {
                    $error_message = "Country Code is greater than 2 characters ";
                }
                elseif (strlen($phone)>20) {
                    $error_message = "Phone is greater than 50 characters ";
                }
                elseif (strlen($email)>50) {
                    $error_message = "email is greater than 50 characters ";
                }
                elseif (strlen($user_password)>20) {
                    $error_message = "Password is greater than 50 characters ";
                }


                $query_email = 'SELECT customerID, email FROM customers';
                $execute_query_email = $db->prepare($query_email);
                $execute_query_email->execute();
                $customer_emails = $execute_query_email->fetchAll();

                
                foreach($customer_emails as $single_email){
                   
                    if($single_email['email'] == $email && $customer_id!=$single_email['customerID']){
                        $error_message=" This email is already taken!";
                        break;
                    }
                }
                $query_cc = 'SELECT countryCode FROM countries';
                $execute_query_cc = $db->prepare($query_cc);
                $execute_query_cc->execute();
                $list_country_codes= $execute_query_cc->fetchAll();

                $found_country_code = false;
                foreach($list_country_codes as $x){

                    if($x['countryCode'] ==$countryCode){
                        $found_country_code = true;
                        break;
                    }

                }

                if($error_message ==""){

                 $update_query = 'UPDATE customers SET firstName= :firstName, lastName = :lastName, address = :address, city = :city, state = :state, postalCode=:postalCode, countryCode =:countryCode, phone =:phone, email =:email,password =:password WHERE customerID =:customerID';
                 $execute_update = $db->prepare($update_query);
                 $execute_update->execute(["firstName"=>$firstName, 
                                           "lastName"=>$lastName, 
                                           "address"=>$address,
                                           "city"=>$city, 
                                           "state"=> $state,
                                           "postalCode"=>$postalCode,
                                           "countryCode"=>$countryCode, 
                                           "phone"=>$phone, 
                                           "email"=>$email, 
                                           "password"=>$user_password, 
                                           "customerID"=>$customer_id]);


                    header('Location: index.php'); 
                  
                }

               
            }
            else{
                $customer_id =htmlspecialchars( $_POST['customerID']);
                
                
                $query = 'SELECT * FROM customers WHERE customerID =:customer_id';
                $execute_query= $db->prepare($query);
                $execute_query->execute(['customer_id'=>$customer_id]);
                
                $searched_customer = $execute_query->fetch();
                $firstName = $searched_customer['firstName'];
                $lastName= $searched_customer['lastName'];
                $address=$searched_customer['address'];
                $city = $searched_customer['city'];
                $state=$searched_customer['state'];
                $postalCode=$searched_customer['postalCode'];
                $countryCode=$searched_customer['countryCode'];
                $phone=$searched_customer['phone'];
                $email=$searched_customer['email'];
                $user_password=$searched_customer['password'];

            }
            
    ?>
<main>
    <h2>
        View/Update Customer
    </h2>

       

    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                
                <label class= "fixed-width" for="first_name"> First Name: </label> <input type="text" name="first_name" id="first_name" value = "<?php echo $firstName; ?>"  ><br><br>
                <label class= "fixed-width" for="last_name"> Last Name: </label><input type="text" name="last_name" id="last_name" value = "<?php echo $lastName; ?>"><br><br>
                <label class= "fixed-width" for="address"> Address: </label><input type="text" name="address" id="address" value = "<?php echo $address; ?>"><br><br>
                <label class= "fixed-width" for="city"> City: </label><input type="text" name="city" id="city" value = "<?php echo $city; ?>"><br><br>
                <label class= "fixed-width" for="state"> State: </label><input type="text" name="state" id="state" value = "<?php echo $state; ?>"><br><br>
                <label class= "fixed-width" for="postal_code"> Postal Code: </label><input type="text" name="postal_code" id="postal_code" value = "<?php echo $postalCode; ?>"><br><br>
                <label class= "fixed-width" for="country_code"> Country Code: </label><input type="text" name="country_code" id="country_code" value = "<?php echo $countryCode; ?>"><br><br>
                <label class= "fixed-width" for= "phone"> Phone: </label><input type="text" name="phone" id="phone" value = "<?php echo $phone; ?>"><br><br>
                <label class= "fixed-width" for="email"> Email: </label><input type="text" name="email" id="email" value = "<?php echo $email; ?>"><br><br>
                <label class= "fixed-width" for="password"> Password: </label><input type="text" name="password" id="password" value = "<?php echo $user_password; ?>"><br><br>
                <input type="hidden" name="customerID" value= "<?php echo $customer_id; ?>">
                <input type="submit" name= "submit" value="Update Customer">
    </form>
    <p class = "error"> <?php echo $error_message ?></p>



    <?php  endif; ?>

</main>
<?php include '../view/footer.php'; ?>