<?php

namespace Core;

use PDO;
use PDOException;
use Core\Response;

class Database
{
    public $conn;
    public $stmt;

    public function __construct($config, $username = 'root', $password = '')
    {
        try {
            $dsn = 'mysql:' . http_build_query($config, '', ';');
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            throw new PDOException("Database Error!: " . $e->getMessage());
        }
    }

    public function query($query, $params = []): Database
    {
        $this->stmt = $this->conn->prepare($query, $params);
        $this->stmt->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findAll()
    {
        return $this->stmt->fetchAll();
    }

    public function findOrFail()
        {
            $result = $this->find();

            if (! $result) {
                abort(Response::PAGE_NOT_FOUND);
            }

            return $result;
        }

    public function findOrAbort()
    {
        $result = $this->find();

        if (!($result)) {
            abort(Response::PAGE_NOT_FOUND);
        }

        return $result;
    }

    public function findAllOrAbort()
    {
        $result = $this->findAll();

        if (!($result)) {
            abort(Response::PAGE_NOT_FOUND);
        }

        return $result;
    }


}