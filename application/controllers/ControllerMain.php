<?php


class ControllerMain extends Controller
{
    function actionIndex()
    {
        $this->view->generate('MainView.php', 'TemplateView.php');
    }
}