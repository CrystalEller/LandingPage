<?php

function about_settings_sanitize($input)
{
    if (!empty($input)) {
        foreach ($input as &$inp) {
            if (isset($inp['title'])) {
                $inp['title'] = wp_filter_nohtml_kses($inp['title']);
            }

            if (isset($inp['description'])) {
                $inp['description'] = wp_filter_nohtml_kses($inp['description']);
            }

            if (isset($inp['user_description'])) {
                $inp['user_description'] = wp_filter_nohtml_kses($inp['description']);
            }
        }
    }
    return $input;
}


function about_settings_page()
{
    ?>
    <div class="wrap">
        <h2>About Section Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields('landing_settings'); ?>
            <?php $options = get_option('about_settings');?>

            <div id="titlediv">
                <div id="titlewrap">
                    <h3><label for="title">Title</label></h3>
                    <input type="text" name="about_settings[title]" size="20"
                           value="<?php echo esc_attr(isset($options['title']) ? $options['title'] : 'Oбо мне'); ?>"
                           id="title"/>
                </div>
            </div>

            <div id="wrap-descr">
                <h3><label for="description">Description</label></h3>
                <input type="text" name="about_settings[description]" size="50"
                       value="<?php echo esc_attr(isset($options['description']) ? $options['description'] : 'Познакомимся ближе'); ?>"
                       id="description"/>
            </div>

            <h3><label for="user_description">User Description</label></h3>

            <?php

            $user_description = isset($options['user_description']) ? $options['user_description'] : '<p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                            является
                            стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный
                            печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для
                            распечатки
                            образцов</p>

                        <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                            является
                            стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный
                            печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для
                            распечатки
                            образцов</p>';

            wp_editor($user_description, 'user_description', $settings = array(
                'media_buttons' => false,
                'textarea_rows' => 10,
                'textarea_name' => 'about_settings[user_description]',
            )); ?>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>