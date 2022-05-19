 <?php get_header(); ?>
 <div id="content" >  
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 mt-1">	  	
     				    <h1> 
     						<? the_title(); ?>     
     					</h1>
    					<? the_content(); ?>    
     
    			</div>
			</div>
		</div>
     <?php get_sidebar(); ?>
 </div>

 <?php get_footer(); ?>