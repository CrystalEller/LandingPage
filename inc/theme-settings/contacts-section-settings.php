<?php
function contacts_settings_sanitize($input)
{
    if (!empty($input)) {
        foreach ($input as &$inp) {
            if (isset($inp['title'])) {
                $inp['title'] = wp_filter_nohtml_kses($inp['title']);
            }

            if (isset($inp['description'])) {
                $inp['description'] = wp_filter_nohtml_kses($inp['description']);
            }
        }
    }
    return $input;
}


function contacts_settings_page()
{
    ?>
    <div class="wrap">
        <h2>Contacts Section Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields('landing_settings'); ?>
            <?php $options = get_option('contacts_settings');?>

            <div id="titlediv">
                <div id="titlewrap">
                    <h3><label for="title">Title</label></h3>
                    <input type="text" name="contacts_settings[title]" size="20"
                           value="<?php echo esc_attr(isset($options['title']) ? $options['title'] : 'Контакты'); ?>"
                           id="title"/>
                </div>
            </div>

            <div id="wrap-descr">
                <h3><label for="description">Description</label></h3>
                <input type="text" name="contacts_settings[description]" size="50"
                       value="<?php echo esc_attr(isset($options['description']) ? $options['description'] : 'Оставьте ваши сообщения'); ?>"
                       id="description"/>
            </div>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>