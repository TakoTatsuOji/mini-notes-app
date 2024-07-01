<?php

class Database {
    private $connection;

    public function __construct(array $dsn_params, string $username = 'root', string $password = '') {
        try {
            $dsn = "mysql:" . http_build_query($dsn_params, "", ";");

            $this->connection = new PDO($dsn, $username, $password,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function querySelectAll(array $columns = ["*"]) {
        $statement = $this->connection->prepare("SELECT " . implode(", ", $columns) . " FROM notestbl");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function querySelectOne(array $params, array $columns = ["*"]) {
        $statement = $this->connection->prepare("SELECT " . implode(", ", $columns) . " FROM notestbl WHERE id = :id");
        $statement->execute($params);

        return $statement->fetch();
    }

    public function queryInsert(array $params) {
        $statement = $this->connection->prepare("INSERT INTO notestbl (title, body) VALUES (:title, :body)");
        $statement->execute($params);
    }

    public function queryUpdate(array $params) {
        $statement = $this->connection->prepare("UPDATE notestbl SET title = :title AND body = :body WHERE id = :id");
        $statement->execute($params);
    }

    public function queryDelete(array $params) {
        $statement = $this->connection->prepare("DELETE FROM notestbl WHERE id = :id");
        $statement->execute($params);
    }
}