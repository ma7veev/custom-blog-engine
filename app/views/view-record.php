<div class="blog-post">
   <h2 class="blog-post-title"><?= $record[ 'title' ]; ?></h2>
   <p class="blog-post-meta">December 14, 2013 by
      <a href="#"> <?= $record[ 'author_name' ]; ?></a>
   </p>
    <?= $record[ 'text' ]; ?>
</div>
<?php if ( !empty($comments_list)): ?>
<h2 class="mt-5">Comments</h2>
<?php else: ?>
   <p>There is no comments yet. You can add one by form below.</p>
<?php endif; ?>
<h4>Add comment:</h4>
<div class="mt-5">
   <?php require_once ('_comment-form.php'); ?>
</div>
<div class="mt-5">
   <?php require_once ('_comments-list.php'); ?>
</div>