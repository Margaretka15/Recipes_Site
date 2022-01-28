<?php
session_start();

?>
<div class="topnav" id="myTopnav">
    <a id="a-index" href="index.php">Strona główna</a>
    <a id="a-recipes" href="recipes.php">Przepisy</a>

<?php  if(isset($_SESSION['id']))  { ?>
    <a id="a-new-recipe" href="new-recipe-view.php">Dodaj przepis</a>
    <a id="a-login"href="../login/log-out.php">Wyloguj się</a>
<?php  }  else  { ?>
    <a id="a-login"href="../login/login-page.php">Zaloguj się</a>

<?php } ?>


    <a href="javascript:void(0);" class="icon" onclick="menuFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>