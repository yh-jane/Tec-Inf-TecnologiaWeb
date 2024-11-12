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

  // Verifica se o arquivo existe e é legível
  if (file_exists($jsonPath)) {
    $jsonContents = file_get_contents($jsonPath);
    $jsonData = json_decode($jsonContents, true);

    // Verifica por erros na decodificação do JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
      echo "<p>Erro ao processar o arquivo JSON existente: " . json_last_error_msg() . "</p>";
      exit();
    }
  }

  // Adiciona os novos dados ao array JSON existente
  $jsonData[] = $dados;

  // Salva o conteúdo atualizado no arquivo JSON
  if (file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT))) {
    echo "<p>Obrigado pelo interesse! Seus dados foram enviados com sucesso.</p>";
  } else {
    echo "<p>Erro ao salvar os dados. Verifique as permissões do arquivo.</p>";
  }
} else {
  echo "<p>Erro ao enviar os dados. Por favor, tente novamente.</p>";
}
?>
