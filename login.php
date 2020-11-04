<?php
    //start session
    session_start();

    // stop user if they're already logged in
    if (isset($_SESSION['USER TYPE'])) {
        // go back to main page
	header('Location: /CIS435Proj3');
    }

    //vars
    $err_msg = '';

    //form has bee submitted
    if(isset($_POST['submit'])) {
        
        // if both username/email and password fields are not empty
        if (!empty($_POST['pass']) && !empty($_POST['username_or_email'])) {
            if ($_POST['user_type'] == 'customer') {
		include('model/database.php'); //include connection
	        $email = htmlentities($_POST['username_or_email']);
		$password = htmlentities($_POST['pass']);
		$sql = 'SELECT * FROM customers WHERE email=:email AND password=:pass';
		$prepared_statement = $db->prepare($sql);
		$prepared_statement->execute(['email' => $email, 'pass' => $password]);
		$row_count = $prepared_statement->rowCount();

		if ($row_count == 1) {
                    $_SESSION['USER TYPE'] = 'customer';
		    header('Location: /CIS435Proj3');
		} else { 
		    $err_msg = 'Either the password or the username is wrong';
		}
	    } else if ($_POST['user_type'] == 'technician') {
	        include('model/database.php');
		$email = htmlentities($_POST['username_or_email']);
		$password = htmlentities($_POST['pass']);
		$sql = 'SELECT * FROM technicians WHERE email=:email AND password=:pass';
		$prepared_statement = $db->prepare($sql);
		$prepared_statement->execute(['email' => $email, 'pass' => $password]);
		$row_count = $prepared_statement->rowCount();

		if ($row_count == 1) {
	            $_SESSION['USER TYPE'] = 'technician';
                    header('Location: /CIS435Proj3');
		} else {
	            $err_msg = 'Either the password or the username is wrong';
		}
	    } else if ($_POST['user_type'] == 'admin') {
		include('model/database.php'); //include connection
		$user_name = htmlentities($_POST['username_or_email']);
		$password = htmlentities($_POST['pass']);
		$sql = 'SELECT * FROM administrators WHERE username=:username AND password=:pass';
		$prepared_statement = $db->prepare($sql);
		$prepared_statement->execute(['username' => $user_name, 'pass' => $password]);
		$row_count = $prepared_statement->rowCount();

		if ($row_count == 1) {
	            $_SESSION['USER TYPE'] = 'admin';
		    header('Location: /CIS435Proj3');
		} else {
		    // either password or username is wrong
		    $err_msg = 'Either the password or the username is wrong';
		}
                
	    }
	} else { 
	    // user didn't fill in one of the text fields
            $err_msg = 'You must fill in all fields above.';
	}
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
	<meta charset="UTF-8">
        <link rel="stylesheet" href="/CIS435Proj3/main.css" type="text/css">
    </head>
    <body>
	<main>
	    <h1>Login</h1>
            <p>Logging in as a(n):</p>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="radio" id="customer" name="user_type" value="customer" checked>
                <label for="customer">Customer</label><br>
                <input type="radio" id="technician" name="user_type" value="technician">
                <label for="technician">Technician</label><br>
                <input type="radio" id="admin" name="user_type" value="admin">
		<label for="admin">Admin</label><br><br>
                <label for="user_name_or_email">Username/Email: &nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="username_or_email" id="user_name_or_email" placeholder="Enter Username/Email"><br><br>
                <label for="pass">Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="password" name="pass" id="pass" placeholder="Enter Password"><br><br>
                <input type="submit" name="submit" value="Login">
            </form>
        <p class="error"><?php echo $err_msg; ?></p>
        </main>
    </body>
</html>
