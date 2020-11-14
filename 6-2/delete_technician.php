<?php 

if(isset($_POST['submit'])){
    //access db
    include('../model/database.php');

    // query to delete technician
    $query = 'DELETE FROM technicians WHERE email=:techEmail';

    //prepared statement
    $prep_stmt = $db->prepare($query);

    // delete technician
    $prep_stmt->execute(['techEmail' => $_POST['techEmail']]);
}

header('Location: technician_list.php');
?>