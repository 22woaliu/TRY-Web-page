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

$query = "SELECT * FROM members ORDER BY id ";
$result = $conn->query($query);

$pageTitle = "Manage Members";
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
    <h2 style="text-align: center; margin-bottom: 20px;">Members Management Dashboard</h2>
    
    <div style="margin-bottom: 20px; text-align: right;">
        <a href="add_member.php" style="background-color: #2ecc71; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold;">+ Add New Member</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: left; background-color: #fff;">
        <thead>
            <tr style="background-color: #34495e; color: white;">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action1</th>
                <th>Action2</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo ($row['id'] ??''); ?></td>
                        <td><?php echo ($row['name'] ?? ''); ?></td>
                        <td><?php echo ($row['email'] ??''); ?></td>
                        <td><?php echo ($row['phone'] ??''); ?></td>
                        <td><a href="edit_member.php?id=<?php echo $row['id']; ?>" style="color: #2980b9; text-decoration: none; margin-right: 15px; font-weight: bold;">Modify</a></td>
                        <td><a href="delete_member.php?id=<?php echo $row['id']; ?>" style="color: #c0392b; text-decoration: none; font-weight: bold;">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center; color: #7f8c8d;">No member records found in the system.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <br><br>

    <?php 
        include('admin_footer.php'); 
        $conn->close();
    ?>

</main>

</body>
</html>
