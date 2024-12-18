<?php
class Conexao {
    public static $conn;

    static function conectar() {
        $endereco = "mysql:host=localhost;dbname=sgrif";
        $usuariobd = "root";
        $senhabd = "";
        try {
            self::$conn = new PDO($endereco, $usuariobd, $senhabd);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    static function executar($query) {
        if (self::$conn == null)
            self::conectar();
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    static function executarComParametros($query, $parametros) {
        if (self::$conn == null)
            self::conectar();
        $stmt = self::$conn->prepare($query);
        $stmt->execute($parametros);
        return $stmt;
    }

    static function getUltimoId() {
        return self::$conn->lastInsertId();
    }
}
?>
