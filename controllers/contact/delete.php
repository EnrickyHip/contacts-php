<?php

declare(strict_types=1);

require_once __DIR__ . "/../../models/Contact.model.php";
require_once __DIR__ . '/../../encrypt.php';

delete_contact();

function delete_contact() {
  $contact_id = aes_decrypt($_GET['id']);
  $contact = Contact::get_one($contact_id);
  
  if ($contact) {
    $contact->delete();
  }
  
  header("Location: /Contatos");
}  
