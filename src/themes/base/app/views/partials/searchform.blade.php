<?php
/**
 * Search form
 */
 ?>

<form role="search" method="get" class="search-form" action="{{ home_url( '/' ) }}">

	<div class="form-group">

 	<label class="screen-reader-text" for="field_search_form">{{ _x( 'Search for:', 'label' ) }}</label>


    <div class="input-group">

          <input type="search" id="field_search_form" class="search-field form-control"
                    placeholder="{{ esc_attr_x( 'Search …', 'placeholder' ) }}"
                    value="{{ get_search_query() }}"
                    name="s" title="{{ esc_attr_x( 'Search for:', 'label' ) }}">

          <span class="input-group-btn">

            <input type="submit" class="search-submit btn btn-default"
            value="{{ esc_attr_x( 'GO', 'submit button' ) }}">

          </span>

    </div><!-- /input-group -->

    </div>


</form>