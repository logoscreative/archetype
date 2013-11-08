<?php
/**
 * The template for rendering the search form.
 *
 * @package Archetype
 * @version	1.0
 * @since 	1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo apply_filters( 'archetype_search_action', home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="search" class="search-field form-control" placeholder="Search" value="" name="s" title="Search for:" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default search-submit"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>
