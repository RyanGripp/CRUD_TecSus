<?php
    require_once 'conexao.php';

    $pdo = null;
    try {
        $pdo = conectar();
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
        exit;
    }

    $sql = "SELECT * FROM cliente";
    $stmt = $pdo->query($sql);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center;">
    <h1>Lista de Clientes</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Editar</th>
            <th>Remover</th>
        </tr>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td><?= $cliente['id'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['idade'] ?></td>
                <td><a href="editar.php?id=<?= $cliente['id'] ?>">Editar</a></td>
                <td><a href="remover.php?id=<?= $cliente['id'] ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Cadastrar Cliente</h2>
    <form action="adicionar.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade">
        <button type="submit">Adicionar Cliente</button>
    </form>
</html>