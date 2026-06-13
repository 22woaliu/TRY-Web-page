<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $conn = mysqli_connect('localhost', 'root', '', 'try_web_page');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO members (name, email, phone) VALUES ('$name', '$email', '$phone')";

    $insert = mysqli_query($conn, $sql);

    if ($insert) {
        echo "<script>
            alert('Member added successfully!');
            window.location.href = 'try.html';
        </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>