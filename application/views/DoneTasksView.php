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
                        foreach ($data as $project) : ?>
                            <li><a id="<?=$project['id']?>" href="project/<?=$project['id'];?> "><?= $project['pname']; ?></a> <span> 3</span></li>
                        <?php endforeach;
                    endif;?>

                </ul>
            </div>
        </div>
        <div class="col-middle">
            <?php if (!empty($data)): ?>
                <div class="tasks">
                    <?php  foreach ($data as $task) : ?>
                        <div class="single_task" id="<?=$task['id']; ?>">
                            <ul>
                                <li class="square_color"><img src="/public/images/<?=$task['priority'] ?>-squre.png"></li>
                                <li class="tname"><?=$task['tname'] ?></li>
                                <li class="pname"><?=$task['pname'] ?></li>
                                <li class="circle_color"><img src="/public/images/<?=$task['color'] ?>-circle.png"></li>
                                <li class="task_menu"><a id="" href="#"></a>|</li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="col-right"></div>
    </div>
<?php include_once APP.'/views/footer.php'; ?>