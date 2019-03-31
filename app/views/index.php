<?php use Core\Helpers\HData; ?>

<?php if ( !empty($popular_records)): ?>
   <h2>Popular posts</h2>
   <div id="popular-carousel" class="owl-carousel">
       <?php foreach ($popular_records as $record): ?>
          <div class="carousel-item active">
             <img class="first-slide"
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                  alt="First slide"
                  style="height: 400px;">
             <div class="container">
                <div class="carousel-caption text-left">
                   <h1><?= $record[ 'title' ]; ?></h1>
                   <strong class="d-inline-block mb-2 text-primary"><?= $record[ 'author_name' ]; ?></strong>
                   <p><?= substr($record[ 'text' ], 0, 100); ?>...</p>
                   <p>
                      <a class="btn btn-lg btn-primary" href="#" role="button">More
                      </a>
                   </p>
                </div>
             </div>
          </div>
       <?php endforeach; ?>
   </div>
<?php endif; ?>
<div class="mt-3 mb-4">
   <h2>Add new record:</h2>
    <?php require_once('_record-form.php'); ?>
</div>
<?php if ( !empty($last_records)): ?>
   <h2>Last posts:</h2>
   <div class="row mb-2 mt-3">
       <?php foreach ($last_records as $record): ?>
          <div class="col-md-6">
             <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                   <strong class="d-inline-block mb-2 text-primary"><?= $record[ 'author_name' ]; ?></strong>
                   <h3 class="mb-0">
                      <a class="text-dark" href="#"><?= $record[ 'title' ]; ?></a>
                   </h3>
                   <div class="mb-1">
                      <span class=" text-muted"><?= $record[ 'created_at' ] ?></span>
                      <span class="ml-3 font-italic text-muted"><?= HData::issetCount($comments_freq, $record[ 'id' ]) ?> comments
                      </span>
                   </div>
                   <p class="card-text mb-auto"><?= substr($record[ 'text' ],
                             0,
                             100); ?>...
                   </p>
                   <a href="/view-record?id=<?= $record[ 'id' ]; ?>"
                      class="mt-2">Continue reading
                   </a>
                </div>
                <!--<img class="card-img-right flex-auto d-none d-md-block"
                     data-src="holder.js/200x250?theme=thumb"
                     alt="Card image cap">-->
             </div>
          </div>
       <?php endforeach; ?>
   </div>
<?php endif; ?>
