<?php
$errors = []; // Initialize an empty array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    $name = $_POST['name'];
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    // Validate Phone Number
    $phone = $_POST['phone'];
    if (empty($phone)) {
        $errors['phone'] = "Phone Number is required";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors['phone'] = "Invalid Phone Number format (10 digits)";
    }

    // Validate Email Address
    $email = $_POST['email'];
    if (empty($email)) {
        $errors['email'] = "Email Address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid Email Address format";
    }

    // If no errors, proceed to the next page
    if (empty($errors)) {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        header("Location: page2form.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
      <div class="text">
        Form Page
      </div>
      <form id="page1Form" action="page2form.php" method="POST">
         <div class="form-row">
            <div class="input-data">
            <input type="text" id="name" name="name" required>
               <div class="underline"></div>
               <label for="">Name</label>
            </div>
            <div class="input-data">
            <input type="tel" id="phone" name="phone" required>
               <div class="underline"></div>
               <label for="">Phone Number</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
            <input type="email" id="email" name="email" required>
               <div class="underline"></div>
               <label for="">Email address</label>
            </div>
         </div>
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="Next">
               </div>
            </div>
      </form>
      </div>
</body>
</html>
