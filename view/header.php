<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>SportsPro Technical Support</title>
    <link rel="stylesheet" type="text/css"
          href="/CIS435Proj3/main.css">
</head>

<!-- the body section -->
<body>
<header>
    <h1>SportsPro Technical Support</h1>
    <p>Sports management software for the sports enthusiast</p>
    <nav>
        <ul>
            <li><a href="/CIS435Proj3">Home</a></li>
	    <?php if(isset($_SESSION['USER TYPE'])): ?>
                <li><a href="/CIS435Proj3/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/CIS435Proj3/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <?php if(isset($_SESSION['USER TYPE'])): ?>
        <p>You are logged in as a(n) <?php echo $_SESSION['USER TYPE']; ?></p>
    <?php else: ?>
        <p>You are not logged in.</p>
    <?php endif; ?>
</header>
