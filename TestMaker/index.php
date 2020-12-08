<?php
session_start();

require_once('Router.php');

// include('example/controller/MainController.php');
include_once('controller/LoginController.php');
include_once('controller/DashboardController.php');
include_once('controller/QuestionController.php');
include_once('controller/QuestionListController.php');

$router = new Router();

$router->addRoute('/$',function($url) {
    // echo 'Welcome to the homepage';
    $login = new LoginController();
    print_r($login->view('light'));
});

$router->addRoute('/dashboard', function($url){
    $dashboard = new DashboardController();
    print_r($dashboard->view());
});

$router->addRoute('/questions', function($url){
    $questionList = new QuestionListController();
    print_r($questionList->view());
});

$router->addRoute('/add-question', function($url) {
    $question = new QuestionController();
    print_r($question->view('add'));
});

$router->addRoute('/edit-question?id=([0-9a-zA-Z\-]+)', function($url, $slug){
    $question = new QuestionController();
    print_r($question->view('edit', $slug));
});

// $router->addRoute('/articles/([0-9a-zA-Z\-]+)',function($url,$slug) {
//     echo 'Displaying article with slug '.$slug;
// });

// $router->addRoute('/test-controller',function($url) {
//     $main = new MainController();
//     print_r($main->view('Thien', '21'));
// });

$router->run();
