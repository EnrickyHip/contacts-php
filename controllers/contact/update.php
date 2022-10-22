<?php

declare(strict_types=1);

if(!isset($_POST['edit_contact']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo "404 not found";
  exit;
}

require_once __DIR__ . '/../../encrypt.php';
require_once __DIR__ . "/../../models/Contact.model.php";

update();

function update() {
  $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
  $phone = filter_input(INPUT_POST, "phone");
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $id = aes_decrypt(filter_input(INPUT_POST, "id"));
  
  $contact = Contact::get_one($id);
  $contact->update($name, $phone, $email);
  
  header("Location: /Contatos");
}