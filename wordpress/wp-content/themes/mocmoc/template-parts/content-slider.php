<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <?php
            $args = array(
                'order_by' => 'date',
                'order' => 'DESC',
                'category_name' => 'lifestyle',
                'offset' => 0,
                'posts_per_page' => 1
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $categories = get_the_category();
                    echo '<div class="left-side">
                    <div class="masonry-box post-media">
                        <img src="' . get_the_post_thumbnail_url() . '" alt=""
                            class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="' . get_category_link($categories[1]->term_id) . '" title="">' . $categories[1]->name  . '</a></span>
                                        <h4><a href="' . get_the_permalink() . '" title="">' . get_the_title() . '</a></h4>
                                        <small><a href="single.html" title="">' . get_the_date('j F, Y') . '</a></small>
                                        <small><a href="blog-author.html" title="">by ' . get_the_author() . '</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->
                    </div><!-- end left-side -->';
                }
            } else {
            }
            wp_reset_query();
            ?>
            <div class="center-side">
                <?php
                $args = array(
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'category_name' => 'du-lich',
                    'offset' => 0,
                    'posts_per_page' => 1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $categories = get_the_category();
                        echo '<div class="masonry-box post-media">
                                <img src="' . get_the_post_thumbnail_url() . '"
                                    alt="" class="img-fluid">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-green"><a href="' . get_category_link($categories[0]->term_id) . '" title="">' . $categories[0]->name  . '</a></span>
                                            <h4><a href="' . get_post_permalink(get_the_ID()) . '" title="">' . get_the_title() . '</a></h4>
                                            <small><a href="single.html" title="">' . get_the_date('j F, Y') . '</a></small>
                                            <small><a href="blog-author.html" title="">by ' . get_the_author() . '</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div><!-- end post-media -->';
                    }
                } else {
                }
                wp_reset_query();
                ?>
                <?php
                $args = array(
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'category_name' => 'du-lich',
                    'offset' => 1,
                    'posts_per_page' => 1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $categories = get_the_category();
                        echo '<div class="masonry-box small-box post-media">
                    <img src="' . get_the_post_thumbnail_url() . '" alt=""
                            class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-green"><a href="' . get_category_link($categories[0]->term_id) . '" title="">' . $categories[0]->name  . '</a></span>
                                        <h4><a href="' . get_post_permalink(get_the_ID()) . '" title="">' . get_the_title() . '</a></h4>
                                    </div><!-- end meta -->
                                </div><!-- end shadow-desc -->
                            </div><!-- end shadow -->
                        </div><!-- end post-media -->';
                    }
                } else {
                }
                wp_reset_query();
                ?>
                <?php
                $args = array(
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'category_name' => 'du-lich',
                    'offset' => 2,
                    'posts_per_page' => 1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $categories = get_the_category();
                        echo '<div class="masonry-box small-box post-media">
                        <img src="' . get_the_post_thumbnail_url() . '" alt=""
                class="img-fluid">
                <div class="shadoweffect">
                    <div class="shadow-desc">
                        <div class="blog-meta">
                        <span class="bg-green"><a href="' . get_category_link($categories[0]->term_id) . '" title="">' . $categories[0]->name  . '</a></span>
                        <h4><a href="' . get_post_permalink(get_the_ID()) . '" title="">' . get_the_title() . '</a></h4>
                        </div><!-- end meta -->
                    </div><!-- end shadow-desc -->
                </div><!-- end shadow -->
            </div><!-- end post-media -->
        </div><!-- end left-side -->
        <div class="right-side hidden-md-down">';
                    }
                } else {
                }
                wp_reset_query();
                ?>
                <?php
                $args = array(
                    'order_by' => 'date',
                    'order' => 'DESC',
                    'category_name' => 'lifestyle',
                    'offset' => 1,
                    'posts_per_page' => 1
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $categories = get_the_category();
                        echo '<div class="masonry-box post-media">
                    <img src="' . get_the_post_thumbnail_url() . '" alt=""
                class="img-fluid">
                <div class="shadoweffect">
                    <div class="shadow-desc">
                        <div class="blog-meta">
                            <span class="bg-aqua"><a href="' . get_category_link($categories[1]->term_id) . '"
                                    title="">' . $categories[1]->name . '</a></span>
                            <h4><a href="' . get_post_permalink(get_the_ID()) . '" title="">' . get_the_title() . '</a>
                            </h4>
                            <small><a href="single.html" title="">' . get_the_date('j F, Y') . '</a></small>
                            <small><a href="blog-author.html" title="">by ' . get_the_author() . '</a></small>
                        </div><!-- end meta -->
                    </div><!-- end shadow-desc -->
                </div><!-- end shadow -->
            </div><!-- end post-media -->';
                    }
                } else {
                }
                wp_reset_query();
                ?>
            </div><!-- end right-side -->
        </div><!-- end masonry -->
    </div>
</section>