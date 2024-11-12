<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adote um Felino</title>
  <link rel="stylesheet" href="styles.css">
  <script>
    function enviarFormulario(event) {
      event.preventDefault(); // Impede o envio padrão do formulário
      const formData = new FormData(document.getElementById("formInteresse"));

      fetch("formulario-resposta.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          document.getElementById("mensagemResposta").innerHTML = data;
        })
        .catch((error) => {
          document.getElementById("mensagemResposta").innerHTML = "Erro ao enviar o formulário.";
          console.error("Erro:", error);
        });
    }
  </script>
</head>

<body>
  <?php include 'header.php'; ?>

  <main>
    <section id="interesse">
      <div class="container">
        <h2>Formulário de Interesse</h2>
        <form id="formInteresse" onsubmit="enviarFormulario(event)">
          <label for="nome">Nome:</label><br>
          <input type="text" id="nome" name="nome" required><br>

          <label for="email">E-mail:</label><br>
          <input type="email" id="email" name="email" required><br>

          <label for="telefone">Telefone:</label><br>
          <input type="tel" id="telefone" name="telefone" pattern="\(\d{2}\) \d{5}-\d{4}" required><br>

          <label for="interesse">Em qual dos nossos gatos você tem interesse?</label><br>
          <textarea id="interesse" name="interesse" rows="4" required></textarea><br>

          <button type="submit">Enviar Interesse</button><br>
        </form>

        <!-- Contêiner para exibir a mensagem de resposta -->
        <div id="mensagemResposta"></div>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>
</body>

</html>
