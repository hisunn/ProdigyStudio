<?php
class Registration
{
    private $username;
    private $email;
    private $password_1;
    private $password_2;
    private $usertype;
    private $firstname;
    private $lastname;


    public function __construct($username, $email, $password_1, $password_2, $firstname, $lastname)
    {
        include $_SERVER['DOCUMENT_ROOT']."/DB/db.php";
        $this->username = mysqli_real_escape_string($conn, $username);
        $this->email = mysqli_real_escape_string($conn, $email);
        $this->password_1 = mysqli_real_escape_string($conn, $password_1);
        $this->password_2 = mysqli_real_escape_string($conn, $password_2);
        $this->firstname = mysqli_real_escape_string($conn, $firstname);
        $this->lastname = mysqli_real_escape_string($conn, $lastname);
    }

    public function setUserType($usertype)
    {
        $this->usertype = $usertype;
    }


    public function validateCredentials()
    {
        $this->username;
        $this->email;
        $this->password_1;
        $this->password_2;
        $this->usertype;
        $errors = array("Username is required <br>", "Email is required <br>", "Password is required <br>", 
        "The two passwords do not match <br>", 'Username already exists <br>', 'Email already exist');
        include "../../DB/db.php";
        trim($this->username);
        if (empty($this->username)) {
            header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[0]);
            die();
        }
        if (empty($this->email)) {
            header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[1]);
            die();
        }
        if (empty($this->password_1)) {
            header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[2]);
            die();
        }
        if ($this->password_1 != $this->password_2) {
            header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[3]);
            die();
        }


        $query = "SELECT * FROM users WHERE username='$this->username' OR email='$this->email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);


        if ($user) {
            trim($this->username);
            if ($user['username'] === $this->username) {
                header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[4]);
            }

            if ($user['email'] === $this->email) {
                header('location:../../views/Registration/register.php?user=' . $this->usertype . '&error=' . $errors[5]);
            }
        }
        //should add another layer of security if's . . . . .

        if ($this->usertype == 'ticketer') {
            $this->password_1 = md5($this->password_1); //encrypt the password before saving in the database
            //usertype = 3 is for ticket buyer role
            $firstname = ucfirst($this->firstname);
            $lastname = ucfirst($this->lastname);
            $query = "INSERT INTO users (username, email, password, usertype,first_name,last_name) 
                      VALUES('$this->username', '$this->email','$this->password_1', '$this->usertype','$firstname','$lastname')";
            mysqli_query($conn, $query);
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['usertype'] = 'ticketer';
            header('location: /module/register/success.php');
        }
        if ($this->usertype == 'organizer') {

            $this->password_1 = md5($this->password_1);; //encrypt the password before saving in the database
            //usertype = 2 is for event organizer role
            $firstname = ucfirst($this->firstname);
            $lastname = ucfirst($this->lastname);
            $query = "INSERT INTO users (username, email, password, usertype,first_name,last_name) 
                          VALUES('$this->username', '$this->email', '$this->password_1', '$this->usertype','$firstname','$lastname')";
            mysqli_query($conn, $query);
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['usertype'] = 'organizer';
            header('location: /module/register/success.php');
        }
    }
}
