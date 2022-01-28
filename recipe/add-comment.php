<?php

session_start();
if(isset($_SESSION['id']))
{
    $author = $_SESSION['name'];
    $text = $_POST['comment_text'];
    $recipeId = $_POST['recipe_id'];
    include_once "../database/database.php";

    $date = date('d.m.Y');

//$sql = "INSERT INTO Comments (RecipeId, Text, Author, Date) VALUES ('$recipeId','$text','$author', $date); ";
    $sql = "INSERT INTO Comments (RecipeId, Text, Author, Date) VALUES ('$recipeId','$text','$author', '$date'); ";
    if( !mysqli_query($conn, $sql)){
        echo mysqli_error($conn);
    }

    mysqli_close($conn);


    header("Location: recipe-view.php?Id=$recipeId#comment-section?mess=6");
}
