<div class="blog-post">
   <h2 class="blog-post-title"><?= $record[ 'title' ]; ?></h2>
   <p class="blog-post-meta">December 14, 2013 by
      <a href="#"> <?= $record[ 'author_name' ]; ?></a>
   </p>
    <?= $record[ 'text' ]; ?>
</div>
<div class="mt-5">
   <?php require_once ('_comment-form.php'); ?>
</div>