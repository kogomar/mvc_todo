<?php

include_once APP.'/models/ProjectModel.php';

class ProjectController
{
    public function actionAdd($data)
    {
        ProjectModel::addProject($data);
    }
    public function actionDelete($data)
    {
       $id =  $data['id'];
        ProjectModel::deleteProject($id);
    }
    public function actionEdit($data)
    {
        ProjectModel::editProject($data);
    }

}