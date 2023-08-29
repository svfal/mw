 <?php get_header(); ?>
 	<div id="content" >  
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">	  	
					<h1>
                		<span id=<? echo "title".get_the_ID()?>> 
     							<? the_title(); ?>   
                                
                        </span>  
     				</h1>
						
    						<? the_content(); ?>   
						
     
    			</div>
			</div>
		</div>
     
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
