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

  <form action="../controllers/contact/store.php" method="post">
    <div>
      <label for="name" id="name">Nome:</label>
      <input id="name" name="name" type="text">
    </div>

    <div>
      <label for="phone" id="phone">Telefone:</label>
      <input id="phone" name="phone" type="tel">
    </div>

    <div>
      <label for="email" id="email">E-mail:</label>
      <input id="email" name="email" type="email">
    </div>

    <button type="submit" name="submit_contact">Cadastrar</button>
  </form>
</body>
</html>