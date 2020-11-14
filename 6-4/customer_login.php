<?php
    
    include('../view/header.php');

    $error = "";

    // submit email entered
    if(isset($_POST['submit'])){
        
    }








?>


<main>
<h2>Customer Login</h2>
<p>You must login before you can register a product.</p>
<form action="index.php" method="post">
<label for="search">Email: </label> 
<input type="text" name="customerLogin" id="login" placeholder="email">
<input type="submit" value="submit"> <br><br>



</main>