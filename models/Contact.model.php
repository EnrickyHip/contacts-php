<?php

declare(strict_types=1);

require_once __DIR__ . "/../database/Database.php";

class Contact { 
  public readonly string | int $id;

  private function __construct(
    string | int $id, 
    public string $name,
    public string $phone,
    public string $email,
  ) {
    $this->id = $id;
  }

  public static function create(string $name, string $phone, string $email): Contact {
    try {
      $sql = "INSERT INTO contato (nome, telefone, email) VALUES (:nome, :telefone, :email)";
      $query = Database::get_database()->prepare($sql);
      $query->execute([
        ":nome" => $name,
        ":telefone" => $phone,
        ":email" => $email
      ]);

      $id = Database::get_database()->lastInsertId();

      return new Contact($id, $name, $phone, $email);
    } catch (PDOException $exception) {
      throw $exception;
    }
  }

  public static function get_all(): array {
    try {
      $sql = "SELECT * FROM contato";
      $query = Database::get_database()->prepare($sql);
      $query->execute();
      $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
  
      return array_map(
        fn($contact) => new Contact($contact['id'], $contact['nome'], $contact['telefone'], $contact['email']), 
        $contacts
      );
    } catch (PDOException $exception) {
      throw $exception;
    }
  }
 
  public static function get_one(string | int $id): Contact | null {
    try {
      $sql = "SELECT * FROM contato WHERE id = ?";
      $query = Database::get_database()->prepare($sql);
      $query->execute([$id]);

      if ($query->rowCount() > 0) {
        $contact = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        
        $name = $contact['nome'];
        $phone = $contact['telefone'];
        $email = $contact['email'];

        return new Contact($id, $name, $phone, $email);
      }
      return null;
    } catch (PDOException $exception) {
      throw $exception;
    }
  }

  public function delete(): void {
    try {
      $sql = "DELETE FROM contato WHERE email = ?";
      $query = Database::get_database()->prepare($sql);
      $query->execute([$this->email]);
    } catch (PDOException $exception) {
      throw $exception;
    }
  }

  public function update(string $name, string $phone, string $email): Contact {
    try {
      $sql = "UPDATE contato 
              SET nome = :nome,
                  telefone = :telefone,
                  email = :email
              WHERE telefone = :telefone_antigo";

      $query = Database::get_database()->prepare($sql);
      $query->execute([
        ":nome" => $name,
        ":telefone" => $phone,
        ":email" => $email,
        ":telefone_antigo" => $this->phone,
      ]);

      $this->name = $name;
      $this->phone = $phone;
      $this->email = $email;

      return $this;
    } catch (PDOException $exception) {
      throw $exception;
    }
  }
}