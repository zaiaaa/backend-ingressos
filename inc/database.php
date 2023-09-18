<?php
define('db_host', 'localhost');
define('username', 'root');
define('password', '');
define('db_name', 'db_ingressos');

$conn = mysqli_connect(db_host, username, password, db_name);

if ($conn->connect_errno) {
    die("Erro na conexão com o banco de dados " . $conn->connect_errno);
}

?>