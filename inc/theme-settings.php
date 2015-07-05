<?php

require_once 'theme-settings/about-section-settings.php';
require_once 'theme-settings/resume-section-settings.php';
require_once 'theme-settings/portfolio-section-settings.php';
require_once 'theme-settings/contacts-section-settings.php';


function theme_settings_page($active_tab = '')
{
    ?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">

        <div id="icon-themes" class="icon32"></div>
        <h2>Theme Settings</h2>
        <?php settings_errors(); ?>

        <?php if (isset($_GET['tab'])) {
            $active_tab = $_GET['tab'];
        } else {
            $active_tab = 'resume_settings';
        } ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=theme_settings&tab=resume_settings"
               class="nav-tab <?php echo $active_tab == 'resume_settings' ? 'nav-tab-active' : ''; ?>">Resume Settings</a>
            <a href="?page=theme_settings&tab=about_settings"
               class="nav-tab <?php echo $active_tab == 'about_settings' ? 'nav-tab-active' : ''; ?>">About Settings</a>
            <a href="?page=theme_settings&tab=portfolio_settings"
               class="nav-tab <?php echo $active_tab == 'portfolio_settings' ? 'nav-tab-active' : ''; ?>">Portfolio Settings</a>
            <a href="?page=theme_settings&tab=contacts_settings"
               class="nav-tab <?php echo $active_tab == 'contacts_settings' ? 'nav-tab-active' : ''; ?>">Contacts Settings</a>
        </h2>

        <?php

        if ($active_tab == 'about_settings') {
            about_settings_page();
        } else if ($active_tab == 'resume_settings') {
            resume_settings_page();
        } else if ($active_tab == 'portfolio_settings') {
            portfolio_settings_page();
        } else if ($active_tab == 'contacts_settings') {
            contacts_settings_page();
        }

        ?>

    </div><!-- /.wrap -->
<?php
}

add_action('admin_menu', 'about_add_admin_menu');

function about_add_admin_menu()
{
    add_theme_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', 'theme_settings_page');
}


add_action('admin_init', 'initialize_theme_options');

function initialize_theme_options()
{
    register_setting('landing_settings', 'about_settings', 'about_settings_sanitize');
    register_setting('landing_settings', 'resume_settings', 'resume_settings_sanitize');
    register_setting('landing_settings', 'portfolio_settings', 'portfolio_settings_sanitize');
    register_setting('landing_settings', 'contacts_settings', 'contacts_settings_sanitize');
}

?>