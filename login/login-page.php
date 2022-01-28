<?php
session_start();
if(isset($_SESSION['id']))
{
    echo "Wyloguj się, aby zalogować się ponownie!"; ///do ogarnięcia
}
else {

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

    <div id="login-section" class="big-box">
        <?php include_once "../utils/messages.php" ?>


      <div class="container">
        <h1>Zaloguj się</h1>
        <form action="login-action.php" method="post">
          <label for="login">Nazwa użytkownika:</label>
          <input type="text" id="login" name="login" placeholder="Podaj nazwę użytkownika"><br>
          <label for="pass">Hasło:</label>
          <input type="password" id="pass" name="pass" placeholder="Wpisz hasło"><br><br>
          <button class="my-button">Zaloguj</button>

<!--            <input  type="submit" value="Zaloguj">-->


        </form>
      </div>

        <div class = "container">
          <h1> Nie masz jeszcze konta?</h1>
          <p> Załóż je teraz!</p>

            <form action="add-new-user.php" method="post">
                <label for="name">Nazwa użytkownika:</label>
                <input type="text" id="name" name="name" placeholder="Podaj nazwę użytkownika"><br>
                <label for="pass">Hasło:</label>
                <input type="password" id="set-pass" name="pass"  placeholder="Wpisz hasło" onkeyup="check()"><br>
                <div id="login-message"></div> <br>
                <label for="pass">Powtórz hasło:</label>
                <input type="password" id="pass-repeated" name="pass-repeated" placeholder="Powtórz hasło" onkeyup="check()"> <br><br>


                <button class="my-button disabled-button" id="register-button" disabled>Zarejestruj się</button>
        </div>

    </div>


    <?php }
    include_once "../page/footer.php" ?>
    <script>
        let element = document.getElementById("a-login");
        element.classList.add("active");

        function hide(element)
        {
            let x = element.parentNode;
            x.classList.add("hidden");
        }

        function check()
        {
            let mess = document.getElementById('login-message');
            let button = document.getElementById('register-button');
            if (document.getElementById('set-pass').value == document.getElementById('pass-repeated').value)
            {
                mess.innerHTML = "Hasła są poprawne.";
                button.classList.remove("disabled-button");
               if ( mess.classList.contains("not-matched"))
               {
                   mess.classList.remove("not-matched");
                   mess.classList.add("matched");
               }
                button.disabled = false;
            }
            else
            {
                mess.innerHTML = 'Hasła nie są identyczne.';
                mess.classList.add("not-matched");
                button.disabled = true;
                button.classList.add("disabled-button");

            }

        }


    </script>
  </body>
</html>
