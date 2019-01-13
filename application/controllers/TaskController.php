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
    public function actionSeven()
    {
        echo('hi');
    }
    public function actionToday()
    {
        echo('hi');
    }
    public function actionShowdone()
    {
       $tasks = TaskModel::showDoneTasks();


        View::generate('DoneTasksView.php', $tasks);
    }
}