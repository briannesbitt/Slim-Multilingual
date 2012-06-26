<?php if (isset($error)):?>
<p class="error"><?php echo $error?></p>
<?php endif;?>

<form action="<?php echo $this->urlFor('loginPost')?>" method="POST">
    <?php echo $this->tr('login-email')?> : <input type="text" name="email" id="email"/><br/>
    <?php echo $this->tr('login-password')?> : <input type="password" name="password" id="password"/><br/>
    <input type="submit" value="<?php echo $this->tr('login-submit')?>" /><br/>
</form>