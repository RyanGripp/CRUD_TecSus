<?php
    require_once 'conexao.php';

    $pdo = null;
    try {
        $pdo = conectar();
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
        exit;
    }

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];

            $sql = "INSERT INTO cliente (nome, idade) VALUES (:nome, :idade)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nome' => $nome, 'idade' => $idade]);

            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo "Erro ao adicionar no o banco de dados: " . $e->getMessage();
        exit;
    }
?>