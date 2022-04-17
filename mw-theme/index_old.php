 <?php get_header(); ?>
 <div id="main" class="row">
     <!--div id="content" class="col-lg-8 col-sm-8 col-md-8 col-xs-12"-->
      
     <div id="content" class="col-lg-9 col-sm-9 col-md-9 col-xs-9">    
           
         
         
         
        <!-- 
         
         <div class="row">
           
             <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <!--div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"-->
                         <h1><?php the_title(); ?></h1>
                         <h4>Posted on <?php the_time('F jS, Y') ?></h4>
                         <p><?php the_content(__('(more...)')); ?></p>
                     <!--/div-->
                 <?php endwhile;
                else : ?>
                 <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
             <?php endif; ?>
         </div>
         
     -->
     </div>
     
     <?php get_sidebar(); ?>
 </div>

 <?php get_footer(); ?>