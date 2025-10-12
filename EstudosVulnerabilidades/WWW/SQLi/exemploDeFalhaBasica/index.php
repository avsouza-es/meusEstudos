<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Laboratório SQLi - Pesquisa de Usuários</title>
    <style>
        body { font-family: sans-serif; margin: 2em; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="text"] { width: 80%; padding: 8px; }
        input[type="submit"] { padding: 8px 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesquisar Usuário por Nome</h1>
        <p>Digite o nome do usuário para ver seus detalhes.</p>
        <form action="busca.php" method="GET">
            <input type="text" id="nome" name="nome" placeholder="Digite o nome aqui...">
            <input type="submit" value="Pesquisar">
        </form>
    </div>
</body>
</html>