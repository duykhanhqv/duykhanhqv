<hr class="invis1">
<div class="custombox clearfix">
    <h4 class="small-title"> <?php if (!have_comments()) {
                                    echo  "Leave a comment";
                                } else {
                                    echo get_comments_number();
                                } ?> Comments</h4>
    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                <?php
                wp_list_comments(array(
                    'format' => 'html5',
                    'per_page' => 3,
                    'type' => 'comment',
                    'callback' => 'custom_comments'
                ));
                ?>
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