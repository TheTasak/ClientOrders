<?php
  function sql_open()
  {
    $username = "homeuser";
    $password = "Admin123";
    $host = "localhost";
    $database="profektus";
    $mysqli = new mysqli($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      return false;
    }
    return $mysqli;
  }

  $mysql = sql_open();
  if(isset($_POST['imie'])) {
    $imie = $_POST['imie'];
  }
  if(isset($_POST['telefon'])) {
    $telefon = $_POST['telefon'];
  }
  if(isset($_POST['typ'])) {
    $typ = $_POST['typ'];
  }
  if(isset($_POST['model'])) {
    $model = $_POST['model'];
  }
  if(isset($_POST['wyposazenie'])) {
    $wyposazenie = $_POST['wyposazenie'];
  }
  if(isset($_POST['objawy'])) {
    $objawy = $_POST['objawy'];
  }
  if(isset($_POST['uwagi'])) {
    $uwagi = $_POST['uwagi'];
  }
  $data = date("Y-m-d") . "_" . date("H-i");

  $string = '<html>
  <head><meta charset="utf-8"><link rel="stylesheet" href="style.css"></head>
  <body>
  <div><img src="logo.png"></div>
  <p>PROFEKTUS Krzysztof Łapiński</br>
  ul. 6-go Sierpnia 29</br>
  90-616 Łódź</br>
  NIP 732-100-15-96</br>
  tel. 42-630-73-15</br>
  www.profektus.pl</br>
  serwis@profektus.pl</p>
  <table class="tabela-wynik">
  <tr><td>Data:</td><td>'. $data .'</td><td></td></tr>
  <tr><td>Imię i nazwisko:</td><td>'. $imie .'</td><td></td></tr>
  <tr><td>Telefon:</td><td>'. $telefon .'</td><td></td></tr>
  <tr><td>Typ:</td><td>'. $typ .'</td><td></td></tr>
  <tr><td>Model:</td><td>'. $model .'</td><td></td></tr>
  <tr><td>Wyposażenie:</td><td>'. $wyposazenie .'</td><td></td></tr>
  <tr><td>Objawy:</td><td>'. $objawy .'</td><td></td></tr>
  <tr><td>Uwagi:</td><td>'. $uwagi .'</td><td></td></tr>
  </table>
  <ol>
  <li>Firma Profektus nie ponosi odpowiedzialności za dane pozostawione na dyskach twardych i innych nośnikach. </br>
      Sugerujemy wykonanie kopii zapasowej lub zlecenie jej naszemu serwisowi.</li>
  <li>W przypadku nie odebrania sprzętu z serwisu w ciągu sześciu miesięcy od daty przyjęcia zostanie naliczana opłata za przechowywanie
      w wysokości 1zł brutto dziennie. Po upływie 12 miesięcy sprzęt zostanie przekazany do depozytu sądowego.</li>
  <li>W przypadku niezdecydowania się na zaproponowane koszty naprawy, klient ponosi koszt diagnozy w wysokości 50zł brutto.</li>
  <li>Przybliżony czas wykonania diagnozy to 1-3 dni robocze.</li>
  <li>Firma Profektus na wykonane usługi udziela trzy miesięczną gwarancję.</li>
  </ol>
  <p>Podpis:</p></br>
  <hr>
  <table class="tabela-wynik">
  <tr><td>Data:</td><td>'. $data .'</td><td></td></tr>
  <tr><td>Imię i nazwisko:</td><td>'. $imie .'</td><td></td></tr>
  <tr><td>Telefon:</td><td>'. $telefon .'</td><td></td></tr>
  <tr><td>Typ:</td><td>'. $typ .'</td><td></td></tr>
  <tr><td>Model:</td><td>'. $model .'</td><td></td></tr>
  <tr><td>Wyposażenie:</td><td>'. $wyposazenie .'</td><td></td></tr>
  <tr><td>Objawy:</td><td>'. $objawy .'</td><td></td></tr>
  <tr><td>Uwagi:</td><td>'. $uwagi .'</td><td></td></tr>
  </table></br>
  <hr><hr><hr><hr>
  <pre>Pokwitowanie odbioru                                                    Data                                                    Podpis</pre><br></br>
  </body></html>';

  $filename = $data . "-" . $imie . ".html";
    echo $filename;
  file_put_contents($filename, $string);


  $sql_query = "INSERT INTO zlecenia (imie, telefon, typ, model, wyposazenie, objawy, uwagi)
                VALUES ('{$imie}', '{$telefon}', '{$typ}', '{$model}', '{$wyposazenie}', '{$objawy}', '{$uwagi}')";
  $query = mysqli_query($mysql, $sql_query);

  if ( ! $query ) {
    echo mysqli_error($mysql);
    return false;
  }
  mysqli_close($mysql);
  echo "<script>window.close();</script>";
?>
