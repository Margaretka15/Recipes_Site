<?php
if(isset($_POST['login']) && isset($_POST['pass']))
{
    if ($_POST['login'] != "" && $_POST['pass'] != "")
    {
        $pass = $_POST['pass'];
        $login = $_POST['login'];

        include '../database/database.php';

        $sql = "SELECT Id, Name, Access FROM users WHERE Name='$login' AND Pass='$pass' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION['name'] = $row['Name'];
            $_SESSION['access'] = $row['Access'];
            $_SESSION['id'] = $row['Id'];
            mysqli_close($conn);
            header("Location: ../page/index.php");
        }
        else
        {
            header("Location: login-page.php?error=1"); /// niewłaściwa nazwa lub hasło
        }
    }
}

if(empty($_POST['login']) || empty ( $_POST['pass']))
{
    header("Location: login-page.php?error=2");
}

