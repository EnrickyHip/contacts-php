<?php

require_once __DIR__ . "/dotenv.php";

define('AES_KEY', $_ENV['AES_KEY']);
define('AES_IV', $_ENV['AES_IV']); 

function aes_encrypt(string $value): string {
  return bin2hex(openssl_encrypt($value, 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV));
}

function aes_decrypt(string $hash): string | false {
  if (mb_strlen($hash) % 2 === 1 ) {
    return false;
  }
  return openssl_decrypt(hex2bin($hash), 'aes-256-cbc', AES_KEY, OPENSSL_RAW_DATA, AES_IV);
}