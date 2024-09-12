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
        $sql = "DELETE FROM cliente WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        echo "Erro ao remover no o banco de dados: " . $e->getMessage();
        exit;
    }

    header('Location: index.php');
?>