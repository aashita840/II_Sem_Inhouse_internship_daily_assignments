<?php

$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$phone = $_POST['phone'];

$errors = [];

// Name Validation
if(empty($name)){
    $errors[] = "Name is required.";
}

// Email Validation
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "Invalid Email Address.";
}

// Phone Validation
if(strlen($phone)!=10 || !is_numeric($phone)){
    $errors[] = "Phone number must be exactly 10 digits.";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<?php

if(count($errors)>0){

echo "<div class='alert alert-danger'>";
echo "<h4>Errors</h4>";
echo "<ul>";

foreach($errors as $error){
echo "<li>$error</li>";
}

echo "</ul>";
echo "</div>";

}else{

?>

<div class="card shadow p-4">

<h2 class="text-success">
Registration Successful
</h2>

<hr>

<p><strong>Name:</strong> <?php echo $name; ?></p>

<p><strong>Email:</strong> <?php echo $email; ?></p>

<p><strong>Branch:</strong> <?php echo $branch; ?></p>

<p><strong>Phone:</strong> <?php echo $phone; ?></p>

<h4 class="text-primary">
Welcome, <?php echo $name; ?>!
</h4>

</div>

<?php } ?>

</div>

</body>
</html>