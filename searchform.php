<form class="search" role="search" method="get" id="searchform" action="<?php echo site_url()?>" >
    <fieldset>
    	<div class="ale-search-form">
	        <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type here...', 'elli')?>" />
	        <button type="submit" id="searchsubmit" class="headerfont" value="<?php esc_attr_e('Search', 'elli')?>"><span class="icon_search"></span></button>
	    </div>
    </fieldset>
</form>