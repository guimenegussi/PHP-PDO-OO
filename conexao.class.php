<?php 
    
    //Constantes de parâmetros para configurar a conexão com o DB 
    define('HOST', 'localhost');
    define('DBNAME', 'testeoo');
    define('CHARSET', 'utf8');
    define('USER', 'root');
    define('PASSWORD', 'vertrigo');
    
    class Conexao{
        
        private static $pdo;
        
        private function __construct(){}
        
        //Método estático para retornar uma conexão válida
        //Verifica se já existe a uma instancia da conexao, caso não, cria uma. 
        
        public static function getInstance(){
            if(!isset(self::$pdo)){
                try{
                   $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
                   self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME. "; charset=" . CHARSET. ";", USER, PASSWORD, $opcoes);
                   self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                } catch (PDOException $e){
                    print "Erro: ". $e->getMessage();
                }
            }
            
            return self::$pdo;
        }
        
        
    }
    