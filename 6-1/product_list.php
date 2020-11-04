<?php
    //start session
    include('../view/header.php');

    //get db connection
    include('../model/database.php');

    //if user is not logged in or not an admin
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
	    echo '<script>alert(\'You are not authorized to use this application!\');'
            . 'window.location=\'http://localhost/CIS435Proj3\';</script>';
    }
?>

<main>
    <h1>Product List</h1>
    <table>
	<tr>
            <th>Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th>&nbsp;</th>
	</tr>
        <?php
            //query db
            $result = $db->query('SELECT * FROM products'); 

            //iterate through records in result
            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                echo '<tr>';
		echo '<td>'. $row->productCode . '</td>';
		echo '<td>' . $row->name . '</td>';
		echo '<td>' . $row->version . '</td>';
		echo '<td>' . $row->releaseDate . '</td>';
		echo '<td><form method="POST" action="delete_product.php">'
		     . '<input type="hidden" name="code" value="' . $row->productCode . '">'
		     . '<input type="submit" name="submit" value="Delete"></form></td>';
                echo '</tr>';
	    }
        ?>
    </table>
    <p><a href="add_product.php">Add Product</a></p>
</main>

<?php
    include('../view/footer.php');
?>
