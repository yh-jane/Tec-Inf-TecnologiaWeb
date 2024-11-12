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

  -$jsonPath = 'dados_interesse.json';
  $jsonData = [];

  if (file_exists($jsonPath)) {
    $jsonData = json_decode(file_get_contents($jsonPath), true);
  }

  $jsonData[] = $dados;

  file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT));

  echo "<p>Obrigado pelo interesse! Seus dados foram enviados com sucesso.</p>";
} else {
  echo "<p>Erro ao enviar os dados. Por favor, tente novamente.</p>";
}
?>
