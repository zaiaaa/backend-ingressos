<?php

include('./database.php');

$nome = $_POST['nome'];
$date = $_POST['data'];
$cantores = $_POST['cantores'];
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$lote = $_POST['lote'];
$local = $_POST['local'];
$limite_ingresso = $_POST['limite_ingresso'];
$arquivos = $_FILES['imagens'];
    


    if (isset($_POST['nome'])) {
        if(!empty($arquivos)){
        
        $query = mysqli_query($conn, "INSERT INTO concerto(nome, data_show, cantores, descricao, valor, lote, local_concerto, limite_ingresso)   values('$nome', '$date', '$cantores', '$descricao', '$valor', '$lote', '$local', '$limite_ingresso')");
        if($query === TRUE){
            echo '<h4>Cadastro realizado com sucesso</h4>';
            $last_id = mysqli_insert_id($conn);
        }else{
            echo 'Erro de cadastro '. $conn->error;
        }    
    }else{
        echo 'Erro de cadastro '. $conn->error;
    }

            
    foreach ($arquivos['name'] as $key => $nome) {
        $tmp_name = $arquivos['tmp_name'][$key];
        $error = $arquivos['error'][$key];
        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $novoNome = uniqid();

        if ($error === UPLOAD_ERR_OK) {
            // Processar e mover o arquivo temporário $tmp_name para o destino desejado
            $destinoBanco = 'arquivos/' . $novoNome . '.' .$extensao;
            $destinoPasta = '../arquivos/' . $novoNome . '.' .$extensao;
            move_uploaded_file($tmp_name, $destinoPasta);

            mysqli_query($conn, "INSERT INTO imagens(caminho, id_concerto) values('$destinoBanco', $last_id)");
            echo "Arquivo $nome enviado com sucesso!<br>";
        } else {
            echo "Erro ao enviar o arquivo $nome. Código de erro: $error<br>";
        }
    }
    echo  "<a href='../index.php'><button type='button'>Ir à listagem</button></a>";
    $conn->close();  
    
    
    // var_dump($arquivos);   

    // $nomeArq = $_FILES['imagens_evento']['name'];
    // $tipo = $_FILES['imagens_evento']['type'];
    // $tmp_name = $_FILES['imagens_evento']['tmp_name'];
    // $tamanho = $_FILES['imagens_evento']['size'];
    // $erros = array();
    
    // $tamanho_max = 1024 * 1024 * 10;

    // if($tamanho > $tamanho_max){
    //     $erros[] = "Seu arquivo excede o tamanho máximo";
    // }

    // $arquivosPermitidos = ["png", "jpg", "jpeg", "webp"];
    // $extensao = pathinfo($nomeArq, PATHINFO_EXTENSION);

    // if(!in_array($extensao, $arquivosPermitidos)){
    //     $erros[] = "Arquivo não permitido";
    //  }

    // if(!empty($erros)){
    //     foreach($erros as $erro){
    //         echo $erro;
    //     }
    // }else{
    //     $path = '../arquivos/';

    //     move_uploaded_file($tmp_name, $path.$nomeArq);

    // }
}


    ?>