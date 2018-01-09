<?php 

function signup_user($firstname, $lastname, $username, $email, $password)
{
    global $conn;
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password1 = mysqli_real_escape_string($conn, $password);
    $date = date("Y-m-d H:i:s");

    $password = password_hash($password1, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO user (firstname, lastname, username, email, password, level_user, date_registered) ";
    $query .= "VALUES( '{$firstname}', '{$lastname}', '{$username}','{$email}', '{$password}', '2', '{$date}')";
    $register_user_query = mysqli_query($conn, $query);

    login_user($username, $password1);
}

function login_user($username, $password)
{

    global $conn;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    $query = "SELECT * FROM user WHERE username = '{$username}' OR email='{$username}' ";
    $select_user_query = mysqli_query($conn, $query);
    // var_dump($select_user_query);
    if (!$select_user_query) {
        die("QUERY FAILED" . mysqli_error($conn));
    }

    if (mysqli_num_rows($select_user_query) > 0) {
        while ($row = mysqli_fetch_array($select_user_query)) {
            $db_user_id = $row['user_id'];
            $db_user_firstname = $row['firstname'];
            $db_user_lastname = $row['lastname'];
            $db_user_username = $row['username'];
            $db_user_password = $row['password'];
            $db_user_email = $row['email'];
            $db_user_role = $row['level_user'];

        }
        // var_dump($password, $db_user_password);
        // if ($password == $db_user_password) {
        if (password_verify($password, $db_user_password)) {
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_user_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['level_user'] = $db_user_role;
            $_SESSION['status'] = true;
                // echo ("VALID PASSWORD!!");
            header("Location: dashboard");
            die();
        } else {
            return false;
        }

    } else {
        return false;
    }

}
?>