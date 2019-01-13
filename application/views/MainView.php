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

                <?php if(!empty($data)):
                foreach ($data['projects'] as $project) : ?>
                <div class="single_pro">
                    <ul>
                         <li class="circle_color"><img src="../../public/images/<?=$project['color'];?>-circle.png"></li><br>
                         <li><a id="<?=$project['id']?>" href="project/<?=$project['id'];?> "><?= $project['pname']; ?></a></li>
                        <li class="pro_menu">
                             <span>Edit</span>
                             <span><a href="#" onclick="deletePro(<?=$project['id'];?>)">Delete</a></span>
                        </li>
                    </ul>
                </div>
                <?php endforeach; ?>
                <?php  endif;?>

            <select name="" id="pro_color">
                <option value="green">green</option>
                <option value="red">red</option>
                <option value="orange">orange</option>
                <option value="blue">blue</option>
            </select>
            <input type="text" id="pro_name">
            <input type="hidden" id="pro_id" value="">
            <button id="pro_send">Send</button>
            <button id="pro_update">Update</button>
        </div>
    </div>
    <div class="col-middle">
        <?php if (!empty($data['old'])): ?>
        <div class="old_tasks">
            <h3>Overdue tasks</h3>
    <?php  foreach ($data['old'] as $old) : ?>
        <div class="single_task" id="<?=$old['id']; ?>">
            <ul>
                <li class="square_color"><img src="/public/images/<?=$old['priority'] ?>-squre.png"></li>
                <li class="tname"><?=$old['tname'] ?></li>
                <li class="tname"><?=$old['user'] ?></li>
                <li class="tname"><?=$old['end_time'] ?></li>
                <li class="pname"><?=$old['pname'] ?></li>
                <li class="circle_color"><img src="/public/images/<?=$old['color'] ?>-circle.png"></li>
                <li class="task_menu"><a id="" href="#"></a>|</li>
            </ul>

        </div>
    <?php endforeach; ?>
        </div>
        <div class="tasks">
            <h3>Tasks</h3>
            <?php  foreach ($data['tasks'] as $task) : ?>
            <div class="single_task" id="<?=$task['id']; ?>">
                <ul>
                    <li class="square_color"><img src="/public/images/<?=$task['priority'] ?>-squre.png"></li>
                    <li class="tname"><?=$task['tname'] ?></li>
                    <li class="tname"><?=$task['user'] ?></li>
                    <li class="tname"><?=$task['end_time'] ?></li>
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
            <button type="button" class="btn-auth" onclick="doneTask(<?='7' ?>);">Done</button>
        </div>
    </div>
    <div class="col-right"></div>
</div>
<?php include_once APP.'/views/footer.php'; ?>