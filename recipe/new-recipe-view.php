<?php

session_start();
if(!isset($_SESSION['id']))
{
    header("Location: ../login/login-page.php?mess=2"); ///mess = 2 tylko zalogowani użytkownicy mogą dodawać przepisy
}

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
    <div id="add-recipe-section" class="big-box">

      <div class="container add-recipe">
          <?php
            $edit = 0;
          if(isset($_GET['mess']))
          {
              if ($_GET['mess'] == 7) {
                  echo " <h1>Edytuj swój przepis!</h1>";
                  include_once "../database/database.php";
//                  echo $_GET['Id'];
                  $sql = "SELECT * FROM recipes WHERE Id=" . $_GET['Id'] . ";";
                  $result = mysqli_query($conn, $sql);
//                  echo mysqli_num_rows($result);

                  if (mysqli_num_rows($result)) {
                      if ($row = mysqli_fetch_assoc($result)) {
                          $title = $row['Title'];
                          $author = $row['AuthorName'];
                          $authorId = $row['AddedBy'];
                          $img_src = $row['ImageSrc'];
                          $recipe_text = $row['Text'];
                          $edited_recipe_id = $_GET['Id'];
                          $edit=1;

                      }

                  }
              }
          }
          else {
              echo "<h1>Dodaj swój przepis!</h1>";
          }
          ?>


        <form action="new-recipe.php" method="POST">
          <label for="recipe_name">Tytuł przepisu:</label>
          <input type="text" id="recipe_name" maxlength="30" name="recipe_name"
                 placeholder="Tytuł przepisu"
                 <?php if ($edit) { echo "value="."\"$title\""; } ?>
                 autofocus onkeyup="check()">
            <br>
            <label for="img_src">Adres URL obrazka:</label>
            <input type="text" id="img_src"  name="img_src"
                <?php if ($edit) { echo "value="."\"$img_src\"";}?>placeholder="Adres URL zdjęcia (opcjonalnie)">
                   <br>

            <label for="recipe_text">Poniżej wpisz swój przepis:</label>
          <textarea id="recipe_text"  name="recipe_text"  onkeyup="check()"
                    placeholder="Tutaj wpisz swój przepis!"><?php if ($edit) { echo $recipe_text; } ?></textarea>
            <input type="hidden" id="edited_recipe_id" name="edited_recipe_id"" value="<?php echo $edited_recipe_id; ?>">
            <input type="hidden" id="edit" name="edit"" value="<?php echo $edit; ?>">
            <p style="width:100%; color: gray; font-size: 13px"> Dodajesz przepis jako <b><?php echo $_SESSION['name']; ?></b>
            </p>
            <br>  <br>
            <input class="my-button disabled-button" type="submit" disabled  id="button"
                   <?php if($edit == 1)  { ?> value="Zapisz" <?php } else { ?> value="Dodaj przepis"> <?php } ?>


        </form>
      </div>



    </div>


    <?php include_once "../page/footer.php" ?>


    <script>
        let element = document.getElementById("a-new-recipe");
        element.classList.add("active");

        let button = document.getElementById("button");
        let title = document.getElementById("recipe_name");
        let recipe = document.getElementById("recipe_text");

        function check()
        {
            if (title.value =="" || recipe.value =="")
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
