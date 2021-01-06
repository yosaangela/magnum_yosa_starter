<section id="title">
    <div class="container">
        <div class="row align-items-center align-items-md-end justify-content-center">
            <div class="col-lg-7">
                <h1 class="text-left text-sm-center"><?php get_field('title_sec1', 'options') ? _e(get_field('title_sec1', 'options')) : _e(get_the_title()); ?> </h1>
            </div>
        </div>
    </div>
</section>