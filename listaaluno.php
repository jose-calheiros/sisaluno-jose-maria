<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lista.css">
</head>
<body>
<div class="principal">
<?php 
/*
 * Melhor prática usando Prepared Statements
 * 
 */
  require_once('conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM Aluno');
  $retorno->execute();

?>       
        <table> 
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>MATRICULA</th>
                    <th>CURSO</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                        <td> <?php echo $value['nome']?>  </td>     
                        <td> <?php echo $value['cpf'] ?>   </td> 
                            <td> <?php echo $value['rg']?> </td> 
                            <td> <?php echo $value['matricula']?> </td> 
                            <td> <?php echo $value['curso']?> </td> 
                            <td>
                               <form method="get" action="editar.php">
                                        <input name="CPF" type="hidden" value="<?php echo $value['cpf'];?>"/>
                                        <button name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td>
                               <form method="get" action="alterado.php">
                                        <input name="cpf" type="hidden" value="<?php echo $value['cpf'];?>"/>
                                        <button name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 


                       
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
         
  
<div class="b"><button class='button button3'><a href='login.php'>Voltar</a></button>
</div>
</div>
</body>
</html>
