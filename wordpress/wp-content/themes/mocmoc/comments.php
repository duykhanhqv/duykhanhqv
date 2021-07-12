<hr class="invis1">
<div class="custombox clearfix">
    <h4 class="small-title"><?php if (!have_comments()) {
                                echo  "Leave a comment";
                            } else {
                                echo get_comments_number();
                            } ?> </h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <?php wp_list_comments(array(
                    'avatar_size' => 80,
                    'style' => 'div'
                ))  ?>
                <div class="media last-child">
                    <a class="media-left" href="#">
                        <img src="<?= get_template_directory_uri() ?>/assets/upload/author_02.jpg" alt=""
                            class="rounded-circle">
                    </a>
                    <div class="media-body">

                        <h4 class="media-heading user_name">Marie Johnson <small>5 days
                                ago</small></h4>
                        <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up
                            artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts
                            fixie consequat flexitarian four loko tempor duis single-origin
                            coffee. Banksy, elit small.</p>

                        <a href="#" class="btn btn-primary btn-sm">Reply</a>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end custom-box -->
<hr class="invis1">

<div class="custombox clearfix">
    <?php if (comments_open()) {
        comment_form(array(
            'fields' => apply_filters(
                'comment_form_default_fields',
                array(
                    'author' => '<input type="text" class="form-control" placeholder="Your name" id="author" name="author" value="' .
                        esc_attr($commenter['comment_author']) . '">',
                    'email'  => '<input type="text" class="form-control" placeholder="Email address" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) .
                        '" >',
                    'url'    => '<input type="text" class="form-control" placeholder="Website" id="url" name="url" value="' . esc_attr($commenter['comment_author_url']) . '">
                    </div>
                    </div>
                </div>'
                )
            ),
            'comment_field' => '<textarea class="form-control" placeholder="Your comment" id="comment" name="comment"></textarea>',
            'comment_notes_after' => '',
            'title_reply' => '<h4 class="small-title">Leave a Reply</h4> <div class="row">
            <div class="col-lg-12">
               <div class="form-wrapper">'
        ));
    } ?>

</div>