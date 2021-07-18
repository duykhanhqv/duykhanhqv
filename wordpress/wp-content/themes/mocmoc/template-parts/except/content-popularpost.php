<a href="<?= get_permalink() ?>" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="w-100 last-item justify-content-between">
        <img src="<?= the_post_thumbnail_url() ?>" alt="" class="img-fluid float-left">
        <h5 class="mb-1"><?= the_title() ?></h5>
        <small>at <?= get_the_time() ?> on <?= get_the_date() ?></small>
    </div>
</a>