<?php

include_once APP.'/models/MainModel.php';

class MainController extends Controller
{

    function actionIndex()
    {
        $data = array();
        $data['projects'] = MainModel::getProjectList();
        $data['tasks']    = MainModel::getTaskList();

        $this->view->generate('MainView.php', $data);

    }
}