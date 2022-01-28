<?php if(isset($_GET['mess']))
{
    if($_GET['mess'] ==2) {
        ?>
        <div class="alert-box info">
            <i class="far fa-times-circle close-icon" onclick="hide(this)"></i>
            <p> Tylko zalogowani użytkownicy mogą dodawać przepisy! </p>

        </div>

    <?php }
    if($_GET['mess'] == 4)
    {
        ?>
        <div class="alert-box success">
            <i class="far fa-times-circle close-icon" onclick="hide(this)"></i>
            <p> Pomyślnie utworzono nowe konto! Teraz możesz się zalogować. </p>

        </div>

    <?php }
    if($_GET['mess'] == 3)
    { ?>
        <div class="alert-box error">
            <i class="far fa-times-circle close-icon" onclick="hide(this)"></i>
            <p> Nie udało się utworzyć konta! Spróbuj ponownie. </p>
        </div>
        <?php
    }
}

if(isset($_GET['error']))
{
    if($_GET['error'] == 2) { ?>
        <div class="alert-box error">
            <i class="far fa-times-circle close-icon" onclick="hide(this)"></i>
            <p> Nie podano loginu lub hasła! </p>
        </div>
    <?php   }
    if($_GET['error'] == 1) { ?>
        <div class="alert-box error">
            <i class="far fa-times-circle close-icon" onclick="hide(this)"></i>
            <p> Błędna nazwa użytkownika lub hasło! </p>
        </div>
    <?php }

}