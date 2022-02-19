<?php

include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getnewsList();

        require_once (ROOT.'/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
        $newsItem = News::getNewsItemById($id);
        echo '<pre>';
        print_r($newsItem);
        echo '</pre>';

        return true;
    }
}
