<?php


include "../config/db-credentials.php";


$conn = mysqli_connect($serverName, $userName, $password, $dbName, 3306);

if(!$conn)
{
   // echo "błąd połączenia z bazą danych ".mysqli_connect_error($conn);
    die;
}

else   //echo "połączenie z bazą danych się udało"
;

//$sql = "SELECT * FROM Persons";
//$result = mysqli_query($conn, $sql);
//
//if (mysqli_num_rows($result) > 0) {
//    while ($row = mysqli_fetch_assoc($result)) {
//        echo " id " . $row['PersonID'] . " Imie " . $row['FirstName'] . " Nazwisko " . $row['LastName'] . "<br>";
//    }
//}