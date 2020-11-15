<?php
    //start session
    include('../view/header.php'); 
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
      echo '<script>alert(\'You are not authorized to access this page\');'
           . 'window.location = \'/CIS435Proj3\';</script>';
   exit();
   
   }
    //get db connection
    include('../model/database.php');
?>

<main>
    <h2>Technician List</h2>
    <table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th></th>
    
    </tr>
        <?php
        // query the technicians db
        $query = $db->query('SELECT * FROM technicians');

        // display each technician in row of table
         while($row = $query->fetch(PDO::FETCH_OBJ)){
            echo '<tr>';
            echo '<td>' . $row->firstName . '</td>';
            echo '<td>' . $row->lastName . '</td>';
            echo '<td>' . $row->email . '</td>';
            echo '<td>' . $row->phone . '</td>';
            echo '<td>' . $row->password . '</td>';
            echo '<td><form method="POST" action="delete_technician.php">'. '<input type="hidden" name="techEmail" value="' . $row->email . '">' . '<input type="submit" name="submit" value="Delete"></form></td>'; 
            echo '<tr>';

        }



        ?>
    </table>
    <p><a href="add_technician.php">Add Technician</a></p>

</main>
<?php include '../view/footer.php'; ?>