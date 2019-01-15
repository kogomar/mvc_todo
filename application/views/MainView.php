<?php include_once APP.'/views/header.php'; ?>
<div class="content">
    <div class="col-left">
        <div class="days">
            <ul>
                <li><a href="/today">Today </a></li>
                <li><a href="/nextseven">Next 7 days</a></li>
                <li><a href="/archive">Done tasks</a></li>
            </ul>
        </div>
        <div class="projects">
            <p>Projects</p>

                <?php if(!empty($data)):
                foreach ($data['projects'] as $project) : ?>
                <div class="single_pro">
                    <ul data-hint="<?=$project['id']?>">
                         <li class="circle_color"><img src="../../public/images/<?=$project['color'];?>-circle.png"></li><br>
                         <li><a id="<?=$project['id']?>" href="project/<?=$project['id'];?> "><?= $project['pname']; ?></a></li>
                        <li id="hint-<?=$project['id']?>" class="pro_menu">
                             <span><a href="#" onclick="clickEditPro(<?=$project['id'];?> ,'<?= $project['pname']; ?>', '<?=$project['color'];?>')">Edit</a></span>
                             <span><a href="#" onclick="deletePro(<?=$project['id'];?>)">Delete</a></span>
                        </li>
                    </ul>
                </div>
                <?php endforeach; ?>
                <?php  endif;?>
            <div class="add_pro_btn">
                <button id="show_add_pro" class="btn_add">+Add project</button>
            </div>

            <div class="add_project">
                <div>
                    <select  id="pro_color">
                        <option value="green">green</option>
                        <option value="red">red</option>
                        <option value="orange">orange</option>
                        <option value="blue">blue</option>
                    </select>
                    <input type="text" id="pro_name" placeholder="Project name" value="">
                    <input type="hidden" id="pro_id" value="">
                    <button class="pro_btn" id="pro_send">Send</button>
                    <button class="pro_btn" id="pro_update">Update</button>
                    <button class="pro_btn" id="pro_cancel">Cancel</button>
                </div>


            </div>

        </div>
    </div>
    <div class="col-middle">
        <?php if (!empty($data['old'])): ?>
        <div class="old_tasks">
            <h3>Overdue tasks</h3>
    <?php  foreach ($data['old'] as $old) : ?>
        <div class="single_task" id="<?=$old['id']; ?>">
            <ul data-oldhint="<?=$old['id']?>">
                <li class="square_color"><img src="/public/images/<?=$old['priority'] ?>-squre.png"></li>
                <li class="tname"><?=$old['tname'] ?></li>
                <li class="tname"><?=$old['user'] ?></li>
                <li class="tname"><?=$old['end_time'] ?></li>
                <li class="pname"><?=$old['pname'] ?></li>
                <li class="circle_color"><img src="/public/images/<?=$old['color'] ?>-circle.png"></li>
                <li id="oldhint-<?=$old['id']?>" class="task_menu">
                <span>
                    <a id="task_edit" onclick="updateTask(<?=$old['id'];?>, '<?=$old['tname'] ?>', '<?=$old['end_time'] ?>', '<?=$old['pname'] ?>', '<?=$old['priority']?>');" href="#">Edit</a>
                    <a id="task_done" onclick="doneTask(<?=$old['id'];?>)" href="#">Done</a>
                    <a id="task_del" onclick="deleteTask(<?=$old['id'];?>)" href="#">Delete</a>
                </span>
                </li>
            </ul>

        </div>
    <?php endforeach; ?>
        </div>
        <div class="tasks">
            <h3>Tasks</h3>
            <?php  foreach ($data['tasks'] as $task) : ?>
            <div class="single_task" id="<?=$task['id']; ?>">
                <ul data-taskhint="<?=$task['id']?>">
                    <li class="square_color"><img src="/public/images/<?=$task['priority'] ?>-squre.png"></li>
                    <li class="tname"><?=$task['tname'] ?></li>
                    <li class="tname"><?=$task['user'] ?></li>
                    <li class="tname"><?=$task['end_time'] ?></li>
                    <li class="pname"><?=$task['pname'] ?></li>
                    <li class="circle_color"><img src="/public/images/<?=$task['color'] ?>-circle.png"></li>
                    <li id="taskhint-<?=$task['id']?>" class="task_menu">
                    <span>
                    <a id="task_edit" onclick="updateTask(<?=$task['id'];?>, '<?=$task['tname'] ?>', '<?=$task['end_time'] ?>', '<?=$task['pname'] ?>', '<?=$task['priority'] ?>');" href="#">Edit</a>
                    <a id="task_done" onclick="doneTask(<?=$task['id'];?>)" href="#">Done</a>
                        <a id="task_del" onclick="deleteTask(<?=$task['id'];?>)" href="#">Delete</a>
                    </span>

                    </li>
                </ul>

            </div>
            <?php endforeach; ?>

        </div>

                 <?php endif; ?>
        <div class="add_task_btn">
            <button id="show_add_task" class="btn_add">+Add task</button>
        </div>

        <div id="preview">
            <div class="add_task_div">
                    <span>
                        <a href="#" id="close_modal">
                            <img src="../../public/images/close.png" width="25px" height="25px" alt="">
                        </a>
                    </span>
                <div class="add_task">
                         <p>Enter task name: <input type="text" id="task_text" placeholder="Task name" value=""></p>
                         <input type="hidden" id="username"value="<?=$_SESSION['user_name']?>">
                         <input type="hidden" id="edit_id" value="">
                         <p>Please choose task priority:
                             <select id="task_priority">
                                 <option>High</option>
                                 <option>Medium</option>
                                 <option>Low</option>
                             </select>
                         </p>
                          <p id="task_status_p">
                              <select id="task_status">
                                  <option>In progress</option>
                                  <option>Done</option>
                              </select>
                          </p>
                        <p>Please choose task project:
                            <select id="task_project">
                                <?php  foreach ($data['projects'] as $project) : ?>
                                    <option ><?= $project['pname'].'|'.$project['id'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </p>
                        <p>Please choose task end date:
                            <input type="date" id="task_day" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?=$data['date'];?>" >
                        </p>


                         <button class="btn-auth" id="send_task">Send</button>
                         <button  class="btn-auth" id="update_task">Update</button>

                </div

            </div>
        </div>
    </div>

    </div>
    <div class="col-right"></div>
</div>
<?php include_once APP.'/views/footer.php'; ?>