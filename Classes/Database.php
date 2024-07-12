<?php

namespace Classes;

use PDO;
use PDOException;

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

    /**
     * specify columns in $columns else involve all columns
     * ex. querySelectAll(['id', 'title'])
     */
    public function querySelectAll(array $columns = ["*"]) {
        $statement = $this->connection->prepare("SELECT " . implode(", ", $columns) . " FROM notestbl");
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * need to define :id value in $params
     * then specify columns in $columns else involve all columns
     * ex. querySelectOne([':id' => $id], ['id', 'title'])
     */
    public function querySelectOne(array $params, array $columns = ["*"]) {
        $statement = $this->connection->prepare("SELECT " . implode(", ", $columns) . " FROM notestbl WHERE id = :id");
        $statement->execute($params);

        return $statement->fetch();
    }

    /**
     * need to define :title and :body value in $params
     * ex. queryInsert([':title' => $title, ':body' => $body])
     */
    public function queryInsert(array $params) {
        $statement = $this->connection->prepare("INSERT INTO notestbl (title, body) VALUES (:title, :body)");
        $statement->execute($params);
    }

    /**
     * need to define :id, :title and :body value in $params
     * ex. queryUpdate([':id' => $id, ':title' => $title, ':body' => $body])
     */
    public function queryUpdate(array $params) {
        $statement = $this->connection->prepare("UPDATE notestbl SET title = :title AND body = :body WHERE id = :id");
        $statement->execute($params);
    }

    /**
     * need to define :id value in $params
     * ex. queryDelete([':id' => $id])
     */
    public function queryDelete(array $params) {
        $statement = $this->connection->prepare("DELETE FROM notestbl WHERE id = :id");
        $statement->execute($params);
    }
}