<?php
// check if usere chose to be remembered
if (!empty($_COOKIE['remember-me'])) {
    $email = $_COOKIE['remember-me'];
    $remember_me = true;
} else {
    $remember_me = false;
}

// Array for storing error messages to be shown to user later.
$errors = [];
$errors['email'] = false;
$errors['password'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postRequest = true;


    // store endereed email and password in variables.
    $password   = $_POST["password"];
    $email      = $_POST["email"];

    // check if user can be identified by the input.
    $user_identified = false;

    if (empty($email)) {
        $errors['email'] = true;
    }

    if (empty($password)) {
        $errors['password'] = true;
    }

    if ($email == 'e@mail.at' && $password == 'password') {
        $user_identified = true;
    }

    // if user credentials are correct, set username as session cookie
    if ($user_identified) {
        $_SESSION["username"] = 'Max Mustermann';

        // store username/email as cookie if remember-me is set.
        // else delete the cookie (set negative time)
        if (isset($_POST['remember-me'])) {
            setcookie('remember-me', $email, time() + (10 * 365 * 24 * 60 * 60));
        } else {
            setcookie("remember-me", "", time() - 3600);
        }

        header('Location: ./index.php?menu=login_success');
    }
    $placeholderValueEmail = 'value="'.$email.'"';
} else {
    $placeholderValueEmail = 'placeholder="name@example.com"';
}
?>

<div class="form-signin shadow-lg container">
    <form method="POST">
        <!-- Deaktiviert weil auf index.php dargestellt:

        <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1>Hotel XYZ</h1>

        
        <h2 class="h4 mb-3 fw-normal">Please sign in</h2>
        <p>
            email = e@mail.at<br>
            password = password<br>
        </p>
        -->
        <div class="form-floating">
            <input type="email" name="email" class="form-control <?php if ($errors['email']) echo 'is-invalid'; ?>" id=" floatingInput" <?php echo $placeholderValueEmail; ?>>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control <?php if ($errors['password']) echo 'is-invalid'; ?>" id="floatingPassword" placeholder="Password" value="">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember-me" <?php if ($remember_me) echo 'checked'; ?>> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-outline-dark mb-3" type="submit">login</button>
        <a href="./index.php?menu=registrierung" class="w-100 btn btn-lg btn-dark" role="button">registrieren</a>
    </form>
</div>