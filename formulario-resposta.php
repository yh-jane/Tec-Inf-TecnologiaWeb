<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  var_dump($_POST);  // Adicione esta linha para ver os dados do formulário

  $nome = htmlspecialchars($_POST['nome']);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $telefone = htmlspecialchars($_POST['telefone']);
  $interesse = htmlspecialchars($_POST['interesse']);

  $dados = [
    "nome" => $nome,
    "email" => $email,
    "telefone" => $telefone,
    "interesse" => $interesse,
  ];

  $jsonPath = __DIR__ . '/dados_interesse.json';
  $jsonData = [];

  if (file_exists($jsonPath)) {
    $jsonContents = file_get_contents($jsonPath);
    $jsonData = json_decode($jsonContents, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      echo "<p>Erro ao processar o arquivo JSON existente: " . json_last_error_msg() . "</p>";
      exit();
    }
  }

  $jsonData[] = $dados;

  if (file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT))) {
    echo "<p>Obrigado pelo interesse! Seus dados foram enviados com sucesso.</p>";
  } else {
    echo "<p>Erro ao salvar os dados. Verifique as permissões do arquivo.</p>";
  }
} else {
  echo "<p>Erro ao enviar os dados. Por favor, tente novamente.</p>";
}
?>
