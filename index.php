<?php
//PREPARE FUNCIONA COM VARIAVEIS 
//QUERY COM VALORES DIRETOS
//fetch(PDO::FETCH_ASSOC); "FETCH_ASSOC", mostra apenas as colunas e os registros
//<br>
//echo "<pre>";         |
//print_r($resultado);  | serve para quem esta programando e quer mostrar na tela
//echo "</pre>";        |
//<br>
//---------------------------CONEXÃO-----------------------------

try { //codigo que pode gerar posivel erro se gerar erros vai cair no catch
    $pdo = new PDO("mysql:dbname=crudpdo;host=localhost","root",""); //dbname, host, usuario e senha
} 
catch (PDOException $e) { //Erro com o banco de dados 
    echo "Erro com banco de dados: " .$e->getMessage(); 
}
catch (Exception $e) { //qual quer outro erro 
    echo "Erro generico: " .$e->getMessage();
}



//---------------------------INSERT-----------------------------
//1 Forma
//$res = $pdo->prepare("INSERT INTO pessoas(nome, telefone, email)
//VALUES (:n, :t, :e)");

//$res->bindValue(":n","Roberta"); //bindValue aceita valures direto diferente de bindParam
//$res->bindValue(":t","24154354");
//$res->bindValue(":e","teste@hotmail.com");
//$res->execute();



//2 Forma
//$pdo->query(" INSERT INTO pessoas(nome, telefone, email) 
//VALUES ('Paulo','159981728561','Paulo@gmail.com')");


//---------------------------DELETE-----------------------------

// 1 Forma
//$cmd = $pdo->prepare("DELETE FROM pessoas WHERE id = :id");
//$id = 2;
//$cmd->bindValue(":id",$id);
//$cmd->execute();



// 2 Forma
//$res = $pdo->query("DELETE FROM pessoas WHERE id= '3'");



//---------------------------UPDATE-----------------------------
// 1 Forma
//$cmd = $pdo->prepare("UPDATE pessoas SET email = :e WHERE id = :id");
//$cmd->bindValue(":e","MiriamTeste@hotmail.com");
//$cmd->bindValue(":id",1);
//$cmd->execute();


// 2 Forma
//$res = $pdo->query("UPDATE pessoas SET email = 'vai_este@hotmail.com' WHERE id = '4' ");


//---------------------------SELECT-----------------------------
// 1 Forma
$cmd = $pdo->prepare("SELECT * FROM pessoas WHERE id = :id");
$cmd->bindValue(":id", 4);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC); //"FETCH"função para transformar a informação que veio do BDD num ARRAY
foreach ($resultado as $key => $value) {
    echo $key.": "."<strong>".$value."</strong>"."<br>";
}
//ou
//$cmd->fetchALL(); //"FETCHALL"mais de um registro do BBD EX (SELECT * FROM pessoas), ai seria todos os registros
//echo "<pre>";
//print_r($resultado);
//echo "</pre>";

// 2 Forma 

?>