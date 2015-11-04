<form role="search" method="get" class="search_form" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="search_form--field" placeholder="Search …" value="<?php echo get_search_query() ?>" name="s">
	<button type="submit" class="search_form--button"><i class="fa fa-search"></i></button>
</form>