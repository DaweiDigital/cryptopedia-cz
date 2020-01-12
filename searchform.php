<form method="get" id="searchform" class="search-form" action="<?php echo esc_url(home_url('/')); ?>" role="search">
    <div class="form-group">
        <input type="text" class="input input-search" name="s" id="s" placeholder="<?php esc_attr_e('Search &hellip;', 'understrap'); ?>" />
        <button type="submit" class="btn btn-primary btn-search" name="submit" id="searchsubmit"/>
        <?php esc_attr_e('Search', 'understrap'); ?>
        </button>
    </div>
</form>
