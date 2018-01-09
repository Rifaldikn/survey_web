<?php $title = "Sign Up | UIN FORM"; ?>
<?php include "inc/connect.php" ?>
<?php include "inc/head.php"; ?>
<?php include "inc/navbar.php"; ?>
<?php include "usersession.php"; ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if (strlen($username) < 4) {
        $error['username'] = 'Username needs to be longer';
    }
    if ($username == '') {
        $error['firstname'] = 'First cannot be empty';
    }
    if ($username == '') {
        $error['lastname'] = 'Lastname cannot be empty';
    }
    if ($username == '') {
        $error['username'] = 'Username cannot be empty';
    }
    if ($password == '') {
        $error['password'] = 'Password cannot be empty';
    }
    if ($email == '') {
        $error['email'] = 'Email cannot be empty';
    }

    // if (username_exists($username)) {

    //     $error['username'] = 'Username already exists, pick another another';
    // }

    

    // if (email_exists($email)) {
    //     $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';
    // }



    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
        }
    } // foreach

    if (empty($error)) {
        signup_user($firstname, $lastname, $username, $email, $password);
        // login_user($username, $password);
    }

}

?>


<div class="container" id="formsession">
    <div class="formContainer justify-content-center">
        <h3>Sign Up</h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="sign-up-form" id="sign-up-form" autocomplete="off">
            <div class="form-group">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="firstname"
                value="<?php echo isset($firstname) ? $firstname : '' ?>" >
                <p>
                    <?php echo isset($error['firstname']) ? $error['firstname'] : '' ?>
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>">
                <p>
                    <?php echo isset($error['lastname']) ? $error['lastname'] : '' ?>
                </p>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="username" 
                value="<?php echo isset($username) ? $username : '' ?>">
                <p>
                    <?php echo isset($error['username']) ? $error['username'] : '' ?>
                </p>
            </div>
            <div class="form-group">
                <!-- <label for="email">Email address</label> -->
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="your@mail.com"
                    required value="<?php echo isset($email) ? $email : '' ?>">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                <p>
                    <?php echo isset($error['email']) ? $error['email'] : '' ?>
                </p>
            </div>
            <div class="form-group">
                <!-- <label for="password">Password</label> -->
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" 
                value="<?php echo isset($password) ? $password : '' ?>">
                <p>
                    <?php echo isset($error['password']) ? $error['password'] : '' ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
               
            </div>
        </form>
        <br>
        <div class="signup">
            Already have an account?
            <a href="sign-in">Sign In</a>
        </div>
    </div>
</div>