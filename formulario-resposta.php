<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adote um Felino</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitização e validação dos dados recebidos
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $interesse = htmlspecialchars(trim($_POST['interesse']));

    // Validando o e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "O e-mail fornecido não é válido.";
      exit();
    }

    // Preparando os dados para salvar
    $dados = [
      "nome" => $nome,
      "email" => $email,
      "telefone" => $telefone,
      "interesse" => $interesse,
    ];

    // Caminho para o arquivo JSON
    $jsonPath = 'dados_interesse.json';
    $jsonData = [];

    // Verifica se o arquivo existe e carrega os dados existentes
    if (file_exists($jsonPath)) {
      $jsonContents = file_get_contents($jsonPath);
      $jsonData = json_decode($jsonContents, true);

      if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Erro ao processar o arquivo JSON existente: " . json_last_error_msg();
        exit();
      }
    }

    // Adicionando os novos dados
    $jsonData[] = $dados;

    // Escreve os dados no arquivo JSON com a flag LOCK_EX
    if (file_put_contents($jsonPath, json_encode($jsonData, JSON_PRETTY_PRINT), LOCK_EX) !== false) {
      echo "Obrigado pelo interesse! Seus dados foram enviados com sucesso.";
    } else {
      echo "Erro ao salvar os dados. Verifique as permissões do arquivo.";
    }
  } else {
    echo "Erro ao enviar os dados. Por favor, tente novamente.";
  }
  ?>
