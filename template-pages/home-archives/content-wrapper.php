<section id="content">
    <div class="container">
        <div class="row">
            <!-- Posts card -->
            <div class="col-xl-9 mb-5 mb-xl-0">
                <?php include get_stylesheet_directory() . '/template-pages/home-archives/content/card-posts.php'; ?> 
            </div>

            <!-- Sidebar -->
            <div class="col-xl-3">
                <div class="row">
                    <div class="col-12">
                        <?php get_search_form(); ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?> 
                    </div>
                    <div class="col-md-6 col-xl-12">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>