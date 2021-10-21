<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Lista de Carros";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $revisa = isset($_POST["revisa"]) ? $_POST["revisa"] : 1;  
?>
<html>
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" type="text/css" href="crud1.css">
</head>
<body>
<?php include "menu2.php"; ?>
    <form method="post">
    <p>
        <input type="radio" name="revisa" id="1" value="1"
        <?php if ($revisa == "1" ) {echo 'checked';}?>>Nome
        <label for="1"></label>
        <input type="radio" name="revisa" id="2" value="2"
        <?php if ($revisa == "2" ) {echo 'checked';}?>>Valor(R$)
        <label for="2"></label>
        <input type="radio" name="revisa" id="3" value="3"
        <?php if ($revisa == "3" ) {echo 'checked';}?>>Quilometragem
        <label for="3"></label>
    </p>
    <fieldset>
        <legend>Procurar Carros</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="<?php echo $procurar;?>">
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
        <tr>
            <td><b>ID</b></td>
            <td><b>Nome</b></td> 
            <td><b>Valor</b></td> 
            <td><b>Quilometragem</b></td> 
            <td><b>Data de Fabricação</b></td>  
            <td><b>Anos</b></td>
            <td><b>Média de Quilometragem</b></td>
            <td><b>Desconto pela quilometragem</b></td>
            <td><b>Desconto por anos</b></td>
        </tr>
        <?php
            $pdo = Conexao::getInstance();
            if ($revisa == 1 ){
                $consulta = $pdo->query("SELECT * FROM carro 
                                            WHERE nome LIKE '$procurar%' 
                                            ORDER BY nome");
            }
            elseif ($revisa == 2){
                $consulta = $pdo->query("SELECT * FROM carro 
                                            WHERE valor < '$procurar%' 
                                            ORDER BY valor");
            }
            elseif ($revisa == 3){
                $consulta = $pdo->query("SELECT * FROM carro 
                                            WHERE km < '$procurar%' 
                                            ORDER BY km");
            }
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
                
            $ano = date("Y")- date("Y", strtotime($linha['datafabricacao']));
            $hoje = date("Y");
            $fabricacao = date("Y", strtotime($linha['datafabricacao']));
            $anos = $hoje-$fabricacao;

            $mediaKm = $linha['km']/$anos;

            $porcentajem = 10; //10%

            if ($linha['km'] > 100000){
                $resultado = $linha['valor'] - ($linha['valor'] * $porcentajem /100);
                $class = "red";
            }
            else{
                $resultado = 0;
            }

            if ($anos >= 10){
                $resultado2 = $linha['valor'] - ($linha['valor'] * $porcentajem /100);
                $class = "red";
            }
            else{
                $resultado2 = 0;
            }
        ?>

            <td><?php echo $linha['codigo'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['valor'] ;?>R$</td>
            <td><?php echo $linha['km'];?>km</td>
            <td><?php echo $linha['datafabricacao'];?></td>
            <td><?php echo $anos;?></td>
            <td><?php echo $mediaKm;?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado;?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado2;?></td>
        </tr>

        <?php }  ?>           
        </table>
    </fieldset>
    </form>
</body>
</html>