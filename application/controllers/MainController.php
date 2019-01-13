<?php

include_once APP.'/models/TaskModel.php';
include_once APP.'/models/ProjectModel.php';

class MainController extends Controller
{

    function actionIndex()
    {
        $data = array();
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks']    = TaskModel::getTaskList();
        $data['old']      = TaskModel::oldTasks();
        $data['date']     = date("Y-m-d");
        View::generate('MainView.php', $data);

    }
}