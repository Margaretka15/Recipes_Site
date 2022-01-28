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

    <div id="recipes-section" class=" big-box">

          <a href="new-recipe-view.php" class="my-button"> Dodaj nowy przepis </a>

        <br>
        <div class="recipes box">

            <?php
                include "./database/database.php";
                $sql = "SELECT * FROM recipes";
                $result = mysqli_query($conn, $sql);

                $img_src = "https://polki.pl/foto/4_3_LARGE/pilau-odswietna-potrawa-1661952.jpg";
                if(mysqli_num_rows($result))
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
            ?>
                    <div class="card" >
                        <div class = "recipe-container">
                            <img src="<?php echo $row['ImageSrc'];?>" onerror="this.onerror=null; this.src='images/food0.jpg'" alt=""  />
                        </div>

                        <div class="text">
                           <a href="recipe-view.php?Id=<?php echo $row['Id'];?> "><h1 style="font-size: 1.2rem"><?php echo $row['Title'];?> </h1> </a>
                        </div>
                    </div>
            <?php
                    }
                 }

            ?>

          
        </div>
      </div>
    </div>
    <?php include_once "../page/footer.php" ?>
    <script>
        let element = document.getElementById("a-recipes");
        element.classList.add("active");

    </script>
  </body>
</html>
