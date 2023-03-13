<?php

namespace App\Controllers;
use App\Models\ArticleManager;

class ArticleController extends \Core\View {

    public function index() {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAll();

        parent::renderTemplate('articles.html', ["articles" => $articles]);
    }

    public function show($id) {
        $articleManager = new ArticleManager();
        $article = $articleManager->getById($id);

        parent::renderTemplate('article.html', ["article" => $article]);
    }

    public function add() {
        $articleManager = new ArticleManager();
        $categories = $articleManager->getCatgeries();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);
        }

        parent::renderTemplate('form.html', ['categories' => $categories]);
    }
}