<?php
function portfolio_settings_sanitize($input)
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


function portfolio_settings_page()
{
    ?>
    <div class="wrap">
        <h2>Portfolio Section Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields('landing_settings'); ?>
            <?php $options = get_option('portfolio_settings');?>

            <div id="titlediv">
                <div id="titlewrap">
                    <h3><label for="title">Title</label></h3>
                    <input type="text" name="portfolio_settings[title]" size="20"
                           value="<?php echo esc_attr(isset($options['title']) ? $options['title'] : 'Портфолио'); ?>"
                           id="title"/>
                </div>
            </div>

            <div id="wrap-descr">
                <h3><label for="description">Description</label></h3>
                <input type="text" name="portfolio_settings[description]" size="50"
                       value="<?php echo esc_attr(isset($options['description']) ? $options['description'] : 'Мои последние работы'); ?>"
                       id="description"/>
            </div>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>