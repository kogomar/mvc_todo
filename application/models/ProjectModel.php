<?php


class ProjectModel extends Model
{
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
            $projectsList[$i]['time'] = $row['time'];
            $i++;
        }
        return $projectsList;
    }
    public static function addProject($data){
        $db = DB::getConnection();
        $sql = 'INSERT INTO projects (pname, color) VALUES (:pname, :color)';
        $result = $db->prepare($sql);
        $result->bindParam(':pname', $data['name']);
        $result->bindParam(':color', $data['color']);
        $result->execute();
    }
    public static function deleteProject($id){
        include_once APP.'/models/TaskModel.php';
        $check = TaskModel::checkDoneTasks($id);
        $issetTask = TaskModel::checkIssetTasks($id);
        if($check) {
            $db = DB::getConnection();
            if($issetTask){
                $sql = 'DELETE projects, tasks FROM projects, tasks WHERE projects.id=:id AND tasks.project_id =:id';
            }else{
                $sql = 'DELETE FROM projects WHERE id=:id';
            }
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id);
            $result->execute();
        }else{
            echo 'Delete false! You have tasks in progress';
        }
    }
    public static function editProject($data){

        $db = DB::getConnection();
        $sql = 'UPDATE projects SET  pname = :pname, color = :color WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $data['id']);
        $result->bindParam(':pname', $data['name']);
        $result->bindParam(':color', $data['color']);
        $result->execute();
    }


}