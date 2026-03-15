<?php
require_once "../config/config.php";

$dir = __DIR__."/../uploads/img/";

if(!is_dir($dir)){
    mkdir($dir,0777,true);
}

if(!isset($_FILES['imagens'])){
    echo json_encode(["success"=>false,"msg"=>"Nenhuma imagem enviada"]);
    exit;
}

$total = count($_FILES['imagens']['name']);

for($i=0;$i<$total;$i++){

    $nome = $_FILES['imagens']['name'][$i];
    $tmp  = $_FILES['imagens']['tmp_name'][$i];

    $ext = pathinfo($nome,PATHINFO_EXTENSION);

    $novoNome = time()."_".$i.".".$ext;

    move_uploaded_file($tmp,$dir.$novoNome);

    $stmt = $pdo->prepare("INSERT INTO galeria (arquivo,titulo) VALUES (?,?)");
    $stmt->execute([$novoNome,$nome]);

}

header('Content-Type: application/json');

echo json_encode([
    "success"=>true
]);

exit;