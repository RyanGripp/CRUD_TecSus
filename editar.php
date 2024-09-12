<?php
    require_once 'conexao.php';

    $pdo = null;
    try {
        $pdo = conectar();
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
        exit;
    }

    try{
        $id = $_GET['id'];
        $sql = "SELECT * FROM cliente WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
    
            $sql = "UPDATE cliente SET nome = :nome, idade = :idade WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nome' => $nome, 'idade' => $idade, 'id' => $id]);
    
            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo "Erro ao editar no o banco de dados: " . $e->getMessage();
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center;">
    <h1>Editar Cliente</h1>
    <form action="editar.php?id=<?= $cliente['id'] ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= $cliente['nome'] ?>">
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?= $cliente['idade'] ?>">
        <button type="submit">Editar Cliente</button>
    </form>
</html>