<?php get_header(); ?>

    <section id="about" class="s_about bg_light">
        <div class="section_header">
            <?php $about = get_option('about_settings'); ?>
            <h2>
                <?php if (isset($about['title'])): ?>
                    <?php echo $about['title']; ?>
                <?php else: ?>
                    Обо мне
                <?php endif; ?>
            </h2>

            <div class="s_descr_wrap">
                <div class="s_descr">
                    <?php if (isset($about['description'])): ?>
                        <?php echo $about['description']; ?>
                    <?php else: ?>
                        Познакомимся ближе
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-push-4 animation_1">
                        <h3>Фото</h3>

                        <div class="person">
                            <a href="<?php echo get_theme_mod('photo', get_template_directory_uri() . '/img/photo.jpg'); ?>"
                               class="popup">
                                <img
                                    src="<?php echo get_theme_mod('photo', get_template_directory_uri() . '/img/photo.jpg'); ?>"
                                    alt="Alt">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-4 animation_2">
                        <h3>Немного о себе</h3>
                        <?php if (isset($about['user_description'])): ?>
                            <?php echo wpautop($about['user_description']); ?>
                        <?php else: ?>
                            <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                                является
                                стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий
                                безымянный
                                печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для
                                распечатки
                                образцов</p>
                            <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum
                                является
                                стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий
                                безымянный
                                печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для
                                распечатки
                                образцов</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 animation_3 personal_last_block">
                        <h3>Персональная иформация</h3>

                        <h2 class="personal_header"><?php echo get_theme_mod('username', 'EL Maxo') ?></h2>
                        <ul>
                            <li><span
                                    class="prof_description"><?php echo nl2br(get_theme_mod('prof_description', 'Проффестональное создание сайтов: разработка дизайна, верстка, посадка на CMS WOrdPress')); ?></span>
                            </li>
                            <li>День рождения: <span class="birthday"><?php echo get_theme_mod('birthday'); ?></span>
                            </li>
                            <li>Номер телефона: <span
                                    class="telephone"><?php echo get_theme_mod('telephone', '+9999999999'); ?></span>
                            </li>
                            <li>E-mail <span class="email"><a
                                        href="mailto:<?php echo get_theme_mod('email', 'you@mail.ru'); ?>">
                                        <?php echo get_theme_mod('email', 'you@mail.ru'); ?>
                                    </a></span>
                            </li>
                            <li>Веб-сайт: <span class="site"><a
                                        href="//<?php echo get_theme_mod('site', 'webdesign-master.ru'); ?>"
                                        target="_blank">
                                        <?php echo get_theme_mod('site', 'webdesign-master.ru'); ?>
                                    </a></span>
                            </li>
                        </ul>
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'social',
                            'container' => 'div',
                            'container_class' => 'social_wrap',
                            'echo' => true,
                            'items_wrap' => '<ul>%3$s</ul>',
                            'walker' => new Social_Walker()
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="resume" class="s_resume">
        <div class="section_header">
            <?php $options = get_option('resume_settings'); ?>
            <h2><?php echo esc_html(isset($options['title']) ? $options['title'] : 'Резюме'); ?></h2>

            <div class="s_descr_wrap">
                <div
                    class="s_descr"><?php echo esc_attr(isset($options['description']) ? $options['description'] : 'Мои знания и достижения'); ?></div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="resume_container">
                        <div class="col-md-6 col-sm-6 left">
                            <?php $resume_options = get_option('resume_settings'); ?>
                            <h3><?php echo esc_html(isset($options['work_section_name']) ? $options['work_section_name'] : 'Работа'); ?></h3>

                            <div class="resume_icon">
                                <i class="icon-basic-case"></i>
                            </div>
                            <?php if (!empty($options['work_sub_sections'])): ?>
                                <?php foreach ($options['work_sub_sections'] as $key => $val): ?>
                                    <div class="resume_item">
                                        <div class="year"><?php echo esc_html($val['years']); ?></div>
                                        <div
                                            class="resume_description"><?php echo esc_html($val['organization']); ?></div>
                                        <p><?php echo nl2br(esc_html($val['description'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 col-sm-6 right">
                            <h3><?php echo esc_html(isset($options['stud_section_name']) ? $options['stud_section_name'] : 'Учеба'); ?></h3>

                            <div class="resume_icon">
                                <i class="icon-basic-book-pen"></i>
                            </div>
                            <?php if (!empty($options['stud_sub_sections'])): ?>
                                <?php foreach ($options['stud_sub_sections'] as $key => $val): ?>
                                    <div class="resume_item">
                                        <div class="year"><?php echo esc_html($val['years']); ?></div>
                                        <div
                                            class="resume_description"><?php echo esc_html($val['organization']); ?></div>
                                        <p><?php echo nl2br(esc_html($val['description'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio" class="s_portfolio bg_dark">
        <div class="section_header">
            <h2>Портфолио</h2>

            <div class="s_descr_wrap">
                <div class="s_descr">Мои последние работы</div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">


                    <div class="filter_div controls">

                        <?php $terms = get_terms('portfolio', array(
                            'fields' => 'id=>name',
                        )); ?>

                        <ul>
                            <li class="filter active" data-filter="all">Все работы</li>
                            <?php foreach ($terms as $id => $name): ?>
                                <li class="filter" data-filter=".category-<?php echo $id; ?>"><?php echo $name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>


                    <div id="portfolio_grid">
                        <?php
                        $works = get_posts(array(
                            'post_type' => 'work',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'portfolio',
                                    'field' => 'term_id',
                                    'terms' => array_keys($terms)
                                ),
                            )));
                        ?>
                        <?php foreach ($works as $work): ?>
                            <div class="mix col-md-3 portfolio_item category-<?php echo wp_get_post_terms($work->ID, 'portfolio')[0]->term_id; ?>">
                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($work->ID) );?>
                                <img src="<?php echo $url; ?>" alt="Alt" />

                                <div class="port_item_cont">
                                    <h3><?php echo $work->post_title; ?></h3>

                                    <p>Описание работы</p>
                                    <a href="#work-<?php echo $work->ID; ?>" class="popup_content">Посмотреть</a>

                                    <div class="hidden">
                                        <div class="port_descr" id="work-<?php echo $work->ID; ?>">
                                            <h3><?php echo $work->post_title; ?></h3>

                                            <p><?php echo $work->post_content; ?></p>
                                            <img src="<?php echo $url; ?>" alt="Alt" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contacts" class="s_contacts bg_light">
        <div class="section_header">
            <h2>Контакты</h2>

            <div class="s_descr_wrap">
                <div class="s_descr">Оставьте ваши сообщения</div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-geolocalize-05"></div>
                            <h3>Адресс:</h3>

                            <p class="address"><?php echo get_theme_mod('address', 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.'); ?></p>
                        </div>
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-smartphone"></div>
                            <h3>Телефон:</h3>

                            <p class="telephone"><?php echo get_theme_mod('telephone', '+9999999999'); ?></p>
                        </div>
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-webpage-img-txt"></div>
                            <h3>Веб-сайт:</h3>

                            <p class="site"><a
                                    href="//<?php echo get_theme_mod('site', 'webdesign-master.ru'); ?>"><?php echo get_theme_mod('site', 'webdesign-master.ru'); ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="main_form"
                              action="//formspree.io/<?php echo get_theme_mod('email', 'you@mail.ru'); ?>"
                              method="POST" novalidate target="_blank">
                            <label class="form-group">
                                <span class="color_element">*</span> Ваше имя
                                <input type="text" name="name"
                                       placeholder="Ваше имя"
                                       data-validation-required-message="Вы не ввели имя" required>
                                <span class="help-block text_danger"></span>
                            </label>
                            <label class="form-group">
                                <span class="color_element">*</span> Ваш Email:
                                <input type="email" name="email" placeholder="Ваш Email"
                                       data-validation-email-message="Не корректный email"
                                       data-validation-required-message="Вы не ввели email">
                                <span class="help-block text_danger"></span>
                            </label>
                            <label class="form-group">
                                <span class="color_element">*</span> Ваше сообщение:
                                <textarea name="message"
                                          data-validation-required-message="Вы не ввели сообщение"></textarea>
                                <span class="help-block text_danger"></span>
                            </label>
                            <button>Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>