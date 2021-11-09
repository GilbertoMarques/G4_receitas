<!DOCTYPE html>
<!-- alteracao.php -->
<html>
	<head>
	  <title>Cadastro de vendas - Alteração</title>
    <link rel="stylesheet" href="../../includes/style.css"> 
	  <meta charset="utf-8">
      
	</head>
	<body>
    <!-- centralizar tudo e cria um botão bonito de voltar -->
<?php 
// efetua alteração do curso informado em form_alteracao.php
    $id_Cargo = $_GET["id"];
    $nome = $_GET["nome"];
    include('..\..\model\conexao.php');
    include ('..\..\includes\header.php');

  try{
    $query = "UPDATE g4_cargo
    SET nome = :nome
    WHERE id_Cargo = :id;";

    $stmt=$conexao->prepare($query);

    $stmt->bindParam(":nome", $nome, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id_Cargo, PDO::PARAM_INT);

    $stmt->execute();

    echo "Alteração efetuada com sucesso";

  } catch (PDOException $erro) {
    echo "ERRO:". $erro->getMessage();
  }


?>  
 <br>
 <a href="../index.php">Ver Cargos Cadastrados</a>
 
 </body>
</html>

