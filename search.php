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

  $data = array();
  $sql_query = "SELECT * FROM zlecenia WHERE imie ='{$imie}'";
  $query = mysqli_query($mysql, $sql_query);
  if ( ! $query ) {
    echo mysqli_error($mysql);
    return false;
  }
  while($temp = $query->fetch_assoc()) {
    $data[] = $temp;
  }
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  mysqli_close($mysql);
?>
