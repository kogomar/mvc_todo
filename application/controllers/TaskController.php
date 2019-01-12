<?php

include_once APP.'/models/TaskModel.php';

class TaskController
{
    public function actionAdd()
    {
        TaskModel::addTask();
    }
    public function actionDelete()
    {
        TaskModel::deleteTask();
    }
    public function actionEdit()
    {
        TaskModel::editTask();
    }

}