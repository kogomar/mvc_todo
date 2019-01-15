<?php


class TaskModel extends Model
{
    public static function getTaskList()
    {
        $db = DB::getConnection();
        $taskList = array();
        $result = $db->query('SELECT projects.pname, projects.color, tasks.id, tasks.tname, tasks.tuser, tasks.priority, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id AND tasks.status=0  AND tasks.end_time >=CURDATE() ORDER BY tasks.priority');
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
    public static function addTask($data)
    {

        $data['priority'] =  self::getPriority($data['priority']);
        $data['status']  = self::getStatus($data['status']);

        $db = DB::getConnection();
        $sql = 'INSERT INTO tasks (project_id, tname, priority, status,  tuser, end_time ) VALUES (:project_id, :tname, :priority, :status,  :tuser, :end_time)';
        $result = $db->prepare($sql);
        $result->bindParam(':project_id', $data['projects_id']);
        $result->bindParam(':tname', $data['tname']);
        $result->bindParam(':priority', $data['priority']);
        $result->bindParam(':status', $data['status']);
        $result->bindParam(':tuser', $data['user']);
        $result->bindParam(':end_time', $data['date']);
        $result->execute();
        return true;
    }
    public static function deleteTask($id){
        $db = DB::getConnection();
        $sql = 'DELETE FROM tasks WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }
    public static function editTask($data){
        $data['priority'] =  self::getPriority($data['priority']);

        $db = DB::getConnection();
        $sql = 'UPDATE tasks SET project_id = :project_id, tname = :tname, priority = :priority, end_time = :end_time WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $data['id']);
        $result->bindParam(':project_id', $data['projects_id']);
        $result->bindParam(':tname', $data['tname']);
        $result->bindParam(':priority', $data['priority']);
        $result->bindParam(':end_time', $data['end_time']);
        $result->execute();
    }
    public static function doneTask($id)
    {   $status = '1';
        $db = DB::getConnection();
        $sql = 'UPDATE tasks SET status = :status WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':status', $status);

        $result->execute();
    }
    public static function showDoneTasks(){
        $db = DB::getConnection();
        $taskList = array();
        $result = $db->query('SELECT projects.pname, projects.color, tasks.id, tasks.tname, tasks.tuser, tasks.priority, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id AND tasks.status=1 ORDER BY tasks.priority');
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['tname'] = $row['tname'];
            $taskList[$i]['priority'] = $row['priority'];
            $taskList[$i]['end_time'] = $row['end_time'];
            $taskList[$i]['pname'] = $row['pname'];
            $taskList[$i]['user'] = $row['tuser'];
            $taskList[$i]['color'] = $row['color'];
            $i++;
        }
        return $taskList;
    }
    public static function getPriority($priority)
    {
        switch ( $priority) {
            case 'High':
                $priority = '1';
                break;
            case 'Medium':
                $priority= '2';
                break;
            case 'Low':
                $priority= '3';
                break;
        }
        return $priority;
    }
    public static function getStatus($status)
    {
        switch ( $status) {
            case 'In progress':
                $status = '0';
                break;
            case 'Done':
                $status = '1';
                break;
        }
        return $status;
    }
    public static function checkDoneTasks($id)
    {
        $status = '0';
        $db = DB::getConnection();
        $sql = 'SELECT * FROM tasks WHERE project_id = :id AND status = :status GROUP BY id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if($row){
            return false;
        }else{
            return true;
        }
    }
    public static function checkIssetTasks($id)
    {
        $status = '0';
        $db = DB::getConnection();
        $sql = 'SELECT * FROM tasks WHERE project_id = :id  GROUP BY id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if($row){
            return true;
        }else{
            return false;
        }
    }
    public static function singleProjectTask($id)
    {
        $status = '0';
        $db = DB::getConnection();
        $taskList = array();
        $sql = 'SELECT projects.pname, projects.color, tasks.id, tasks.tuser, tasks.tname,  tasks.priority, tasks.status, tasks.end_time
                                    FROM tasks, projects WHERE projects.id =:id AND tasks.project_id = :id AND tasks.status=:status ORDER BY tasks.priority';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);
        $result->execute();
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['tname'] = $row['tname'];
            $taskList[$i]['user'] = $row['tuser'];
            $taskList[$i]['priority'] = $row['priority'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['end_time'] = $row['end_time'];
            $taskList[$i]['pname'] = $row['pname'];
            $taskList[$i]['color'] = $row['color'];
            $i++;
        }
        return $taskList;
    }
    public static function sevenDaysTasks()
    {
        $db = DB::getConnection();
        $taskList = array();
        $result = $db->query( 'SELECT projects.pname, projects.color, tasks.tuser, tasks.id, tasks.tname, tasks.priority, tasks.status, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id  
                                    AND tasks.status=0 AND tasks.end_time > NOW()  AND tasks.end_time < NOW() + INTERVAL 7 DAY  ORDER BY tasks.priority');
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['tname'] = $row['tname'];
            $taskList[$i]['user'] = $row['tuser'];
            $taskList[$i]['priority'] = $row['priority'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['end_time'] = $row['end_time'];
            $taskList[$i]['pname'] = $row['pname'];
            $taskList[$i]['color'] = $row['color'];
            $i++;
        }
        return $taskList;
    }
    public static function todayTasks()
    {
        $db = DB::getConnection();
        $taskList = array();
        $result = $db->query( 'SELECT projects.pname, projects.color, tasks.tuser, tasks.id, tasks.tname, tasks.priority, tasks.status, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id  
                                    AND tasks.status=0 AND tasks.end_time = CURDATE() ORDER BY tasks.priority');
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['tname'] = $row['tname'];
            $taskList[$i]['user'] = $row['tuser'];
            $taskList[$i]['priority'] = $row['priority'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['end_time'] = $row['end_time'];
            $taskList[$i]['pname'] = $row['pname'];
            $taskList[$i]['color'] = $row['color'];
            $i++;
        }
        return $taskList;
    }
    public static function oldTasks()
    {
        $db = DB::getConnection();
        $taskList = array();
        $result = $db->query( 'SELECT projects.pname, projects.color, tasks.tuser, tasks.id, tasks.tname, tasks.priority, tasks.status, tasks.end_time 
                                    FROM tasks, projects WHERE projects.id = tasks.project_id  
                                    AND tasks.status=0 AND tasks.end_time < CURDATE() ORDER BY tasks.priority');
        $result ->setFetchMode(PDO::FETCH_ASSOC);

        $i=0;
        while ($row = $result->fetch()){
            $taskList[$i]['id'] = $row['id'];
            $taskList[$i]['tname'] = $row['tname'];
            $taskList[$i]['user'] = $row['tuser'];
            $taskList[$i]['priority'] = $row['priority'];
            $taskList[$i]['status'] = $row['status'];
            $taskList[$i]['end_time'] = $row['end_time'];
            $taskList[$i]['pname'] = $row['pname'];
            $taskList[$i]['color'] = $row['color'];
            $i++;
        }
        return $taskList;
    }
}