<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $shopName = $_POST["shopname"]; // Assuming shop name is stored in the same column
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    // SQL query to insert owner data into the database
    $sql = "INSERT INTO owners (name, shopname, phone, email, password) VALUES ('$name', '$shopName', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #FFFFFF;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .signup-container {
      background-color: #7cdcf2;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 60%;
    }
    .signup-container h2 {
      text-align: center;
    }
    .signup-form {
      display: flex;
      flex-direction: column;
    }
    .signup-form label,
    .signup-form input {
      margin-bottom: 10px;
    }
    .signup-form input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .signup-form button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 3px;
      cursor: pointer;
    }
    .signup-form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <h2>Sign Up for Owners</h2>
    <form class="signup-form" action="" method="post">
      
 	<label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

 	 <label for="shopname">Shop name:</label>
      <input type="text" id="shopname" name="shopname" required>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" required>

	<label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" name ="submit" value="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>
