<?php 

    require_once "conexao.class.php";
    require_once "crud.class.php";    
    
    //cria um objeto de crud
    $teste = CRUD::getInstance(Conexao::getInstance());
    
    $nome = 'Tereza Camargo';
    $email = 'tereza_camargo@gmail.com';
    
    $nome2 = 'Teste update';
    $email2 = 'tereza_camargo@gmail.com';
    
    $info = array($nome, $email);
    
    //paramentos: tabela, quantidade de informacoes, nomes das colunas, values abstratos, e array de informacoes
    //$teste->insert('clientes', 2, 'nome, email', '?,?', $info);
    
    //$teste->delete('clientes', 6);
    
    /*$leitura = $teste->readAll('clientes');
    
    foreach($leitura as $reg){
        echo "<br/>*********************<br/>";
        echo "ID: " . $reg->id . "";
        echo " NOME: " . $reg->nome . "";
        echo " EMAIL: " . $reg->email . "";
    }*/
    
    $info2 = array($nome2, $email2);
    //paramentros: tabela, quantidade de informacoes, sets para update, id do que vai ser atualizado, e array de informacoes
    $teste->update('clientes', 2, 'nome=?, email=?', 1, $info2 );
   
?>