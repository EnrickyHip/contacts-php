<!DOCTYPE html>
<html lang="en">

<?php
  require_once __DIR__ . '/../inc/head.php';
  require_once __DIR__ . '/../models/Contact.model.php';
  require_once __DIR__ . '/../encrypt.php';
  head(title: "Editar Contato");

  $contact_id = $_GET["id"];
  $decrypt_id = aes_decrypt($contact_id);

  if (!$decrypt_id) {
    die("contato não existe!");
  }

  $contact = Contact::get_one($decrypt_id);
?>

<style>

div {
  margin-bottom: 5px;
}

</style>

<body>
  <h2>Editar Contato</h2>

  <form id="form" action="../controllers/contact/update.php" method="post">
    <div>
      <label for="name">Nome:</label>
      <input value="<?= $contact->name ?>" id="name" name="name" type="text">
    </div>

    <div>
      <label for="phone">Telefone:</label>
      <input value="<?= $contact->phone ?>" id="phone" name="phone" type="tel">
    </div>

    <div>
      <label for="email">E-mail:</label>
      <input value="<?= $contact->email ?>" id="email" name="email" type="email">
    </div>

    <input value="<?= $contact_id ?>" type="hidden" name="id">

    <button type="submit" name="edit_contact" id="submit_contact" >Save</button>
    <div id="error"></div>
  </form>
  <script src="/public/assets/js/bundle.js"></script>
</body>
</html>
