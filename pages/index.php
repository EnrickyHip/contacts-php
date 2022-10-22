<!DOCTYPE html>
<html lang="en">

<?php

  require_once __DIR__ . '/../inc/head.php';
  require_once __DIR__ . '/../models/Contact.model.php';
  require_once __DIR__ . '/../encrypt.php';

  head(title: "Contatos");
  $contacts = Contact::get_all();

?>

<style>
table, td, th {
  border: 1px solid;
  padding: 5px;
}

table {
  border-collapse: collapse;
}

</style>

<body>
  <table>
    <thead>
      <th>Nome</th>
      <th>Telefone</th>
      <th>E-mail</th>
      <th>Editar</th>
      <th>Excluir</th>
    </thead>
    <tbody>
      <?php foreach($contacts as $contact):
        ?>
        <tr>
          <td><?= $contact->name ?></td>
          <td><?= $contact->phone ?></td>
          <td><?= $contact->email ?></td>
          <td>
            <a href="./edit_contact.php?id=<?= aes_encrypt($contact->id) ?>">Editar</a>
          </td>
          <td>
            <a href="../controllers/contact/delete.php?id=<?= aes_encrypt($contact->id) ?>">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="./add_contact.php">Cadastrar Contato</a>
</body>
</html>
