<?php

function resume_section_admin_styles()
{
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css');
    wp_enqueue_style('resume-section', get_template_directory_uri() . '/css/theme-settings/resume.css');

    wp_enqueue_script('resume-section', get_template_directory_uri() . '/js/theme-settings/resume.js', array('jquery'), '', true);
}

function resume_settings_sanitize($input)
{
    if (!empty($input)) {
        foreach ($input as $key => &$val) {

            switch ($key) {
                case 'title':
                case 'description':
                case 'work_section_name':
                case 'stud_section_name':

                    $new_input[$key] = sanitize_text_field($val);
                    break;

                case 'work_sub_sections':
                case 'stud_sub_sections':

                    foreach ($val as $section_num => $section_vals) {
                        $val[$section_num] = array_map('sanitize_text_field', $val[$section_num]);
                    }
                    break;

            }
        }
    }

    return $input;
}

function resume_settings_page()
{
    resume_section_admin_styles();
    ?>
    <div class="wrap container-fluid">
        <h2>Resume Section Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields('landing_settings'); ?>
            <?php $options = get_option('resume_settings'); ?>

            <div class="row main-info">
                <div id="titlediv">
                    <div id="titlewrap">
                        <h3><label for="title">Title</label></h3>
                        <input type="text" name="resume_settings[title]"
                               value="<?php echo esc_attr(isset($options['title']) ? $options['title'] : 'Резюме'); ?>"
                               id="title"/>
                    </div>
                </div>

                <div class="descr">
                    <h3><label for="description">Description</label></h3>
                    <input type="text" name="resume_settings[description]"
                           value="<?php echo esc_attr(isset($options['description']) ? $options['description'] : 'Мои знания и достижения'); ?>"
                           id="description"/>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 sub-section work">

                    <div class="row sub-section-name">
                        <div class="col-lg-8 col-lg-push-2">
                            <input type="text" name="resume_settings[work_section_name]"
                                   value="<?php echo esc_attr(isset($options['work_section_name']) ? $options['work_section_name'] : 'Работа'); ?>"/>
                        </div>
                    </div>

                    <?php if (!empty($options['work_sub_sections'])): ?>
                        <?php foreach ($options['work_sub_sections'] as $key => $val): ?>
                            <div class="chapter" data-id="<?php echo $key; ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Years</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text"
                                               name="resume_settings[work_sub_sections][<?php echo $key; ?>][years]"
                                               value="<?php echo esc_attr($val['years']); ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Company/University</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text"
                                               name="resume_settings[work_sub_sections][<?php echo $key; ?>][organization]"
                                               value="<?php echo esc_attr($val['organization']); ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="col-lg-8">
                            <textarea
                                name="resume_settings[work_sub_sections][<?php echo $key; ?>][description]"
                                rows="8"><?php echo esc_textarea($val['description']); ?></textarea>
                                    </div>
                                </div>

                                <div class="row actions">
                                    <div class="col-lg-12 textright">
                                        <div class="remove-chapter">
                                            <a class="button-secondary" href="#" title="Remove Chapter">Remove
                                                Chapter</a>
                                        </div>
                                        <div class="add-new-chapter">
                                            <a class="button-secondary" href="#" title="Add New Chapter">Add New
                                                Chapter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php ?>
                        <div class="chapter" data-id="0">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Years</h4>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="resume_settings[work_sub_sections][0][years]"
                                           value=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Company/University</h4>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text"
                                           name="resume_settings[work_sub_sections][0][organization]"
                                           value=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Description</h4>
                                </div>
                                <div class="col-lg-8">
                        <textarea
                            name="resume_settings[work_sub_sections][0][description]"
                            rows="8"></textarea>
                                </div>
                            </div>

                            <div class="row actions">
                                <div class="col-lg-12 textright">
                                    <div class="remove-chapter">
                                        <a class="button-secondary" href="#" title="Remove Chapter">Remove
                                            Chapter</a>
                                    </div>
                                    <div class="add-new-chapter">
                                        <a class="button-secondary" href="#" title="Add New Chapter">Add New
                                            Chapter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-md-6 sub-section stud">
                    <div class="row sub-section-name">
                        <div class="col-lg-8 col-lg-push-2">
                            <input type="text" name="resume_settings[stud_section_name]"
                                   value="<?php echo esc_attr(isset($options['stud_section_name']) ? $options['stud_section_name'] : 'Учеба'); ?>"/>
                        </div>
                    </div>

                    <?php if (!empty($options['stud_sub_sections'])): ?>
                        <?php foreach ($options['stud_sub_sections'] as $key => $val): ?>
                            <div class="chapter" data-id="<?php echo $key; ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Years</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text"
                                               name="resume_settings[stud_sub_sections][<?php echo $key; ?>][years]"
                                               value="<?php echo esc_attr($val['years']); ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Company/University</h4>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text"
                                               name="resume_settings[stud_sub_sections][<?php echo $key; ?>][organization]"
                                               value="<?php echo esc_attr($val['organization']); ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="col-lg-8">
                            <textarea name="resume_settings[stud_sub_sections][<?php echo $key; ?>][description]"
                                      rows="8"><?php echo esc_textarea($val['description']); ?></textarea>
                                    </div>
                                </div>

                                <div class="row actions">
                                    <div class="col-lg-12 textright">
                                        <div class="remove-chapter">
                                            <a class="button-secondary" href="#" title="Remove Chapter">Remove
                                                Chapter</a>
                                        </div>
                                        <div class="add-new-chapter">
                                            <a class="button-secondary" href="#" title="Add New Chapter">Add New
                                                Chapter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php ?>
                        <div class="chapter" data-id="0">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Years</h4>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="resume_settings[stud_sub_sections][0][years]" value=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Company/University</h4>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="resume_settings[stud_sub_sections][0][organization]"
                                           value=""/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <h4>Description</h4>
                                </div>
                                <div class="col-lg-8">
                                    <textarea name="resume_settings[stud_sub_sections][0][description]"
                                              rows="8"></textarea>
                                </div>
                            </div>

                            <div class="row actions">
                                <div class="col-lg-12 textright">
                                    <div class="remove-chapter">
                                        <a class="button-secondary" href="#" title="Remove Chapter">Remove Chapter</a>
                                    </div>
                                    <div class="add-new-chapter">
                                        <a class="button-secondary" href="#" title="Add New Chapter">Add New Chapter</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row">
                <?php submit_button(); ?>
            </div>
        </form>
    </div>
<?php } ?>