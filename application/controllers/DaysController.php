<?php

include_once APP.'/models/TaskModel.php';
include_once APP.'/models/ProjectModel.php';

class DaysController extends Controller
{
    public function actionSingle($id)
    {
        $data['id'] = $id;
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::singleProjectTask($id);


        View::generate('SingleProjectView.php', $data);
    }

    public function actionSeven()
    {
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::sevenDaysTasks();
        View::generate('SingleProjectView.php', $data);
    }
    public function actionToday()
    {
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::todayTasks();
        View::generate('SingleProjectView.php', $data);
    }
}