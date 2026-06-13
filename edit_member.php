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

$pageTitle = "Modify Member Profile";
$message = "";
$messageStyle = "color: green;";

$memberId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $newName = trim($_POST['name']);
    $newEmail = trim($_POST['email']);
    $newPhone = trim($_POST['phone']);
    
    $updateStmt = $conn->prepare("UPDATE members SET name = ?, email = ?, phone = ? WHERE id = ?");
    $updateStmt->bind_param("sssi", $newName, $newEmail, $newPhone, $memberId);
    
    if ($updateStmt->execute()) {
        $message = "Member information updated successfully!";
        header("Location: members.php");
    } else {
        $message = "Error updating database record: " . $conn->error;
        $messageStyle = "color: red;";
    }
    $updateStmt->close();
}

$fetchStmt = $conn->prepare("SELECT * FROM members WHERE id = ?");
$fetchStmt->bind_param("i", $memberId);
$fetchStmt->execute();
$result = $fetchStmt->get_result();
$member = $result->fetch_assoc();
$fetchStmt->close();


if (!$member && empty($message)) {
    header("Location: members.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="try.css">
</head>
<body>

<main class="content-container">
    
    <?php
        include('admin_header.php'); 
    ?>
    
    <br><br>
    <h2 style="text-align: center; margin-bottom: 20px;">Modify Member Details</h2>
    
    <?php if (!empty($message)): ?>
        <div style="<?php echo $messageStyle; ?> font-weight: bold; margin-bottom: 15px; text-align: center; font-size: 18px;">
            <?php echo $message; ?>
            <p style="color: #7f8c8d; font-size: 14px; font-weight: normal; margin-top: 5px;">Refreshing dashboard layout panel...</p>
        </div>
    <?php endif; ?>

    <form action="" method="POST" class="join-form">
        
        <label for="name" style="font-size: 20px;"><b>Full Name:</b></label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($member['name'] ?? ''); ?>" required><br><br>
        
        <label for="email" style="font-size: 20px;"><b>Email Address:</b></label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($member['email'] ?? ''); ?>" required><br><br>
        
        <label for="phone" style="font-size: 20px;"><b>Phone Number:</b></label><br>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone'] ?? ''); ?>"><br><br>
        
        <input type="submit" name="update" value="Save Changes">
        
        <div style="text-align: center; margin-top: 15px;">
            <a href="members.php" style="color: #7f8c8d; text-decoration: none; font-size: 14px;">Cancel and Return</a>
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