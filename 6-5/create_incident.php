<?php
    // include header
    include('../view/header.php');

    // make sure user is admin
    if (!isset($_SESSION['USER TYPE']) || $_SESSION['USER TYPE'] != 'admin') {
        echo '<script>alert(\'You are not authorized to use this application!\');'
             . 'window.location=\'/CIS435Proj3\';</script>';
	exit();
    }

    // inserting an incident
    if (isset($_POST['insert'])) {
	//include db connection
        include('../model/database.php');

	//insert incident
	$cID = $_POST['cust_id'];
	$pCode = $_POST['product'];
	$techID = NULL;
	$date_opened = date('Y-m-d');
	$date_closed = NULL;
	$title = $_POST['title'];
	$description = $_POST['desc'];
        $sql = 'INSERT INTO incidents (customerID, productCode, techID, dateOpened, dateClosed, title, description)'
		. 'VALUES (:cID, :pCode, :techID, :dateOpened, :dateClosed, :title, :description)';

	$pre_stmt = $db->prepare($sql);
	$pre_stmt->execute([
	    'cID' => $cID,
	    'pCode' => $pCode,
	    'techID' => $techID,
	    'dateOpened' => $date_opened,
	    'dateClosed' => $date_closed,
	    'title' => $title,
	    'description' => $description  ]);

	// display success message
	if ($pre_stmt->rowCount() == 1) {
            echo '<h1>Create Incident</h1>';
	    echo '<p>This incident was added to our database</p>';
	    exit();
	} else {
            echo 'The incident was <em>not</em> created. :(';
	    exit();
	}
    }

    // if data wasn't POST'd
    if (!isset($_POST['submit'])) {
        // go to get customer page
        header('Location: get_customer.php?err=true');      
	exit();
    }

    // if email is not valid
    if (!filter_input(INPUT_POST, 'cust_email', FILTER_VALIDATE_EMAIL)) {
        header('Location: get_customer.php?err=true');
	exit();
    }

    // get customer's id
    include('../model/database.php');
    $sql = 'SELECT customerID, firstName, lastName FROM customers WHERE email=:email';
    $pre_stmt = $db->prepare($sql);
    $pre_stmt->execute(['email' => $_POST['cust_email']]);

    // if we get no records
    if ($pre_stmt->rowCount() == 0) {
        header('Location: get_customer.php?notfound=true');
	exit();
    } else {
	// get customer    
        $customer = $pre_stmt->fetch(PDO::FETCH_OBJ);
        
	// get customer's products
	$sql = 'SELECT p.name, p.productCode FROM registrations r, products p WHERE r.productCode=p.productCode AND r.customerID=:custID';
	$pre_stmt = $db->prepare($sql);
	$pre_stmt->execute(['custID' => $customer->customerID]);

	// see if number of products is 0
	if ($pre_stmt->rowCount() == 0) {
            header('Location: get_customer.php?noproducts=true');
	    exit();
	} else {
            $products = $pre_stmt->fetchAll(PDO::FETCH_OBJ);
	}
    }
?>

<main>
    <h1>Create Incident</h1>
    <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <label class="fixed-width">Customer:</label>
        <span><?php echo $customer->firstName . ' ' . $customer->lastName; ?></span><br><br>
        <label class="fixed-width" for="product">Product:</label>
	<select id="product" name="product">
	    <?php foreach($products as $product): ?>
                <option value="<?php echo $product->productCode; ?>"><?php echo $product->name; ?></option>
	    <?php endforeach; ?>
	</select><br><br>
        <label class="fixed-width" for="title">Title:</label>
	<input id="title" type="text" placeholder="Title" name="title"><br><br>
	<label class="fixed-width" for="desc">Description:</label>
        <textarea id="desc" name="desc" placeholder="Enter Description Here" rows="6" cols="36"></textarea><br><br>
        <label class="fixed-width">&nbsp;</label>
        <input id="submitBtn" name="submitBtn" type="button" value="Create Incident">
        <input name="insert" type="hidden" value="set">
        <input name="cust_id" type="hidden" value="<?php echo $customer->customerID?>">
    </form>
    <p id="err_msg" class="error"></p> 
</main>
<script>
    let onSubmit = function() {
        let title = document.getElementById('title').value;
	let description = document.getElementById('desc').value;
	let form = document.getElementById('form');

	if (title === '' || description === '') {
            let errMsg = document.getElementById('err_msg');
            errMsg.innerText = 'You must fill in a title and a description.';
	} else {
            form.submit();
	}
    };

    window.onload = function() {
        document.getElementById('submitBtn').onclick = onSubmit;
    }
</script>
<?php
    include('../view/footer.php');
?>
