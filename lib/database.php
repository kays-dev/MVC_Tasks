<?php

class DatabaseConnection
{
    public $database = null;

    public function getConnected(): PDO
    {
        if ($this->database == null)
            $host = 'localhost';
        $dbname = 'mvc-tasks';
        $username = 'root';
        $password = '';
        $charset = 'utf8mb4';

        // Création d'une instance PDO
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        try {
            $this->database = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
        return $this->database;
    }
}

