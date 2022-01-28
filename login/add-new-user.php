<?php
session_start();
if(!isset($_SESSION['id']))
{
    if(empty($_POST['name']) || empty ( $_POST['pass']))
    {
        header("Location: login-page.php?mess=3");
    }
    else
    {
        $login = $_POST['name'];
        $pass = $_POST['pass'];
        $passRepeated = $_POST['pass-repeated'];
        include "../database/database.php";
        if($pass == $passRepeated)
        {
            $sql = "INSERT INTO Users (Name, Pass) VALUES ('$login', '$pass'); ";
            if( !mysqli_query($conn, $sql)){
                echo mysqli_error($conn);
            }
            mysqli_close($conn);
            header("Location: login-page.php?mess=4");

        }
        else
        header("Location: login-page.php?mess=meehe");









    }

}
