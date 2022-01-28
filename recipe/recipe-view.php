<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pokochaj kuchnię</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <script src="../page/script.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="../page/styles.css" />
</head>
<body>
<header>
    <div class="header">
        <div class="shadow">
            <div id="top-background-img"></div>
        </div>

        <?php include_once "../page/menu.php";
        ?>

        <h1>Pokochaj kuchnię!</h1>
    </div>
</header>


    <?php


        include "../database/database.php";
        $id = $_GET['Id'];
        $sql = "SELECT * FROM recipes WHERE Id=".$id.";";
        $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result))
    {
        if($row = mysqli_fetch_assoc($result))
        {
            $title =$row['Title'];
            $author =  $row['AuthorName'];
            $authorId = $row['AddedBy'];

        }
    }
    ?>
    <div id="recipe-container" class="white">
    <div class="container" id="recipe">


        <p style="width: 100%; margin: 0 0 10px 0; font-size: 13px; color: gray">
            <?php echo"Przepis został dodany ".$row['Date'] ." przez ";

            if(isset($_SESSION['id']))
            {
                if($_SESSION['id'] == $authorId)
                {
                    echo "Ciebie. Możesz go <b> <a href =\"new-recipe-view.php?Id=$id&mess=7"."\" style=\"color: grey\"> edytować.</a></b>";
                }
                else
                {
                    echo "<b>".$author."</b>";
                }
            }
            else
            {
                echo "<b>".$author."</b>";
            }
           echo "</p> ";

            ?>

        <h1><?php echo $title?> </h1>
        <p>
            <?php
                echo $row['Text'];
            ?>
        </p>
    </div>

    <div class = "container image-container">
        <img width="100%" src="<?php echo $row['ImageSrc'];?>" onerror="this.onerror=null; this.src='images/food0.jpg'" alt=""  />

    </div>

</div>

<div id="comment-section" class="big-box">
    <div class="comment-container">
        <a href="#comment-section"> <h2>Dodaj komentarz! </h2></a>


        <?php if(isset($_SESSION['id']))
        { ?>
        Podziel się wrażeniami!<br>
        Komentujesz jako <b> <?php echo $_SESSION['name']; ?></b>
        <form action="add-comment.php" method="POST">
<!--            <input type="text" id="user_name" maxlength="30" name="user_name" placeholder="Podaj swoje imię" > <br>-->
            <textarea id="comment_text"  onkeyup="check()" name="comment_text" placeholder="Tutaj wpisz swój komentarz!"></textarea>
            <br><br>
            <input style="display: none" type="text" id="recipe-id" name="recipe_id" value="<?php echo $id ?>">
            <input class="my-button disabled-button"  id="button"  disabled type="submit" value="Dodaj komentarz">
        <?php  } else {

        ?>
        Zaloguj się, aby dodać komentarz! <?php  } ?>
    </div>



    </form>

    <?php
        include "../database/database.php";
        $sql = "SELECT * FROM comments WHERE RecipeId =".$id.";";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result))
        {
            while($comment = mysqli_fetch_assoc($result))
            {
                ?>
                    <div class="comment">
                        <h3> <?php echo $comment['Author']; ?></h3> <p> <?php  echo $comment['Date']?> </p>
                        <div> <?php echo $comment['Text'];?> </div>
                    </div>
    <?php
            }
        }
        else
        {
            ?> <p style="text-align: center" > Skomentuj jako pierwszy! </p>" <?php
        }
    ?>

</div>
<?php include_once "../page/footer.php" ?>

<script>
    let button = document.getElementById("button");
    let comment = document.getElementById("comment_text");


    function check()
    {
        if (comment.value =="")
        {
            button.disabled = true;
            button.classList.add("disabled-button");
        }
        else if (button.classList.contains("disabled-button"))
        {
            button.classList.remove("disabled-button");
            button.disabled = false;

        }
    }


</script>

</body>
</html>
