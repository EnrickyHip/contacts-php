<!DOCTYPE html>
<html lang="en">

<?php

  include_once __DIR__ . '/../inc/head.php';
  head(title: "Adicionar Contato");

?>

<style>
  div {
    margin-bottom: 5px;
  }
</style>

<body>
  <h2>Cadastrar Contato</h2>

  <form id="form" action="../controllers/contact/store.php" method="post">
    <div>
      <label for="name">Nome:</label>
      <input id="name" name="name" type="text">
    </div>

    <div>
      <label for="phone">Telefone:</label>
      <input id="phone" name="phone" type="tel">
    </div>

    <div>
      <label for="email">E-mail:</label>
      <input id="email" name="email" type="email">
    </div>

    <button type="submit" name="submit_contact" id="submit_contact">Cadastrar</button>
    <div id="error"></div>
  </form>
  <script src="/public/assets/js/bundle.js"></script>
</body>
</html>
