<?php

function calculateGrade($cgpa)
{
    if ($cgpa >= 9)
    {
        return ["Excellent", "success"];
    }
    elseif ($cgpa >= 8)
    {
        return ["Very Good", "primary"];
    }
    elseif ($cgpa >= 7)
    {
        return ["Good", "warning"];
    }
    else
    {
        return ["Keep Improving", "danger"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<?php

if(isset($_POST['submit']))
{

$name=$_POST['name'];
$email=$_POST['email'];
$cgpa=$_POST['cgpa'];
$branch=$_POST['branch'];
$college=$_POST['college'];

$result=calculateGrade($cgpa);

$grade=$result[0];
$color=$result[1];

?>

<div class="card shadow">

<div class="card-header bg-success text-white">

<h2>Registration Successful</h2>

</div>

<div class="card-body">

<div class="alert alert-<?php echo $color; ?>">

<h3>Welcome <?php echo $name; ?></h3>

<hr>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>College :</b> <?php echo $college; ?></p>

<p><b>CGPA :</b> <?php echo $cgpa; ?></p>

<p><b>Performance :</b> <?php echo $grade; ?></p>

<p><b>Date :</b> <?php echo date("l, d F Y"); ?></p>

</div>

<a href="index.php" class="btn btn-primary">

Register Another Student

</a>

</div>

</div>

<?php

}

else

{

?>

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2>Student Registration Form</h2>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">Student Name</label>

<input type="text" name="name" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input type="email" name="email" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">CGPA</label>

<input type="number" step="0.01" name="cgpa" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Branch</label>

<input type="text" name="branch" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">College</label>

<input type="text" name="college" class="form-control" required>

</div>

<button type="submit" name="submit" class="btn btn-success w-100">

Submit Registration

</button>

</form>

</div>

</div>

<?php

}

?>

</div>

</body>

</html>