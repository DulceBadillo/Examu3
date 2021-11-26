<?php
$port = 1433;
$serverName = "examenu3.azurewebsites.net" . $port;
$database = "musicapop_azure";
$userName = "Student";
$password = "Pa55w.rd";

try {
    $conn = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql .= "INSERT INTO Cancione (nombre, artista, fecha, productora) VALUES ('El precio que hay que pagar', 'Enrique bunbury', '01/01/2000','Sony Music Publishing')";
    $sql .= "INSERT INTO Cancione (nombre, artista, fecha, productora) VALUES ('Cero', 'Dani Martín', '8/07/2013','Sony Music Latin')";
    $sql .= "INSERT INTO Cancione (nombre, artista, fecha, productora) VALUES ('11 razones', 'Aitana', '03/07/2021','Universal Music Spain')";
    $sql .= "INSERT INTO Cancione (nombre, artista, fecha, productora) VALUES ('Lucha de giganes', 'Nacha Pop', '04/05/2017','Non-Wea/Other')";
    $sql .= "INSERT INTO Cancione (nombre, artista, fecha, productora) VALUES ('Match', 'david rees', '30/03/2021','PeerMusic')";
    
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
