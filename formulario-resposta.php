<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $interesse = $_POST['interesse'];

  $dados = [
    "nome" => $nome,
    "email" => $email,
    "telefone" => $telefone,
    "interesse" => $interesse,
  ];

  $jsonPath = 'dados_interesse.json';
  $jsonData = [];

  if (file_exists($jsonPath)) {
    $jsonContents = file_get_contents($jsonPath);
    $jsonData = json_decode($jsonContents, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      echo "Erro ao processar o arquivo JSON existente: " . json_last_error_msg();
      exit();
    }
  }

  $jsonData[] = $dados;

  if (file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT))) {
    echo "Obrigado pelo interesse! Seus dados foram enviados com sucesso.";
  } else {
    echo "Erro ao salvar os dados. Verifique as permissões do arquivo.";
  }
} else {
  echo "Erro ao enviar os dados. Por favor, tente novamente.";
}
?>
