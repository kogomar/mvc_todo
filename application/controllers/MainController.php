<?php


class MainController extends Controller
{

    function actionIndex()
    {
        $this->view->generate('MainView.php');
    }
}