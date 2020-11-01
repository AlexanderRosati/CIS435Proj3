<?php include '../view/header.php'; ?>
<main>

<h2> Customer Search</h2>
<form action="index.php" method="post">
<label for="search">Last Name: </label> 
<input type="text" name="last_name_search" id="search" placeholder="Last Name">
<input type="submit" value="Search"> <br>

</form>
<h2> Result </h2>
<table>
<tr>
  <th>Name</th>
  <th>Email Address</th>
  <th>City</th>
  <th> </th>  
 
</tr>
<?php
if(isset($_POST['last_name_search'])){
    $dsn = 'mysql:host=localhost;dbname=tech_support';
    $user ='root';
    $lastname= htmlspecialchars($_POST['last_name_search']).'%';
    $connection = new PDO($dsn, $user);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
   
    $query = 'SELECT firstName, lastName, email, city FROM customers WHERE lastName LIKE :last_name';
    $execute_query= $connection->prepare($query);
    $execute_query->execute(['last_name'=>$lastname]);

    $searched_customers = $execute_query->fetchAll();
    
    foreach($searched_customers as $customer){  ?>
    <tr>
    <td> <?php echo $customer['firstName'].' '.$customer['lastName']; ?> </td>
    <td> <?php echo $customer['email']; ?>  </td>
    <td> <?php echo $customer['city']; ?> </td>
    <td> <?php echo ' '; ?> </td>
    </tr>

    <?php } }?>
</table>





</main>



<?php include '../view/footer.php'; ?>