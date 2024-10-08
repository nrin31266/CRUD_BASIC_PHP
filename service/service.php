<?php

class Service {
    private $connection;
    private $table;
    public function __construct($connection, $table) {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function insertRow($data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        echo $columns;
        echo $values;
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        $stmt = $this->connection->prepare($sql);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        return $stmt->execute();
    }

    public function deleteRow($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateRow($id, $data) {
        $set = [];
        foreach ($data as $key => $val) {
            $set[] = "$key = :$key";
        }
        $setString = implode(", ", $set);

        $sql = "UPDATE {$this->table} SET $setString WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        return $stmt->execute();
    }

    public function getRowById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRows() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
