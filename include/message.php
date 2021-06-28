<?php if (count($errors) > 0) { ?>
    <ul class="msg error">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php foreach ($errors as $error) { ?>
            <li><?php echo $error; ?></li>
            <?php }; ?>
        </ul>
<?php };
/* if (count($successes) > 0) { ?>
    <ul class="msg success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php foreach ($successes as $success) { ?>
            <li><?php echo $success; ?></li>
            <?php }; ?>
        </ul>
<?php }; */
    ?>

    