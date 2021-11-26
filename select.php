<?php
$port = 1433;
$serverName = "tcp:asd-exa.database.windows.net," . $port;
$database = "musicapop_azure";
$userName = "Student";
$password = "Pa55w.rd";

try {
    $conn = new PDO("sqlsrv:server = $serverName,$port; Database = $database", $userName, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = 'SELECT id, nombre, artista, fecha, productora FROM Cancione';

    foreach ($conn->query($sql) as $row) {
        
        echo $row['id'] . " | ";
        echo $row['nombre'] . " | ";
        echo $row['artista'] . " | ";
        echo $row['fecha'] . " | ";
        echo $row['productora'] . "<br>";
    }

    // use exec() because no results are returned
    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
