<?php
session_start();
?>

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
    .header {
        font-size: 50px;
    }
    a {
        text-decoration: none;
        color: #FFFFFF;
    }
    form {
        font-family: 'Open Sans', sans-serif;
        font-size: 50px;
    }
    fieldset {
        background-color: rgba(0, 0, 0, 0.75);
        display: inline-block;
    }
    input {
        font-size: 25px;
        margin-top: 25px;
        width: 50%;

    }
    input:hover {
        border: 5px solid #FFFFFF;
        background-color: black;
        color: white;
    }
    select {
        width: 50%;
        font-size: 25px;
        margin-top: 25px;
    }
</style>
<body>
    <table>
        <tr>
            <td class="header">
                <a href="">GARDENERS VALLEY</a>
                <hr>
            </td>
        </tr>
        <tr>
            <td>
                <form action="add_role.php" method="POST">
                    <fieldset>
                        <label for="role">Select your role : </label>
                        <select name="role" id="role">
                        <option value="Buyer">Buyer</option>
                        <option value="Seller">Seller</option>
                        <option value="Expert">Expert</option>
                        <option value="Delivery man">Delivery man</option>
                        </select>
                        <input type="submit" value="Submit">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>