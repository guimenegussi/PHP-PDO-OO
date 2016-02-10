<?php 

    class CRUD{
        
        //ATRIBUTOS
        private $pdo = null;
        private static $crud = null;
        
        //METODOS
        
        //construtor da class 
        // parametro é a conexão com  banco de dados
        private function __construct($conexao){
            $this->pdo = $conexao;
        }
        
        //metodo estatico para criar um objeto de $crud
        
        public static function getInstance($conexao){
            if(!isset(self::$crud)):
                self::$crud = new CRUD($conexao);
            endif;
            return self::$crud;
        }
        
               
        public function insert($tabela, $qtd, $sets, $values, $info){
            try{
              $sql = "INSERT INTO ".$tabela." (".$sets.") VALUES(".$values.")";
              $stm = $this->pdo->prepare($sql);
              $i = 0;
              while($i < $qtd){
                $stm->bindValue($i+1, $info[$i]);
                $i++;
              }            
              $stm->execute();
              echo "Registrado com sucesso";
            } catch(PDOException $erro){
                echo "Erro na linha : {$erro->getLine()}";
            }
        }
        
        public function update($tabela, $qtd, $sets, $id, $info){
            try{
              $sql = "UPDATE ".$tabela." SET ".$sets." WHERE id=?";
              $stm = $this->pdo->prepare($sql);
              $i = 0;
              while($i < $qtd){
                $stm->bindValue($i+1, $info[$i]);
                $i++;
              }
              $stm->bindValue($i+1, $id);           
              $stm->execute();
              echo "Atualizado com sucesso";
            } catch(PDOException $erro){
                echo "Erro na linha : {$erro->getLine()}";
            }
        }
        
        public function delete($tabela, $id){
            try{
                $sql = "DELETE FROM ".$tabela." WHERE id=?";
                $stm = $this->pdo->prepare($sql);
                $stm->bindValue(1, $id);
                $stm->execute();
                echo "Excluido com sucesso";
            } catch (PDOException $erro){
                echo "Erro na linha: {$erro->getLine()}";
            }
        }
        
        public function readAll($tabela){
            try{
                $sql = "SELECT * FROM ".$tabela."";
                $stm = $this->pdo->prepare($sql);
                $stm->execute();
                $dados = $stm->fetchAll(PDO::FETCH_OBJ);                
                return $dados;
            } catch (PDOException $erro){
                echo "Erro na linha: {$erro->getLine()}";
            }
        }
    }