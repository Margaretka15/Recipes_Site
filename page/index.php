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
    <script src="script.js"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

      <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header>
      <div class="header">
        <div class="shadow">
          <div id="top-gallery"></div>
        </div>

        <?php include_once "menu.php";
        ?>

        <h1 id="main-title">Pokochaj kuchnię!</h1>
        <a href="#welcome-section">
          <img class="arrow" src="../images/icons/arrow-down.png" alt="arrow" width="50px" />
        </a>
      </div>
    </header>

    <div id="welcome-section" class="box welcome-page big-box">
      <div class="card">

          <h2>Zobacz przepisy!</h2>
          <div class = "card-content">
             <p>Zobacz, jakie pyszne przepisy dodały nasze użytkowniczki!</p>
                 <img src="../images/f1.jpg" alt="food photo" />
             <a href="../recipe/recipes.php" class="my-button">Zobacz przepisy</a>
          </div>

        </div>
        <div class="card">
            <?php if (isset($_SESSION['name']))
            {
                ?>
                <h2>Dodaj swój przepis!</h2>
                <div class = "card-content">

                    <p>
                        Na pewno masz mnóstwo pomysłów na świetne przepisy! Podziel się nimi z innymi!
                    </p>
                    <img src="../images/icons/cook.png" alt="avatar photo" />

                    <a href="../recipe/new-recipe-view.php" class="my-button">Dodaj przepis</a>

                </div>

           <?php } else { ?>
          <h2>Dołącz do nas!</h2>
          <div class = "card-content">

            <p>
              Załóż konto, jeśli chcesz skomentować swoje ulubione przepisy lub
              dodać własną smaczną propozycję!
            </p>
              <img src="../images/icons/avatar.png" alt="avatar photo" />

              <a href="../login/login-page.php" class="my-button">Logowanie i rejestracja</a>

          </div>
        <?php } ?>
        </div>

      <div class="card">
        <div class="">
          <h2>Zaufaj nam!</h2>

            <p>Tyle osób nas już odwiedziło:</p>
            <h2 style="font-size: 5rem; text-align: center">
            <?php
                include_once "../database/database.php";
                $sql = "SELECT * FROM Licznik";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    echo $row['Number'];

                    $new = $row['Number'] + 1;
                    $sql = "UPDATE Licznik SET Number=".$new. " WHERE Id=1";

                    if (!mysqli_query($conn, $sql)) {
                        echo mysqli_error($conn);
                    }
                }

                ?>
            </h2>
        </div>
      </div>
    </div>

    <?php include_once "footer.php" ?>

  <script>
    let element = document.getElementById("a-index");
    element.classList.add("active");

    var images = [];
    var i = 0;
    var time = 3000;

    images[0] = "url(../images/food_1.jpg)";

    images[1] = "url(../images/food_2.jpg)";

    images[2] = "url(../images/food_3.jpg)";


    function change_background()
    {
        document.getElementById("top-gallery").style.backgroundImage = images[i];
        if(i < images.length -1)
        {
            i++;
        }
        else
        {
            i = 0;
        }

        setTimeout(change_background, time);
    }

    window.onload = change_background;



  </script>
  </body>
</html>
