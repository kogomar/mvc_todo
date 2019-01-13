<?php include_once APP.'/views/header.php'; ?>

<div class="auth">
    <form action="" method="post">
        <h3>Authorization</h3>
        <p>If you are not registered, please <a href="/registration">Sign up</a></p>
        <input type="email" placeholder="Email" name="email" value="<?= $email; ?>"><br>
        <input type="password" placeholder="Pass" name="pass" value="<?= $pass; ?>"><br>
        <button class = "btn btn-auth">Log in</button>
    </form>
    <div class="errors">
        <?php if(isset($errors) && is_array($errors)):
            foreach($errors as $error): ?>
                <p><?=$error ?></p>
            <?php endforeach;
        endif?>
    </div>
</div>
<?php include_once APP.'/views/footer.php'; ?>
