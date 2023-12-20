<?php
class Model
{
    static $pdo = null;
    static $table = 'rieltors';

    public $columns = null;

    public function __construct(PDO $pdo, $data = null)
    {
        static::$pdo = $pdo;
        $this->columns = (object) [];

        if ($data) {
            foreach ($data as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    protected static function createInstance(PDO $pdo)
    {
        return new static($pdo);
    }

    public static function all(PDO $pdo)
    {
        $sql = "SELECT * FROM " . static::$table;
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $realtors = [];

        foreach ($rows as $row) {
            $realtor = static::createInstance($pdo);
            foreach ($row as $key => $value) {
                $realtor->columns->$key = $value;
            }
            $realtors[] = $realtor;
        }

        return $realtors;
    }


    public function update($id, $data)
    {
        try {
            // Find the realtor by ID
            $realtor = static::find(static::$pdo, $id);

            if ($realtor) {
                foreach ($data as $key => $value) {
                    $realtor->columns->$key = $value;
                }

                $realtor->save();

                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    public function save()
    {
        if ($this->columns->id) {
            // Update existing realtor
            $sql = "UPDATE " . static::$table . " SET name = :name, email = :email, phone = :phone WHERE id = :id";
            $stmt = static::$pdo->prepare($sql);
            $stmt->bindParam(':id', $this->columns->id);
        } else {
            // Insert new realtor
            $sql = "INSERT INTO " . static::$table . " (name, email, phone) VALUES (:name, :email, :phone)";
            $stmt = static::$pdo->prepare($sql);
        }

        $stmt->bindParam(':name', $this->columns->name);
        $stmt->bindParam(':email', $this->columns->email);
        $stmt->bindParam(':phone', $this->columns->phone);

        return $stmt->execute();
    }

    public function delete()
    {
        if ($this->columns->id) {
            $sql = "DELETE FROM " . static::$table . " WHERE id = :id";
            $stmt = static::$pdo->prepare($sql);
            $stmt->bindParam(':id', $this->columns->id);

            return $stmt->execute();
        }

        return false;
    }

    public static function find(PDO $pdo, $id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $model = static::createInstance($pdo, static::$table);
            foreach ($stmt->fetch(PDO::FETCH_ASSOC) as $key => $value) {
                $model->columns->$key = $value;
            }
            return $model;
        }

        return null;
    }
}
?>
