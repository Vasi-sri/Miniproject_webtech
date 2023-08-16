<!DOCTYPE html>
<html>
<head>
    <title>Debt Management</title>
</head>
<body>
    <h1>Debt Management</h1>
    
    <?php
    $new_debt = $_POST['new_debt'];
    
    if ($new_debt) {
        // Save the new debt amount to a file or database for future reference
        
        // Retrieve and display past debt value
        $past_debt = ''; // Fetch the past debt from the file or database
        echo "<p>Past Debt Amount: $past_debt</p>";
    }
    ?>
    
    <a href="index.html">Go back</a>
</body>
</html>
