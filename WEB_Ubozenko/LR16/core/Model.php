<?php
    class Model {
        protected $pdo;
        protected $table;

        public function __construct(PDO $pdo, $table) {
            $this->pdo = $pdo;
            $this->table = $table;
        }

        public function all() {
            $sql = "SELECT * FROM $this->table";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id) {
            $sql = "SELECT * FROM $this->table WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function create($data) {
            $columns = implode(', ', array_keys($data));
            $values = ':' . implode(', :', array_keys($data));

            $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();
        }

        public function update($id, $data) {
            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "$key = :$key";
            }
            $set = implode(', ', $set);

            $sql = "UPDATE $this->table SET $set WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':id', $id);
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            return $stmt->execute();
        }

        public function delete($id) {
            $sql = "DELETE FROM $this->table WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }
?>