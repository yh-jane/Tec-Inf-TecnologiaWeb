<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adote um Felino</title>
  <link rel="stylesheet" href="styles.css">
  <script>
    function formatPhone(input) {
      const value = input.value.replace(/\D/g, ''); // Remove tudo que não é dígito
      const length = value.length;

      if (length < 3) {
        input.value = value;
      } else if (length < 7) {
        input.value = `(${value.slice(0, 2)}) ${value.slice(2)}`;
      } else {
        input.value = `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7, 11)}`;
      }
    }
  </script>
</head>

<body>
  <?php include 'header.php'; ?>

  <main>
    <section id="interesse">
      <div class="container">
        <h2>Formulário de Interesse</h2>
        <form action="formulario-resposta.php" method="post">
          <label for="nome">Nome:</label><br>
          <input type="text" id="nome" name="nome" required><br>

          <label for="email">E-mail:</label><br>
          <input type="email" id="email" name="email" required><br>

          <label for="telefone">Telefone:</label><br>
          <input type="tel" id="telefone" name="telefone" oninput="formatPhone(this)" maxlength="15" required><br>

          <label for="interesse">Em qual dos nossos gatos você tem interesse?</label><br>
          <textarea id="interesse" name="interesse" rows="4" required></textarea><br>

          <button type="submit">Enviar Interesse</button><br>
        </form>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>
</body>

</html>
