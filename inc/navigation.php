<div class="header__logo">
        <?php 
        if ( has_custom_logo() ) :
            the_custom_logo();
        else : ?>
            <a href="/">
                <h3>Dylan Luc</h3>
            </a>
        <?php endif ?>
</div>

<div class="">
    <nav class="">
            <?php 
                wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class' => 'navigation'
                ));
            ?>
    </nav>
</div>
