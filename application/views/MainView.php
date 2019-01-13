<?php include_once APP.'/views/header.php'; ?>
<div class="content">
    <div class="col-left">
        <div class="days">
            <ul>
                <li><a href="/today">Today </a><span>3</span></li>
                <li><a href="/nextseven">Next 7 days</a></li>
            </ul>
        </div>
        <div class="projects">
            <p>Projects</p>
            <ul>
                <?php if(!empty($data)):
                foreach ($data['projects'] as $project) : ?>
                <li><a id="<?=$project['id']?>" href="project/<?=$project['id'];?> "><?= $project['pname']; ?></a> <span> 3</span></li>
                <?php endforeach;
                      endif;?>

            </ul>
        </div>
    </div>
    <div class="col-middle">
        <?php if (!empty($data)): ?>
        <div class="endtime_tasks"></div>
        <div class="tasks">
            <?php  foreach ($data['tasks'] as $task) : ?>
            <div class="single_task" id="<?=$task['id']; ?>">
                <ul>
                    <li class="square_color"><img src="/public/images/<?=$task['priority'] ?>-squre.png"></li>
                    <li class="tname"><?=$task['tname'] ?></li>
                    <li class="tname"><?=$task['user'] ?></li>
                    <li class="pname"><?=$task['pname'] ?></li>
                    <li class="circle_color"><img src="/public/images/<?=$task['color'] ?>-circle.png"></li>
                    <li class="task_menu"><a id="" href="#"></a>|</li>
                </ul>
            </div>
            <?php endforeach; ?>
            <?php //var_dump($data); ?>
        </div>

                 <?php endif; ?>
        <div class="add_task">
            <br>
            <input type="text" id="task_text">
            <input type="hidden" id="username"value="<?=$_SESSION['user_name']?>">
            <select id="task_priority">
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>
            </select>
            <select id="task_status">
                <option>In progress</option>
                <option>Done</option>
            </select>
            <select id="task_project">
                <?php  foreach ($data['projects'] as $project) : ?>
                <option ><?= $project['pname'].'|'.$project['id'] ?></option>
                <?php endforeach;?>
            </select>
            <input type="date" id="task_day" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?=$data['date'];?>" >
            <button class="btn-auth" id="send_task">Send</button>

            <button type="button" class="btn-auth" onclick="deleteTask(<?='6' ?>);">Delete</button>
            <button type="button" class="btn-auth" onclick="updateTask(<?='7' ?>);">Update</button>
        </div>
    </div>
    <div class="col-right"></div>
</div>
<?php include_once APP.'/views/footer.php'; ?>