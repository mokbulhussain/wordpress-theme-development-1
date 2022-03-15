<?php get_header();?>
<body <?php body_class();?>>
<?php get_template_part("hero");?>
<div class="posts">
    <?php 
    if(have_posts()):
        while(have_posts()):the_post();
        ?>


    <div class="post <?php post_class();?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
               <div class="row">
                <div class="col-md-12">
                    <h2 class="post-title">
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h2>
                </div>
              </div>
              <div class="row">

                  <div class="col-md-12">
                      <p>
                          <strong><?php the_author();?></strong><br/>
                          <?php echo get_the_date();?>
                      </p>
                      <?php 
                      echo get_the_tag_list('<ul class="list-unstyled"><li>','<li></li>','</li></ul>');
                      ?>
                     
                  </div>
                  <div class="col-md-12">
                      <p>
                        <?php 
                        if(has_post_thumbnail()){

                           the_post_thumbnail('large',['class'=>'img-fluid']);
                      }
                    ?>
                      </p>


                     <?php 
                     the_content();
                     next_post_link();
                     echo "<br />";
                     previous_post_link();
                      
                     ?>

                     <?php if(comments_open()):?>

                     <div class="comment">
                      <?php comments_template();?>
                     </div>
                     <?php endif;?>

                  
                  </div>
              </div>
            </div>
              <div class="col-lg-4">
                <?php 

                if(is_active_sidebar("sidebar-1")){

                dynamic_sidebar("sidebar-1");
                  }
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

   
</div>
<?php get_footer();?>