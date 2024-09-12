<?php
function conectar(){
    try {
        $pdo = new PDO('sqlite:host=localhost;dbname=tecnologias;charset=utf8', 
        'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        gerartabela($pdo);

        return $pdo;
    } catch (PDOException $e) {
        echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
        exit;
    }
}
    function gerartabela($pdo){
        $sql = "CREATE TABLE IF NOT EXISTS cliente (
            id INTEGER PRIMARY KEY,
            nome TEXT NOT NULL,
            idade INTEGER NOT NULL
        )";
        $pdo->exec($sql);
    }
?>