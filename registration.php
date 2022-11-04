<?php
session_start();
if (!isset($_SESSION['firstName']))
{
    $_SESSION['firstName'] = "";
}
if (!isset($_SESSION['lastName']))
{
    $_SESSION['lastName'] = "";
}
if (!isset($_SESSION['emailAddress']))
{
    $_SESSION['emailAddress'] = "";
}
if (!isset($_SESSION['password']))
{
    $_SESSION['password'] = "";
}
if (!isset($_SESSION['confirmPassword']))
{
    $_SESSION['confirmPassword'] = "";
}
?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Gardeners Valley</title>
</head>
<style>
    body {
        background-image: url('images/pexels-sohail-nachiti-807598.jpg');
        background-size: cover;
        margin: 0;
        text-align: center;
    }
    table {
        border: 10px solid #FFFFFF;
        color: #FFFFFF;
        font-family: 'Monoton', cursive;
        height: 100vh;
        text-align: center;
        width: 100%;
    }
    td {
        font-size: 25px;
    }
    fieldset {
        background-color: #000000;
        display: inline-block;
        width: 25%;
        text-align: left;
    }
    input[type = text], [type = email], [type = password] {
        height: 25px;
        width: 100%;
    }
    input[type = submit] {
        color: #000000;
        font-family: 'Monoton', cursive;
        font-size: 25px;
        height: 50px;
        text-align: center;
    }
    .heading {
        font-size: 75px;
    }
    .subheading {
        font-size: 50px;
        text-align: center;
    }
    .error_message {
        color: red;
        font-family: 'Open Sans', sans-serif;
        text-align: left;
    }
    .show_password {
        font-family: 'Open Sans', sans-serif;
    }
    a {
        text-decoration: none;
        color: #FFFFFF;
    }
</style>
<body>
    <table>
        <tr>
            <td class="heading"><a href="index.php">GARDENERS VALLEY</a>
                <hr>
            </td>
            </tr>
            <tr>
        <td>
        <form action="registration_validation.php" method="POST">
        <fieldset>
            <p class="subheading">REGISTRATION</p>
            <hr>
            <label for="first_name">First name</label>
            <br>
            <hr>
            <input type="text" name="firstName" id="first_name" value="<?php echo $_SESSION['firstName'] ?>">
            <br>
            <?php
            if (isset($_SESSION['emptyFirstName'])) {
                echo "<p class='error_message'>First name is empty.</p>";
                unset($_SESSION['emptyFirstName']);
            }
            ?>
            <hr>
            <label for="last_name">Last name</label>
            <br>
            <hr>
            <input type="text" name="lastName" id="last_name" value="<?php echo $_SESSION['lastName'] ?>">
            <br>
            <?php
            if (isset($_SESSION['emptyLastName'])) {
                echo "<p class='error_message'>Last name is empty.</p>";
                unset($_SESSION['emptyLastName']);
            }
            ?>
            <hr>
            <label for="email_address">Email address</label>
            <br>
            <hr>
            <input type="email" name="emailAddress" id="email_address" value="<?php echo $_SESSION['emailAddress'] ?>">
            <br>
            <?php
            if (isset($_SESSION['emptyEmailAddress'])) {
                echo "<p class='error_message'>Email address is empty.</p>";
                unset($_SESSION['emptyEmailAddress']);
            }
            ?>
            <hr>
            <label for="password">Password</label>
            <br>
            <hr>
            <input type="password" name="password" id="password" value="<?php echo $_SESSION['password'] ?>">
            <br>
            <hr>
            <input type="checkbox" name="showPassword" id="show_password" onclick="myFunction()">
            <label for="show_password" class="show_password">Show password</label>
            <?php
            if (isset($_SESSION['emptyPassword'])) {
                echo "<p class='error_message'>Password is empty.</p>";
                unset($_SESSION['emptyPassword']);
            }
            ?>
            <hr>
            <label for="password">Confirm password</label>
            <br>
            <hr>
            <input type="password" name="confirmPassword" id="confirm_password" value="<?php echo $_SESSION['confirmPassword'] ?>">
            <br>
            <?php
            if (isset($_SESSION['emptyConfirmPassword'])) {
                echo "<p class='error_message'>Confirm password is empty.</p>";
                unset($_SESSION['emptyConfirmPassword']);
            }
            if (isset($_SESSION['unmatchedPassword'])) {
                echo "<p class='error_message'>Password does not match</p>";
                unset($_SESSION['unmatchedPassword']);
            }
            ?>
            <hr>
            <input type="submit" value="Register">
        </fieldset>
    </form>
        </td>
        </tr>
    </table>
    <script>
        function myFunction() {
  var password = document.getElementById("password");
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
    </script>
</body>
</html>