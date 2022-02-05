<?php

// get settings contents from settings.json
// convert json to json text to array to easy access it
$settings = json_decode(file_get_contents('settings.json'), true);

?>
<form action="save_settings.php" method="post">
    <?php
    foreach ($settings as $key => $value) {
        ?>
        <div style="margin-bottom: 10px;">
            <strong>
                <?php echo ucfirst(str_replace('_', ' ', $key));?>: 
            </strong>
            <input
            type="text"
            name="<?php echo $key;?>"
            value="<?php echo $value === false ? "false" : $value;?>">
        </div>
        <?php
    }
    ?>
    <button type="submit">Submit</button>
</form>
<?php