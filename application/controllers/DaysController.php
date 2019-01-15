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
        $data['message'] = 'Tasks for project ';

        View::generate('SingleProjectView.php', $data);
    }

    public function actionSeven()
    {
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::sevenDaysTasks();
        $data['message'] = 'Tasks for next 7 days';
        View::generate('DoneTasksView.php', $data);
    }
    public function actionToday()
    {
        $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::todayTasks();
        $data['message'] = 'Today tasks';
        View::generate('DoneTasksView.php', $data);
    }
    public function actionShowdone()
    {   $data['projects'] = ProjectModel::getProjectList();
        $data['tasks'] = TaskModel::showDoneTasks();
        $data['message'] = 'Done tasks';

        View::generate('DoneTasksView.php', $data);
    }
}