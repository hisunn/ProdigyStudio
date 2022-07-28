<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
$query = "DELETE FROM events WHERE DATEDIFF(NOW(), events.date) > 1";
$result = $conn->query($query);
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $password = md5($password);

    if (empty($username)) {        
        header('location:../../views/signIn/signin.php');
    }
    if (empty($password)) {        
        header('location:../../views/signIn/signin.php');
    }
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) {       

        $query = "SELECT usertype FROM users WHERE username = '$username' AND PASSWORD = '$password' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if (isset($username)) {
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $user_type = $row['usertype'];

                if ($user_type == 'admin') {
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $user_type;
                    header('location:../../views/index.php');
                } else if ($user_type == 'organizer') {
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $user_type;
                    header('location:../../views/index.php');

                   
                } else if ($user_type == 'ticketer'){
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $user_type;
                    header('location:../../views/index.php');                    
                }
            } else {
                header('location:../../views/signIn/signin.php?signin=error');
            }
        } else {
            header('location:../../views/signIn/signin.php?signin=error');
        }
    }else {
    header('location:../../views/signIn/signin.php?signin=error');

    }
} else {
    // header('location:signin.php');
}

?>