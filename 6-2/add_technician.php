<?php
    
    include('../view/header.php');

    $error = "";

    // store info entered
    if(isset($_POST['submit'])){
        $firstName = ($_POST['firstName']);
        $lastName = ($_POST['lastName']);
        $email = ($_POST['email']);
        $phone = ($_POST['phone']);
        $passwordTech = ($_POST['password']);
    }

    // format the phone number to have hyphens, uses regex
    // inserts '-' at 4th and 8th 
    $formattedPhone = preg_replace("/^(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone);

    if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($passwordTech)){
        include('../model/database.php');
        $query = 'INSERT INTO technicians (firstname, lastName, email, phone, password)' . 'VALUES (:firstName, :lastName, :email, :phone, :password)';

        $prep_stmt = $db->prepare($query);
        $prep_stmt->execute(['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email, 'phone' => $formattedPhone, 'password' => $passwordTech]);
        echo $prep_stmt->rowCount();
        header('Location: technician_list.php');
    }
    else{
        $error = "Error. One or more data fields were empty!";
    }
?>

<main>
    <h2>Add Technician</h2>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <label class="fixed-width" for="firstName">First name: </label>
        <input id="firstName" type="text" name="firstName" placeholder="First Name"></br></br>
        <label class="fixed-width" for="lastName">Last name: </label>
        <input id="lastName" type="text" name="lastName" placeholder="Last Name"></br></br>
        <label class="fixed-width" for="email">Email: </label>
        <input id="email" type="text" name="email" placeholder="Email"></br></br>
        <label class="fixed-width" for="phone">Phone: </label>
        <input id="phone" type="text" name="phone" placeholder="Phone"></br></br>
        <label class="fixed-width" for="password">Password: </label>
        <input id="password" type="text" name="password" placeholder="Password"></br></br>
        <label class="fixed-width">&nbsp;</label>
        <input type="submit" name="submit" value="Add Technician"><br><br>
    </form>   
    <p><a href="../6-2/technician_list.php">View Technician List</a></p>
    <p class="error"><?php echo $error; ?></p>
</main>
<?php include '../view/footer.php'; ?>