<?php get_header();?>
<body <?php body_class();?>>

<?php 
get_template_part("/template-parts/common/hero");
?>
<div class="posts">
    <?php 
    if(have_posts()):
        while(have_posts()):the_post();
        ?>


    <div class="post <?php post_class();?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title">
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>                                                                                                                              
                        <strong><?php the_author();?></strong><br/>
                        <?php echo get_the_date();?>
                    </p>
                    <?php 
                    echo get_the_tag_list('<ul class="list-unstyled"><li>','<li></li>','</li></ul>');
                    ?>
                   
                </div>
                <div class="col-md-8">
                    <p>
                      <?php 
                      if(has_post_thumbnail()){

                            $thumbnail_url=get_the_post_thumbnail_url(null,"large");

                            printf('<a href="%s" data-featherlight="image">',$thumbnail_url);

                                the_post_thumbnail("large",array("class"=>"img-fluid"));
                                
                            echo '</a>';

                         

                    }
                  ?>
                    </p>


                   <?php 
                 the_excerpt();
                   ?>

                
                </div>
            </div>

        </div>
    </div>

     <?php 
     endwhile;
     else:_e("Sorry have no post","wdev1");
     endif;
     ?>

     <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="pagination">
                    <?php 
                    the_posts_pagination(array(
                    "screen_reader_text"=>" ",
                    "Prev_text"=>"New Post",
                    "Next_text" => "Old Post"

                    ));
                    ?>
                </div>
            </div>
        </div>
     </div>
</div>
<?php get_footer();?>