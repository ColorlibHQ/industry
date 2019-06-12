<header id="header" id="home">
<div class="header-top">
    <div class="container">
        <div class="row">
            <?php
            $socialMenu = 0;
            //
            if( has_nav_menu( 'social-menu' ) ) {
                $socialMenu = 1;
                echo '<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">';
                    $args = array(
                        'theme_location' => 'social-menu',
                        'container'      => '',
                        'depth'          => 1,
                        'menu_class'     => '',
                        'fallback_cb'    => 'industry_social_navwalker::fallback',
                        'walker'         => new industry_social_navwalker(),
                    );  
                    wp_nav_menu( $args );
                echo '</div>';
            }
            
            //
            $phone = industry_opt( 'industry_header_phone', esc_html( '+880 123 12 658 439' ) );
            $email = industry_opt( 'industry_header_left_text', esc_attr( 'info@example.com' ) );

            if( $phone || $email ) {

                $attrNumber = str_replace(' ', '', $phone);

                $textalign = $socialMenu ? ' header-top-right' : '';

                ?>
                <div class="col-lg-6 col-sm-6 col-8 no-padding<?php echo esc_attr( $textalign ); ?>">
                    <a href="tel:<?php echo esc_attr( $attrNumber ) ?>"><?php echo esc_html( $phone ); ?></a>
                    <a href="mailto:<?php echo esc_html( $email ) ?>"><?php echo esc_html( $email ) ?></a>              
                </div>
                <?php
            }
            ?>
        </div>                              
    </div>
</div>
<div class="container main-menu">
    <div class="row align-items-center justify-content-between d-flex">
    <?php 
    // Header Logo
    echo industry_theme_logo();
    ?>                        
      <nav id="nav-menu-container">
        <?php 
        //
        if( has_nav_menu( 'primary-menu' ) ) {
            $args = array(
                'theme_location' => 'primary-menu',
                'container'      => '',
                'depth'          => 3,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'industry_bootstrap_navwalker::fallback',
                'walker'         => new industry_bootstrap_navwalker(),
            );  
            wp_nav_menu( $args );
        }
        ?>
      </nav><!-- #nav-menu-container -->                    
    </div>
</div>
</header><!-- #header -->
