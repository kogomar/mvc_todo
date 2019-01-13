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
                                <li><a id="<?=$project['id']?>" href="/project/<?=$project['id'];?> "><?= $project['pname']; ?></a></li>
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
            <?php if (!empty($data)): ?>
                <div class="endtime_tasks"></div>
                <div class="tasks">
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

        </div>
        <div class="col-right"></div>
    </div>
<?php include_once APP.'/views/footer.php'; ?>