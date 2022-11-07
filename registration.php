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
if (!isset($_SESSION['gender']))
{
    $_SESSION['gender'] = "";
}
if (!isset($_SESSION['dateOfBirth']))
{
    $_SESSION['dateOfBirth'] = "";
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
    <title>Registration</title>
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
        background-color: rgba(0, 0, 0, 0.75);
        display: inline-block;
        font-family: 'Open Sans', sans-serif;
        width: 25%;
        text-align: left;
    }
    input[type = text], [type = email], [type = date], [type = password] {
        height: 25px;
        width: 100%;
    }
    input[type = submit] {
        color: #000000;
        font-family: 'Monoton', cursive;
        font-size: 25px;
        height: 50px;
        text-align: center;
        width: 100%;
    }
    input[type = submit]:hover {
        border: 5px solid white;
        background-color: #000000;
        color: white;
    }
    .heading {
        font-size: 75px;
    }
    .subheading {
        font-family: 'Monoton', cursive;
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
            <td class="heading">
                <a href="index.php">GARDENERS VALLEY</a>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <form action="registration_validation.php" method="POST">
                    <fieldset>
                        <p class="subheading">REGISTRATION</p>
                        <hr>
                        <label for="first_name">First name : </label>
                        <hr>
                        <input type="text" name="firstName" id="first_name" value="<?php echo $_SESSION['firstName'] ?>">
                        <?php
                        if (isset($_SESSION['emptyFirstName'])) {
                            echo "<p class='error_message'>First name is empty.</p>";
                            unset($_SESSION['emptyFirstName']);
                        }
                        if (isset($_SESSION['invalidFirstName'])) {
                            echo "<p class='error_message'>Invalid first name.</p>";
                            unset($_SESSION['invalidFirstName']);
                        }
                        ?>
                        <hr>
                        <label for="last_name">Last name : </label>
                        <hr>
                        <input type="text" name="lastName" id="last_name" value="<?php echo $_SESSION['lastName'] ?>">
                        <?php
                        if (isset($_SESSION['emptyLastName'])) {
                            echo "<p class='error_message'>Last name is empty.</p>";
                            unset($_SESSION['emptyLastName']);
                        }
                        if (isset($_SESSION['invalidLastName'])) {
                            echo "<p class='error_message'>Invalid last name.</p>";
                            unset($_SESSION['invalidLastName']);
                        }
                        ?>
                        <hr>
                        <label>Gender : </label>
                        <hr>
                        <input type="radio" name="gender" id="male" value="Male">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">Female</label>
                        <?php
                        if (isset($_SESSION['emptyGender'])) {
                            echo "<p class='error_message'>Gender is empty.</p>";
                            unset($_SESSION['emptyGender']);
                        }
                        ?>
                        <hr>
                        <label for="date_of_birth">Date of birth : </label>
                        <hr>
                        <input type="date" name="dateOfBirth" id="date_of_birth">
                        <?php
                        if (isset($_SESSION['emptyDateOfBirth'])) {
                            echo "<p class='error_message'>Date of birth is empty.</p>";
                            unset($_SESSION['emptyDateOfBirth']);
                        }
                        ?>
                        <hr>
                        <label for="email_address">Email address : </label>
                        <hr>
                        <input type="email" name="emailAddress" id="email_address" value="<?php echo $_SESSION['emailAddress'] ?>">
                        <?php
                        if (isset($_SESSION['emptyEmailAddress'])) {
                            echo "<p class='error_message'>Email address is empty.</p>";
                            unset($_SESSION['emptyEmailAddress']);
                        } else if (isset($_SESSION['invalidEmailAddress'])) {
                            echo "<p class='error_message'>Email address is invalid.</p>";
                            unset($_SESSION['invalidEmailAddress']);
                        } else if (isset($_SESSION['usedEmail'])) {
                            echo "<p class='error_message'>Email address is already in use.</p>";
                            unset($_SESSION['usedEmail']);
                        }
                        ?>
                        <hr>
                        <label for="password">Password : </label>
                        <hr>
                        <input type="password" name="password" id="password" value="<?php echo $_SESSION['password'] ?>">
                        <hr>
                        <input type="checkbox" name="showPassword" id="show_password" onclick="myFunction()">
                        <label for="show_password" class="show_password">Show password</label>
                        <?php
                        if (isset($_SESSION['emptyPassword'])) {
                            echo "<p class='error_message'>Password is empty.</p>";
                            unset($_SESSION['emptyPassword']);
                        }
                        else if (isset($_SESSION['weakPassword'])) {
                            echo "<p class='error_message'>Password must be 6 characters long.</p>";
                            unset($_SESSION['weakPassword']);
                        }
                        ?>
                        <hr>
                        <label for="password">Confirm password : </label>
                        <hr>
                        <input type="password" name="confirmPassword" id="confirm_password" value="<?php echo $_SESSION['confirmPassword'] ?>">
                        <?php
                        if (isset($_SESSION['emptyConfirmPassword'])) {
                            echo "<p class='error_message'>Confirm password is empty.</p>";
                            unset($_SESSION['emptyConfirmPassword']);
                        }
                        else if (isset($_SESSION['unmatchedPassword'])) {
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