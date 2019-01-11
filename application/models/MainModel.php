<?php


class MainModel extends Model
{
public static function getTaskList()
{
    $db = DB::getConnection();
    $taskList = array();
    $result = $db->query('SELECT * from tasks');
    $result ->setFetchMode(PDO::FETCH_ASSOC);

    $i=0;
    while ($row = $result->fetch()){
        $taskList[$i]['id'] = $row['id'];
        $taskList[$i]['project_id'] = $row['project_id'];
        $taskList[$i]['name'] = $row['name'];
        $taskList[$i]['user'] = $row['user'];
        $taskList[$i]['end_time'] = $row['end_time'];
        $taskList[$i]['time'] = $row['time'];
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
            $projectsList[$i]['name'] = $row['name'];
            $projectsList[$i]['color'] = $row['color'];
            $projectsList[$i]['user'] = $row['user'];
            $projectsList[$i]['time'] = $row['time'];
            $i++;
        }
        return $projectsList;
    }


}