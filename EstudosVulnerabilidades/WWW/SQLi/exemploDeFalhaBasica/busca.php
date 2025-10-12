<?php
// Inclui o arquivo de conexão
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <style>
        body { font-family: sans-serif; margin: 2em; }
        .container { max-width: 800px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .query { font-family: monospace; background-color: #eee; padding: 10px; border: 1px solid #ccc; margin-top: 20px; white-space: pre-wrap; word-wrap: break-word; }
        .error { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultados da Pesquisa</h1>
        <a href="index.php"><< Voltar para a busca</a>
        <hr>

        <?php
        // Verifica se o parâmetro 'nome' foi enviado
        if (isset($_GET['nome']) && !empty($_GET['nome'])) {
            $nome_pesquisa = $_GET['nome'];

            // --- PONTO DA VULNERABILIDADE ---
            // A entrada do usuário é concatenada diretamente na query SQL.
            // Esta é uma prática extremamente insegura e o que causa a vulnerabilidade de SQL Injection.
            $sql = "SELECT id, nome, cargo, senha FROM usuarios WHERE nome = '" . $nome_pesquisa . "'";

            // Exibe a query que será executada (para fins de estudo)
            echo "<h3>Query SQL Executada:</h3>";
            echo "<div class='query'>" . htmlspecialchars($sql) . "</div>";

            $resultado = $conn->query($sql);

            if (!$resultado) {
                // Se houver um erro na query, exibe a mensagem de erro do banco de dados.
                // Vazamento de informações de erro é outra má prática de segurança.
                echo "<h3>Erro na Consulta:</h3>";
                echo "<div class='error'>" . htmlspecialchars($conn->error) . "</div>";
            } elseif ($resultado->num_rows > 0) {
                echo "<h3>Usuários Encontrados:</h3>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Nome</th><th>Cargo</th><th>Senha</th></tr>";
                // Exibe os dados de cada linha
                while($linha = $resultado->fetch_assoc()) {
                    echo "<tr><td>" . $linha["id"]. "</td><td>" . $linha["nome"]. "</td><td>" . $linha["cargo"]. "</td><td>" . $linha["senha"]. "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum usuário encontrado com o nome: <strong>" . htmlspecialchars($nome_pesquisa) . "</strong></p>";
            }
        } else {
            echo "<p>Por favor, forneça um nome para pesquisar.</p>";
        }

        // Fecha a conexão
        $conn->close();
        ?>
    </div>
</body>
</html>