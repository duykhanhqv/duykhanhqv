<form class="form-inline" id="searchform" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" class="form-control" placeholder="What you are looking for?" name="s"
        value="<?php echo get_search_query(); ?>">
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
</form>