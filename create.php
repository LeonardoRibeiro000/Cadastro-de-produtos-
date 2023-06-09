
<html>
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<nav  class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active"><a style="color: white;" class="nav-link" href="./read.php" target="blank">Exibir itens cadastrados <span class="sr-only">(current)</span></a></li>
      <li class="nav-item active"><a style="color: white;" class="nav-link" href="./delete.php" target="blank">Deletar um produto <span class="sr-only">(current)</span></a></li>
      <li class="nav-item active"><a style="color: white;" class="nav-link" href="./update.php" target="blank">Editar um produto <span class="sr-only">(current)</span></a></li>      
</nav>

<div class="card" style="width: 18rem; margin-left: 35%; margin-top: 2%; margin-bottom: 7em; ">
        <div class="card-body">
        <form method="POST" class="form-group"  action="create.php">
        <h3 class="card-title">Cadastrar produto:</h3> <br>
        Descrição: <input class="form-control" type="text" name="desc">
        Qtd: <input class="form-control" type="number" name="qtd">
        Valor: <input class="form-control" type="number" name="valor"><br>
        <input type="submit" value="Cadastrar" class="btn-success" > <br> <br>
      </form></div></div>
   
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
<?php

include "./connection.php"; //inclui a função de conexão com o DB
$conn = getConnection(); // atribui a função de conexão a uma variável

//inserir dados 

#Atribuir os dados recebidos do formulário à variáveis através das variáveis superglobais
$descricao = $_POST["desc"];
$qtd = $_POST["qtd"];
$valor = $_POST["valor"];


//método prepare e execute -> statement
$insert = $conn->prepare("INSERT INTO tb_produtos (descricao, qtd, valor) VALUES (:desc, :qtd, :valor)")
$insert = $conn->prepare($insert);
$insert->bindParam(":desc", $descricao);
$insert->bindParam(":qtd", $qtd);
$insert->bindParam(":valor", $valor);

//tratamento de erro 
try{
    $insert->execute()
    echo '<script>alert("Produto cadastrado com sucesso!")</script>';
}catch(PDOException $error){
    echo "Erro no cadastro: " . $error;
}
