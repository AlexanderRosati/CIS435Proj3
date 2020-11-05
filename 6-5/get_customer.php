<?php
    // include header
    include('../view/header.php');

    // make sure user is authorized
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
        echo '<script>alert(\'You are not authorized to use this application!\');'
             . 'window.location = \'/CIS435Proj3\';</script>';
	exit();
    }

    // set error message if there is one
    $err_msg = "";

    if(isset($_GET['err']) && $_GET['err'] == 'true') {
        $err_msg = 'Enter valid email.';
    } else if (isset($_GET['notfound']) && $_GET['notfound'] == 'true') {
       $err_msg = 'Email not found'; 
    } else if (isset($_GET['noproducts']) && $_GET['noproducts'] == 'true') {
        $err_msg = 'The customer has no products';
    }
?>

<main>
    <h1>Get Customer</h1>
    <p>You must enter the customer's email address to select the customer.</p>
    <form method="POST" action="create_incident.php">
        <label for="cust_email">Email:&nbsp;&nbsp;&nbsp;</label>
        <input id="cust_email" name="cust_email" type="text" placeholder="Email">
        <input name="submit" type="submit" value="Get Customer">
    </form>
    <p class="error"><?php echo $err_msg; ?></p>
</main>

<?php
    include('../view/footer.php');
?>
