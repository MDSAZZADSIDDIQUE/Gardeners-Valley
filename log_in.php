<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans&display=swap" rel="stylesheet">
    <title>Document</title>
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
    .heading {
        font-size: 75px;
    }
    fieldset {
        background-color: #000000;
        display: inline-block;
        text-align: left;
        width: 25%;
    }
    input[type = email], [type = password], [type = text] {
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
    .subheading {
        font-size: 50px;
        text-align: center;
    }
    .show_password {
        font-family: 'Open Sans', sans-serif;
    }
    a {
        text-decoration: none;
        color: #FFFFFF;
    }
    .forgottenPassword {
        font-family: 'Open Sans', sans-serif;
    }
</style>
<body>
    <table>
        <tr>
            <td class="heading"><a href="">GARDENERS VALLEY</a></td>
        </tr>
        <tr>
            <td>
                <form action="">
                    <fieldset>
                        <p class="subheading">Log in</p>
                        <hr>
                        <label for="email_address">Email address: </label>
                        <hr>
                        <input type="email" name="emailAddress" id="email_address">
                        <hr>
                        <label for="password">Password: </label>
                        <hr>
                        <input type="password" name="password" id="password" >
                        <hr>
                        <input type="checkbox" name="showPassword" id="show_password" onclick="myFunction()">
                        <label for="show_password" class="show_password">Show password</label>
                        <hr>
                        <a href="" class="forgottenPassword">Forgotten password?</a>
                        <hr>
                        <input type="submit" value="Log in">
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