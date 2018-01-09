<?php 
$title = "Sign In | UIN FORM";
include "inc/head.php"; ?>
<?php include "inc/navbar.php";?>
<?php include "usersession.php"; ?>
<?php include "inc/connect.php"; ?>

<?php 


if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $error = [
        'username' => '',
        'password' => ''
    ];

    if ($username == '') {
        $error['username'] = 'Username cannot be empty';
    }

    if ($password == '') {
        $error['password'] = 'Password cannot be empty';

    }

    foreach ($error as $key => $value) {
        if (empty($value)) {
            unset($error[$key]);
        }
    }

    if (empty($error)) {
        if (!login_user($username, $password)) {
            $error['password'] = 'Wrong Password or Username!';
        }
    }

}
// ?>

<div clas="container" id="formsession">
    <div class="formContainer">
        <div>
            <h3>Sign In</h3>
        </div>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="sign-in-form" id="sign-in-form" autocomplete="off">
            <div class="form-group">
       
                <input type="text" name="username" class="form-control" id="email" placeholder="username or email"  
                value="<?php echo isset($username) ? $username : '' ?>">
                <p>
                    <?php echo isset($error['username']) ? $error['username'] : '' ?>
                </p>
            </div>
            <div class="form-group">
             
                <input type="password" name="password" class="form-control" id="password" placeholder="password"
                value="<?php echo isset($password) ? $password : '' ?>">
                <p>
                    <?php echo isset($error['password']) ? $error['password'] : '' ?>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <br>
        </span>
        <div class="signup">
            Don't have an account?
            <a href="signup">Sign Up</a>
        </div>
    </div>
</div>