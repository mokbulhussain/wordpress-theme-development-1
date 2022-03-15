
<div class="header page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline"><?php bloginfo("description");?></h3>
                <h1 class="align-self-center display-1 text-center heading">
                	<a href="<?php site_url();?>"><?php bloginfo("name");?></a>
                	</h1>
            </div>
            <div class="col-lg-12">
                <?php 
                wp_nav_menu( array(
                    'theme_location'  => 'topmenu',
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'nav nav-menu justify-content-center',
                    'menu_id'         => '',
                   
                ) );
                ?>
            </div>
        </div>
    </div>
</div>