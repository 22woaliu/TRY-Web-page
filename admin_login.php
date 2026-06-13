<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TRY</title>
    <link rel="stylesheet" href="try.css">
</head>
<body>
    <main class="content-container">
        <br><br>
        <?php
            session_start();

            $staticEmail = "admin@try.org";
            $staticPassword = "password123";
            $errorMessage = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                $inputEmail = trim($_POST['email']);
                $inputPassword = $_POST['password'];

                if ($inputEmail === $staticEmail && $inputPassword === $staticPassword) {
                    header("Location: admin_home.html");
                    exit();
                } else {
                    $errorMessage = "Invalid email or password!";
                }
            }
            $pageTitle = "Admin Login";
            include('header.php');
        ?>
        <br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="join-form">
            <?php if (!empty($errorMessage)): ?>
                <div style="color: red; font-weight: bold; margin-bottom: 15px; text-align: center;">
                    <?php echo $errorMessage; ?>
                </div>
            <?php endif; ?>

            <label for="email" style="font-size: 20px;"><b>Email:</b></label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

            <label for="password" style="font-size: 20px;"><b>Password:</b></label><br>
            <input type="password" id="password" name="password" placeholder="Enter your password" required><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
        </div><br><br>

        <?php 
            include('footer.php'); 
        ?>
    </main>
</body>
</html>