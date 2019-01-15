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
                <?php if(!empty($data)): ?>
                    <?php foreach ($data['projects'] as $project) : ?>
                        <div class="single_pro">
                            <ul data-hint="<?=$project['id']?>">
                                <li class="circle_color"><img src="../../public/images/<?=$project['color'];?>-circle.png"></li><br>
                                <li><a id="<?=$project['id']?>" href="/project/<?=$project['id'];?> "><?= $project['pname']; ?></a></li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php  endif;?>



            </div>
        </div>
        <div class="col-middle">
            <?php if (!empty($data)): ?>
                <div class="endtime_tasks"></div>
                <div class="tasks">
                    <h2>
                        <?php echo $data['message'];
                        if(isset($data['tasks'][0]['pname'])):
                        echo $data['tasks'][0]['pname'];
                        endif; ?>
                    </h2>
                    <?php  foreach ($data['tasks'] as $task) : ?>
                        <div class="single_task" id="<?=$task['id']; ?>">
                            <ul data-taskhint="<?=$task['id']?>">
                                <li class="square_color"><img src="/public/images/<?=$task['priority'] ?>-squre.png"></li>
                                <li class="tname"><?=$task['tname'] ?></li>
                                <li class="tname"><?=$task['user'] ?></li>
                                <li class="tname"><?=$task['end_time'] ?></li>
                                <li class="pname"><?=$task['pname'] ?></li>
                                <li class="circle_color"><img src="/public/images/<?=$task['color'] ?>-circle.png"></li>
                            </ul>

                        </div>
                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>
        <div class="col-right"></div>
    </div>
<?php include_once APP.'/views/footer.php'; ?>