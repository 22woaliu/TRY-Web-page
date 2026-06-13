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

$pageTitle = "Delete Member";
$message = "";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $conn->prepare("DELETE FROM members WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $message = "Member record has been successfully deleted.";

        header("Location: members.php");
    } else {
        $message = "Error handling request execution: " . $conn->error;
        header("refresh:3; url=members.php");
    }
    $stmt->close();
} else {
    header("Location: members.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TRY</title>
    <link rel="stylesheet" href="try.css">
</head>
<body>

<main class="content-container">
    
    <?php 
        include('admin_header.php'); 
    ?>
    
    <br><br>
    
    <div style="max-width: 500px; margin: 40px auto; padding: 30px; background-color: #fff; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); text-align: center;">
        <h2 style="color: #c0392b; margin-bottom: 15px;">Processing Deletion</h2>
        
        <p style="font-size: 18px; font-weight: bold; color: #2c3e50;">
            <?php echo $message; ?>
        </p>
        
        <br>
        <p style="color: #7f8c8d; font-size: 14px;">Redirecting you back to the system control board shortly...</p>
        
        <br>
        <a href="members.php" style="display: inline-block; background-color: #34495e; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; font-weight: bold;">Return Immediately</a>
    </div>
    
    <br><br>

    <?php 
        include('admin_footer.php'); 
        $conn->close();
    ?>

</main>

</body>
</html>