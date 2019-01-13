<?php


class MainModel extends Model
{
public static function getTaskList()
{
    $db = DB::getConnection();
    $taskList = array();
    $result = $db->query('SELECT projects.pname, projects.color, tasks.id, tasks.tname, tasks.tuser, tasks.priority, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id AND tasks.status=0 ORDER BY tasks.priority');
    $result ->setFetchMode(PDO::FETCH_ASSOC);

    $i=0;
    while ($row = $result->fetch()){
        $taskList[$i]['id'] = $row['id'];
        $taskList[$i]['tname'] = $row['tname'];
        $taskList[$i]['user'] = $row['tuser'];
        $taskList[$i]['priority'] = $row['priority'];
        $taskList[$i]['end_time'] = $row['end_time'];
        $taskList[$i]['pname'] = $row['pname'];
        $taskList[$i]['color'] = $row['color'];
        $i++;
    }
    return $taskList;

}

    public static function getProjectList()
    {
        $db = DB::getConnection();
        $projectsList = array();
        $result = $db->query('SELECT * from projects');
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $projectsList[$i]['id'] = $row['id'];
            $projectsList[$i]['pname'] = $row['pname'];
            $projectsList[$i]['color'] = $row['color'];
            $projectsList[$i]['user'] = $row['puser'];
            $projectsList[$i]['time'] = $row['time'];
            $i++;
        }
        return $projectsList;
    }


}