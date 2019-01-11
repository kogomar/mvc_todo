<?php

include_once APP.'/models/ProjectModel.php';

class ProjectController
{
    public function actionAdd()
    {
        ProjectModel::addProject();
    }
    public function actionDelete()
    {
        ProjectModel::deleteProject();
    }
    public function actionEdit()
    {
        ProjectModel::deleteProject();
    }
}