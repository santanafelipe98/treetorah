<?php
    require_once('config.php');

    abstract class FabricaConexao 
    {
        private static $conexao = null;

        public static function getInstance() 
        {
            if (self::$conexao == null) {
                try {
                    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;
                    self::$conexao = new PDO($dsn, USER, PASS);
                    self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                }
                catch (PDOException $e) {
                    echo $e;
                }
            }

            return self::$conexao;
        }

        public static function prepare($sql) 
        {
            return self::getInstance()->prepare($sql);
        }
    }