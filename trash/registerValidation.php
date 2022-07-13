<html>

<body>

    <?php
    include "../ProdigyStudio/DB/db.php";
 

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['confirm'];

    $data = $_POST;


    $sql = "INSERT INTO ticketbuyer (username, password, email)
        VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql) === TRUE) {
        header('location:/success.php');    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    if (
        isset($data['username']) ||
        isset($data['password']) ||
        isset($data['email']) ||
        isset($data['confirm'])
    ) {
        echo "salah bang";
    } else {
    }



    if ($data['password'] !== $data['confirm']) {
        die('Password and Confirm password should match!');
    }

    ?>











</body>

</html>