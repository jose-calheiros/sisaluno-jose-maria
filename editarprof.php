<?php
 
 include_once ("hoje.php");

?>

<?php
    require_once('conexao.php');

    $cpf = $_GET['CPF'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM professor where cpf= :cpf";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':cpf',$cpf, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome = $array_retorno['nome'];
   $rg = $array_retorno['rg'];
   $orgao = $array_retorno['orgao'];
   $cpf = $array_retorno['cpf'];
   $tel = $array_retorno['telefone'];
   $email = $array_retorno['email'];
   $curso = $array_retorno['curso'];
   $disciplina = $array_retorno['disciplina'];
   $matricula = $array_retorno['matricula'];
   $endereco = $array_retorno['endereco'];
   $numero = $array_retorno['nr_casa'];
   $bairro = $array_retorno['bairro'];
   $municipio = $array_retorno['municipio'];
   $cep = $array_retorno['cep'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadprof.css">
    <title>Document</title>
</head>
<body>

<h1>Cadastro</h1> 
<div class="principal">

<form action="tabelaprof.php" method="GET">
    <div class="nome"><p>Nome Completo: <br><input id="nome" type="text" name="nome" value="<?php echo $nome?>"required></div> 
     <div class="l1">
     <div class="rg"> <p>RG: <br> <input type="text" name="rg"value="<?php echo $rg;?>"required></p></div>
     <div class="orgao"><p>Orgão de expedição: <br> <select id="org" name="orgao" id="orgao"required></p> 
<option value="<?php echo $orgao;?>"><?php echo $orgao;?></option>
  <option value="sac">SAC</option>
    <option value="detran">Detran</option>
    <option value="ssp">SSP</option>  
</select></div>
     <div class="cpf"> <p>CPF: <br> <input type="text" name="cpf"value="<?php echo $cpf?>"required></p></div>
     </div> 
    <div class="l2">
    <div class="tel"><p>Telefone de Contato:<br> <input type="tel" name="tel"value="<?php echo $tel?>"required/> </p></div>
  <div class="email"><p>Email:<br> <input id="email" type="email" name="email"value="<?php echo $email?>"required/> </p></div>
    </div>
     <div class="l3">
        <div class="curso"><p>Curso:  <br> <input id="curso" type="text" name="curso"value="<?php echo $curso?>"required/> </p>
        </div>
        <div class="disciplina"><p>Disciplina:  <br> <input id="disciplina" type="text" name="disciplina"value="<?php echo $disciplina?>"required/> </p>
        </div>
<div class="matricula"> <p>Número de Matricula: <br> <input type="text" name="matricula"value="<?php echo $matricula?>"required></p></div>
</div>
<div class="l4">
<div class="endereco"> <p>Endereço: <br> <input id="end" type="text" name="endereco"value="<?php echo $endereco?>"required></p></div>
<div class="complemento"> <p>Número: <br> <input type="text" name="numero"value="<?php echo $numero?>"required></p></div>
</div>
<div class="l5">
<div class="bairro"> <p>Bairro: <br> <input type="text" name="bairro"value="<?php echo $bairro?>"required></p></div>
<div class="municipio"> <p>Município: <br> <input type="text" name="municipio"value="<?php echo $municipio?>"required></p></div>
<div class="cep"> <p>CEP: <br> <input type="text" name="cep"value="<?php echo $cep?>"required></p></div>
</div>


<div class="b"><p> <input id="b" type="submit" name="update" value="Salvar"/></p></div> 

</form> 
</div>
</div>  
<?php
 include_once ("rp.php");
 ?>
</body>
</html>