<?php
 
 include_once ("hoje.php");

?>
<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');



##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        ##codigo SQL
$nome = $_GET ['nome'];
 $rg = $_GET ['rg'];
 $orgao = $_GET ['orgao'];
 $cpf=$_GET ['cpf'];
 $tel=$_GET ['tel'];
 $email=$_GET ['email'];
 $curso=$_GET ['curso'];
 $disciplina=$_GET ['disciplina'];
 $matricula=$_GET ['matricula'];
 $endereco=$_GET ['endereco'];
 $numero=$_GET ['numero'];
 $bairro=$_GET ['bairro'];
 $municipio=$_GET ['municipio'];
 $cep=$_GET ['cep'];


 

 $sql = "INSERT INTO professor VALUES('$nome',$rg,'$orgao','$cpf','$tel','$email','$curso','$disciplina','$matricula','$endereco','$numero','$bairro','$municipio','$cep')";
        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo " <strong>OK!</strong> o professor
                $nome foi Incluido com sucesso!!!"; 
                echo " <button class='button'><a href='login.php'>Fazer login</a></button>";
            }
        }
#######alterar
if(isset($_GET['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_GET["nome"];
    $rg = $_GET['rg'];
    $orgao = $_GET ['orgao'];
    $cpf = $_GET['cpf'];
    $tel = $_GET['tel'];
    $email = $_GET['email'];
    $curso = $_GET['curso'];
    $disciplina=$_GET ['disciplina'];
    $matricula = $_GET['matricula'];
    $endereco = $_GET['endereco'];
    $numero = $_GET['numero'];
    $bairro = $_GET['bairro'];
    $municipio = $_GET['municipio'];
    $cep = $_GET['cep'];
    
   
      ##codigo sql
    $sql = "UPDATE  professor SET nome= :nome, rg= :rg , orgao= :orgao,cpf= :cpf, telefone= :telefone, email= :email, curso= :curso,disciplina= :disciplina, matricula= :matricula, endereco= :endereco, 
    nr_casa= :nr_casa, bairro= :bairro, municipio= :municipio, cep= :cep  WHERE cpf= :cpf ";
   
    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':cpf',$cpf, PDO::PARAM_STR);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':rg',$rg, PDO::PARAM_INT);
    $stmt->bindParam(':orgao',$orgao, PDO::PARAM_STR);
    $stmt->bindParam(':telefone',$tel, PDO::PARAM_STR);
    $stmt->bindParam(':email',$email, PDO::PARAM_STR);
    $stmt->bindParam(':curso',$curso, PDO::PARAM_STR);
    $stmt->bindParam(':disciplina',$disciplina, PDO::PARAM_STR);
    $stmt->bindParam(':matricula',$matricula, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':nr_casa',$numero, PDO::PARAM_INT);
    $stmt->bindParam(':bairro',$bairro, PDO::PARAM_STR);
    $stmt->bindParam(':municipio',$municipio, PDO::PARAM_STR);
    $stmt->bindParam(':cep',$cep, PDO::PARAM_INT);
 
    $stmt->execute();
 


    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o aluno
             $nome foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='login.php'>Fazer login</a></button>";
        }

}        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="31.css">
    <title>Document</title>
</head>
<body>

    <h1>Dados do Professor</h1>

<div class="principal">

<table>
<tr>
    <td>Nome Completo</td>
<td>
    <?php
    echo $nome;
    ?>
    </td>
</tr>
<tr>
    <td>RG </td>
<td>
    <?php
    echo $rg;
    ?>
    </td>
</tr>
<tr>
    <td>Orgão de expedição</td>
<td>
    <?php
    echo $orgao;
    ?>
    </td>
</tr>
<tr>
    <td>CPF </td>
<td>
    <?php
    echo $cpf;
    ?>
    </td>
</tr>
<tr>
    <td>Telefone</td>
<td>
    <?php
    echo $tel;
    ?>
    </td>
</tr>
<tr>
    <td>Email</td>
<td>
    <?php
    echo $email;
    ?>
    </td>
</tr>

<tr>
    <td>Curso</td>
<td>
    <?php
    echo $curso;
    ?>
    </td>
</tr>
<tr>
    <td>Disciplina</td>
<td>
    <?php
    echo $disciplina;
    ?>
    </td>
</tr>
<tr>
    <td>Matricula</td>
<td>
    <?php
    echo $matricula;
    ?>
    </td>
</tr>

<tr>
    <td>Endereço</td>
<td>
    <?php
    echo $endereco;
    ?>
    </td>
</tr>

<tr>
    <td>Número</td>
<td>
    <?php
    echo $numero;
    ?>
    </td>
</tr>

<tr>
    <td>Bairro</td>
<td>
    <?php
    echo $bairro;
    ?>
    </td>
</tr>

<tr>
    <td>Município</td>
<td>
    <?php
    echo $municipio;
    ?>
    </td>
</tr>

<tr>
    <td>CEP</td>
<td>
<?php
    echo $cep;
    ?>
    
   
    </td>
</tr>



</table>

<form action="editarprof.php" method="get">
<input type="hidden" name="nome" value="<?php echo$_GET ['nome']?>">
    <input type="hidden" name="rg" value="<?php echo$_GET ['rg']?>">
    <input type="hidden" name="orgao" value="<?php echo$_GET ['orgao']?>">
    <input type="hidden" name="CPF" value="<?php echo$_GET ['cpf']?>">
    <input type="hidden" name="tel" value="<?php echo$_GET ['tel']?>">
    <input type="hidden" name="email" value="<?php echo$_GET ['email']?>">
    <input type="hidden" name="curso" value="<?php echo$_GET ['curso']?>">
    <input type="hidden" name="disciplina" value="<?php echo$_GET ['disciplina']?>">
    <input type="hidden" name="matricula" value="<?php echo$_GET ['matricula']?>">
    <input type="hidden" name="endereco" value="<?php echo$_GET ['endereco']?>">
    <input type="hidden" name="numero" value="<?php echo$_GET ['numero']?>">
    <input type="hidden" name="bairro" value="<?php echo$_GET ['bairro']?>">
    <input type="hidden" name="municipio" value="<?php echo$_GET ['municipio']?>">
    <input type="hidden" name="cep" value="<?php echo$_GET ['cep']?>">
   
    <div class="edit"><p><input type="submit" value="Editar"></p></div>

</form> 

















 
</div>
<?php
 include_once ("rp.php");
 ?>

 
</body>
</html>

