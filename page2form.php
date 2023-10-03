<?php
session_start();

// Validate Page 1 Form Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['email'] = $_POST['email'];

    // Redirect to Page 2
    header("Location: page2form.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
      <div class="text">
        Form Page 2
      </div>
      <form id="page2Form" action="successform.php" method="POST">
         <div class="form-row">
            <div class="input-data">
            <input type="text" id="location" name="location" required>
               <div class="underline"></div>
               <label for="">Location</label>
            </div>
            <div class="input-data">
            <input type="number" id="age" name="age" required>
               <div class="underline"></div>
               <label for="">Age</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
            <input type="text" id="university" name="university" required>
               <div class="underline"></div>
               <label for="">University</label>
            </div>
         </div>
            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="Submit">
               </div>
            </div>
      </form>
      </div>
</body>
</html>

