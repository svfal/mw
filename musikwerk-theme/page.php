 <?php get_header(); ?>
 <div id="main" class="row">
     
         
 	<div id="content" class="col-lg-9 col-sm-9 col-md-9 col-xs-9">  
    	<h1>   
     		<? the_title(); ?>     
     	</h1>
    	<? the_content(); ?>    
     
    </div>
     
     <?php get_sidebar(); ?>
 </div>

 <?php get_footer(); ?>