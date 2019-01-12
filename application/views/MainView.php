<?php include_once APP.'/views/header.php'; ?>
<div class="content">
    <div class="col-left">
        <div class="days">
            <ul>
                <li><a href="/">Today </a><span>3</span></li>
                <li><a href="/task/seven">Next 7 days</a></li>
            </ul>
        </div>
        <div class="projects">
            <p>Projects</p>
            <ul>
                <li>Work <span>3</span></li>
                <li>Day</li>
                <li>Alone</li>
                <li>Notebook</li>
                <li>Film</li>
                <li></li>

            </ul>
        </div>
    </div>
    <div class="col-middle">
        <div class="tasks">
            <p>Tasks</p>
            <table  width="100%" >
                <tr>
                    <th>Task</th>
                    <th>Project</th>
                </tr>
                <tr>
                    <td>Task</td>
                    <td class="second">Home</td>

                </tr>
                <tr>
                    <td>Task</td>
                    <td class="second">Home</td>
                </tr>
                <tr>
                    <td>Task</td>
                    <td class="second">Home</td>
                </tr>
            </table>
            <?php var_dump($data); ?>
        </div>
    </div>
    <div class="col-right"></div>
</div>
<?php include_once APP.'/views/footer.php'; ?>