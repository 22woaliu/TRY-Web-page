<?php
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Database connection
        $conn = mysqli_connect('localhost', 'root', '', 'try_web_page');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Insert data into the database
        $sql = "INSERT INTO members (name, email, phone) VALUES ('$name', '$email', '$phone')";

        $insert = mysqli_query($conn, $sql);

        if ($insert) {
            echo "Your request has been submitted successfully! Press the back button to return to the home page.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>