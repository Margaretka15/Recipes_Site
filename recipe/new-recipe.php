<?php
session_start();
if(isset($_SESSION['id']))
{
    $recipeName = $_POST['recipe_name'];
    $recipeText = $_POST['recipe_text'];
    $imageSrc = $_POST['img_src'];
    $addedBy = $_SESSION['id'];
    $author = $_SESSION['name'];
    $date = date('d.m.Y');
    $edit = $_POST['edit'];
    if(empty($_POST['recipe_name']) || empty ( $_POST['recipe_text']))
    {
        header("Location: new-recipe-view.php?err=3");
    }
    else{
        include "../database/database.php";

        if($edit == 1)
        {
            $recId = $_POST['edited_recipe_id'];
            $sql = "UPDATE Recipes SET Title='$recipeName', Text='$recipeText', ImageSrc='$imageSrc' WHERE Id='$recId'";

        }
        else
        {
            $sql = "INSERT INTO Recipes (Title, Text, ImageSrc, AddedBy, AuthorName,Date) VALUES ('$recipeName', '$recipeText', '$imageSrc', '$addedBy','$author', '$date'); ";

        }
        if( !mysqli_query($conn, $sql)){
            echo mysqli_error($conn);
        }


        mysqli_close($conn);


        header("Location: new-recipe-view.php?mess=5");
    }

}
else
    header("Location: ../login/login-page.php");
//echo $recipeName. "<br><br>" .$recipeText;
