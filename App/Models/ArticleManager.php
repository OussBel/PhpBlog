<?php

namespace App\Models;
use Core\DatabaseConnection;
use PDO;

class ArticleManager extends DatabaseConnection {

    public function getAll() {

        $sql = "SELECT a.id, a.title, a.content,
                a.published_at, a.img,
                category.name AS category_name,
                user.name AS author
                FROM article AS a
                LEFT JOIN category
                ON a.category_id = category.id
                JOIN user ON a.user_id = user.id
                WHERE a.published = 1;";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, ArticleManager::class);
    }

    public function getById($id) {

        $sql = "SELECT a.id, a.title, a.content,
                a.published_at, a.img,
                category.name AS category_name, user.name AS author
                FROM article AS a
                LEFT JOIN category ON a.category_id = category.id
                JOIN user ON a.user_id = user.id
                WHERE a.published = 1 AND a.id = :id;
                ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, ArticleManager::class);
        return $stmt->fetch();

    }

    public function add() {

    }

    public function getCatgeries() {
        $sql = "SELECT * FROM category";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, ArticleManager::class);
    }
}