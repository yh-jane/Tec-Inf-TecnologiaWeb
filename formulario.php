<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adote um Felino</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php include 'header.php'; ?>

  <main>
    <section id="interesse">
      <div class="container">
        <h2>Formulário de Interesse</h2>
        <form action="mailto:janeyamamoto@alunos.ifsuldeminas.edu.br" method="post" enctype="text/plain">
          <label for="nome">Nome:</label><br>
          <input type="text" id="nome" name="nome" required><br>

          <label for="email">E-mail:</label><br>
          <input type="email" id="email" name="email" required><br>

          <label for="telefone">Telefone:</label><br>
          <input type="tel" id="telefone" name="telefone" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" required><br>

          <label for="interesse">Em qual dos nossos gatos vocês tem interresse?</label><br>
          <textarea id="interesse" name="interesse" rows="4" required></textarea><br>

          <button type="submit">Enviar Interesse</button><br>

          <form action="recebe_dados.php" method="post">

          </form>
      </div>*
    </section>
  </main>

  <?php include 'footer.php'; ?>
</body>

</html>
