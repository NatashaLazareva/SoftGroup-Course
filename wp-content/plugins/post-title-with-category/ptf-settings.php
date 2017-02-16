<?php if (isset($_POST['awesome_text'])) {
    update_option('awesome_text', $_POST['awesome_text']);
    echo '<div class="updated">Настройки сохранены</div>';
}
?>
<h1>Настройки плагина Post Title Formatting</h1>

<form method="POST">
    <label for="awesome_text">Разделитель категории</label>
    <input type="text" name="awesome_text" id="awesome_text" value="<?php echo get_option('awesome_text'); ?>" required>-->
    <input type="submit" value="Save" class="button button-primary button-large">
</form>