<?php include_once APP.'/views/header.php'; ?>

    <div class="auth">

        <form action="" method="post">
            <h3>Registration</h3>
            <input type="text" placeholder="Name" name="login" value="<?= $login; ?>"> <br>
            <input type="email" placeholder="Email" name="email" value="<?= $email; ?>"><br>
            <input type="password" placeholder="Pass" name="pass" value="<?= $pass; ?>"><br>
            <button class = "btn btn-auth">Register</button>
        </form>
        <div class="errors">
            <?php if(isset($errors) && is_array($errors)):
                foreach($errors as $error): ?>
                    <p><?=$error ?></p>
                <?php endforeach;
            endif?>
            <?php if (isset($message)): ?>
                    <br><span><?=$message ; ?></span>
            <?php endif; ?>
        </div>

    </div>
<?php include_once APP.'/views/footer.php'; ?>
