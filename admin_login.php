<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?> - My Website</title>
    <link rel="stylesheet" href="try.css">
</head>
<body>
    <main class="content-container">
        <?php 
            $pageTitle = "Home Page"; 
            include('header.php'); 
        ?>
        <br><br>
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="join-form">
                
                <label for="email" style="font-size: 20px;"><b>Email:</b></label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email"><br><br>

                <label for="password" style="font-size: 20px;"><b>Password:</b></label><br>
                <input type="password" id="password" name="password" placeholder="Enter your password"><br><br>

                <input type="submit" name="submit" value="Submit">
            </form>
        </div><br><br>

        <?php 
            include('footer.php'); 
        ?>
    </main>
</body>
</html>
