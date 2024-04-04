<?php

namespace App\Models;

// BaseDb.php
abstract class BaseDb {
    protected \PDO $db;
    protected string $tableName;
    protected string $primaryKey;

    public function __construct(\PDO $db) {
        $this->db = $db;
    }

    public function findAll(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->tableName}");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->tableName} WHERE {$this->primaryKey} = :id");
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->tableName} WHERE {$this->primaryKey} = :id");
        return $stmt->execute([':id' => $id]);
    }


    //Pour les gestion des transactions

    public function startTransaction(): void {
        $this->db->beginTransaction();
    }

    public function commit(): void {
        $this->db->commit();
    }

    public function rollback(): void {
        $this->db->rollBack();
    }

    // Define more common methods if needed.
}

