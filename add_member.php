<?php
session_start();

$host = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "try_web_page";

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pageTitle = "Add New Member";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_member'])) {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    $stmt = $conn->prepare("INSERT INTO members (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        

        header("Location: members.php");
        exit();
    } else {
        $errorMessage = "Error inserting record: " . $conn->error;
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TRY</title>
    <link rel="stylesheet" href="try.css">
</head>
<body>

<main class="content-container">
    
    <?php 
        include('admin_header.php'); 
    ?>
    
    <br><br>
    <h2 style="text-align: center; margin-bottom: 20px;">Add a New Member Profile</h2>
    
    <?php if (!empty($errorMessage)): ?>
        <div style="color: #c0392b; font-weight: bold; margin-bottom: 15px; text-align: center; font-size: 18px;">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>

    <form action="add_member.php" method="POST" class="join-form">
        
        <label for="name" style="font-size: 20px;"><b>Full Name:</b></label><br>
        <input type="text" id="name" name="name" placeholder="Enter full name" required><br><br>
        
        <label for="email" style="font-size: 20px;"><b>Email Address:</b></label><br>
        <input type="email" id="email" name="email" placeholder="Enter user email account" required><br><br>
        
        <label for="phone" style="font-size: 20px;"><b>Phone Number:</b></label><br>
        <input type="text" id="phone" name="phone" placeholder="Enter contact number"><br><br>
        
        <input type="submit" name="add_member" value="Register Member Profile">
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="members.php" style="color: #7f8c8d; text-decoration: none; font-size: 14px;">Cancel and Return to Dashboard</a>
        </div>
    </form>
    
    <br><br>

    <?php
        include('admin_footer.php'); 
        $conn->close();
    ?>

</main>

</body>
</html>