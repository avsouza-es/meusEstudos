<?php
// Configurações do banco de dados
$db_host = 'localhost'; // ou 127.0.0.1
$db_user = 'root';      // seu usuário do MariaDB
$db_pass = '';          // sua senha do MariaDB
$db_name = 'corporativo_ficticio';

// Cria a conexão
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verifica se a conexão falhou
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Opcional: Define o charset para evitar problemas com acentuação
$conn->set_charset("utf8");
?>