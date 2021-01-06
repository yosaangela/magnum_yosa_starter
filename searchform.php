<form action="<?php echo home_url('/'); ?>" role="search" method="GET" id="searchform" class="searchform search-bar mb-4 p-2 pl-3 d-flex justify-content-between">
    <input class="py-3 px-3 border-0" type="text" name="s" id="search" placeholder="Zoek berichten">
    <button class="py-3 px-5 button-primary" type="submit"><?php echo esc_html('Zoek', 'diametheus'); ?></button>
</form>