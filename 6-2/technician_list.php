<?php include '../view/header.php'; ?>
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

$dsn = 'mysql:host=localhost;dbname=tech_support';
$user ='ts_user';
$password ='pa55word';
$connection = new PDO($dsn, $user, $password);
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


?>
</table>

</main>
<?php include '../view/footer.php'; ?>