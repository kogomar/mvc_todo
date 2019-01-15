<?php

include_once APP.'/models/TaskModel.php';

echo 'hi';

class TaskController
{
    public function actionAdd($data)
    {
       TaskModel::addTask($data);

    }
    public function actionDelete($data)
    {
        $id =  $data['id'];
        TaskModel::deleteTask($id);
    }
    public function actionEdit($data)
    {
        TaskModel::editTask($data);
    }
    public function actionDone($data)
    {
        $id = $data['id'];
        TaskModel::doneTask($id);
    }


}