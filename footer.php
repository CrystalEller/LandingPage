<footer class="main_footer bg_dark">
    <div class="container">
        <div class="col-md-12">
            &copy; <?php echo date('Y')?> <?php echo get_theme_mod('username', 'EL Maxo') ?>
            <?php
            wp_nav_menu(array(
                'menu'            => 'social',
                'container'       => 'div',
                'container_class' => 'social_wrap',
                'echo'            => true,
                'items_wrap'      => '<ul>%3$s</ul>',
                'walker' => new Social_Walker()
            ));
            ?>
        </div>
    </div>
</footer>

<div class="hidden"></div>

<?php wp_footer();?>
</body>
</html>