<?php
//ESSA PARTE É PARA INCLUIR PROGRAMA AO BANCO DE DADOS
include_once "conexao.php";
?>

<!DOCTYPE html>  <!-- ISSO INFORMA O TIPO DE ARQUIVO, NESTE CASO É "TIPO DE ARQUIVO HTML" -->
<html lang="en"> <!-- LINGUAGEM DO PROGRAMA, POR PADRÃO EM INGLÊS -->

<head> <!-- CABEÇA DO PROGRAMA -->
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- ESSE METADADO INDICA QUE VAMOS PODER ADAPTAR O NOSSO CÓGIDO A OUTROS DISPOSITIVOS, COMO CELULARES, POR EXEMPLO. MANTEVE O CÓDIGO -->
    <title> Prova2 - Programador </title> <!-- É O TÍTULO DA PÁGINA, QUE FICARÁ ESCRITO NA ABA DA JANELA DO NAVEGADOR-->
    <link rel="stylesheet" href="style.css"> <!-- FOI PRECISO CRIAR ESSE LINK PARA UNIR A PROGRAMAÇÃO HTML E O LAYOUT DA PÁGINA EM CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- FONTE RETIRADA DO SITE: https://fonts.google.com/?sort=popularity&query=th-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&display=swap" rel="stylesheet">
</head>

<body> <!-- CORPO DO PROGARMA -->
<div class="container"> <!-- BLOCO DO PROGAMA, TÍTULO -->
    <div class="header">
        <h1>PERÍODO DE TRABALHO</h1> <!-- UTILIZANDO A "MAIOR FONTE" -->
    </div>

    <?php
    //PROGRAMANDO O TRECHO DO PROGAMA QUE SERÁ RESPONSÁVEL POR RECEBER AS INFROMAÇÕES DO PONTO
    $horas = filter_input_array(INPUT_POST, FILTER_DEFAULT); //AQUI EU VOU RECEBER O DADOS TODOS DE UMA VEZ SÓ. ESSES DADOS FORAM ENVIADOS ATRVÉS DO "POST", POR ISSO INPUT_POST (PQ VAI RECEBER DO POST), O FILTER DEFAULT É QUE OS DADOS SERÃO ARMAZENADOS COMO STRING

    //SÓ VOU VALIDAR SE O USUÁRIO CLICAR NO BOTÃO, PARA ISSO:
    if(!empty($horas['sendcadhour'])){

        //CRIAR A QUERY PARA CADASTRAR NO BANCO DE DADOS
        $query_horario = "INSERT INTO horários (nome, entrada, saida) VALUES (:nome, :entrada, :saida)"; //ATRIBUINDO OS CAMPOS DE ENTRADA DE INFORMAÇÕES AS CÉLULAS DO BANCO DE DADOS
        $cad_hora = $conn->prepare($query_horario); //PREPARANDO A QUERY
        $cad_hora->bindParam(':nome',$horas['nome']); //
        $cad_hora->bindParam(':entrada',$horas['entrada']);
        $cad_hora->bindParam(':saida',$horas['saida']);

        //EXECUTANDO A QUERY
        $cad_hora->execute();

        //VERIFICA SE O PONTO FOI CADASTRADO COM SUCESSO
        if($cad_hora->rowCount()){
            echo "<spam style='color: green;'>Horário cadastrado com sucesso</spam><br>";
        }
        else{
            echo"<spam style='color:red;' >Erro ao cadastrar</spam><br>";
        }

        //VERIFICA A QUANTIDADE HORAS DIURNA OU NOTURNA
        //VIREI A NOITE TODA PROGRAMANDO. TIVE QUE PARAR PARA VIR PRO TRABALHO E NÃO TO CONSEGUINDO ACESSAR O BANCO DE DADOS, DA DANDO ERRO
        //E NÃO TO TENDO TEMPO PRA MEXER. PEÇO MIL DESCULPAS, MAS POR FAVOR, TENTE LEVAR EM CONSIDERAÇÃO O ESFORÇO. SE TIVESSE UM POUCO MAIS DE TEMPO ENTREGARIA O PROJETO
        //DESCULPA E OBRIGADO PELA OPORTUNIDADE.

    }  
    ?>

    <div class="main"> <!-- PRIMEIRO CAMPO A SER PREENCHIDO, QUE SERÁ O NOME DO FUNCIONÁRIO -->
        <form method="POST" action =""> <!--UTILIZEI O MÉTODO POST PARA ENVIAR AS INFORMAÇÕES QUE SERÁ ENVIADO PARA ALGUM LUGAR, NESTE CASO, NESSA PRÓPRIA PÁGINA ACTION""-->
            <label>Registre o ponto do colaborador:</label>
            <input type="text" name="nome" placeholder = "Nome do funcionário" required>
            <input type="time" name="entrada" placeholder = "Hora de entrada" required>
            <input type="time" name="saida" placeholder = "Hora da saída" required>
            <input type="submit" name="sendcadhour" value="Registrar">
        </form>
    </div>

    <div class="footer"> <!-- ASSINANDO O PROJETO -->
        <p>Desenvolvido por CamiloACarvalho</p>
    </div>

<!-- FECHANDO TUDO QUE ESTÁ ABERTO -->
</div>
</body>
</head>
</html>
