<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
      <h4 class="entry-title"><?php the_title() ?></h4>
    </header>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

</article>
