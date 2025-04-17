<?php
$insert = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $server = "localhost";
    $username = "root";
    $password = ""; 
    $database = "Trip"; 


    $con = mysqli_connect($server, $username, $password, $database);


    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = $_POST["name"];
    $age = $_POST["age"];
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $mail = mysqli_real_escape_string($con, $_POST["mail"]);
    $desc = mysqli_real_escape_string($con, $_POST["desc"]); 

  
    $sql = "INSERT INTO `trip` (`Name`, `Age`, `PhoneNumber`, `Gender`, `Email`, `Other`, `Dt`) 
            VALUES ('$name', '$age', '$phone', '$gender', '$mail', '$desc', current_timestamp());";


    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br>" . $con->error;
    }


    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="img" src="pexels-mateusz-dach-99805-409162.jpg" alt="scenery">
    <div class="container">
        <h1>Welcome to Travel Form</h1>
        <p>Enter your details.</p>

     
        <?php if ($insert): ?>
            <p class="submit msg">Thanks for Submitting</p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name..." required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" placeholder="Enter your age..." required>

            <label for="phone">Phone:</label>
            <input type="number" id="phone" name="phone" placeholder="Enter your phone number..." required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" placeholder="Enter your gender..." required>

            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" placeholder="Enter your email..." required>

            <label for="desc">Additional Info:</label>
            <textarea id="desc" name="desc" placeholder="Enter your text here..." required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
