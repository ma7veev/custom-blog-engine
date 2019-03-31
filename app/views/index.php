<?php use Core\Helpers\Data; ?>
<div id="popular-carousel" class="owl-carousel">
    <?php foreach ($last_records as $record): ?>
       <div class="carousel-item active">
          <img class="first-slide"
               src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
               alt="First slide" style="height: 400px;">
          <div class="container">
             <div class="carousel-caption text-left">
                <h1><?= $record[ 'title' ]; ?></h1>
                <strong class="d-inline-block mb-2 text-primary"><?= $record[ 'author_name' ]; ?></strong>
                <p><?= $record[ 'text' ]; ?></p>
                <p>
                   <a class="btn btn-lg btn-primary" href="#" role="button">More
                   </a>
                </p>
             </div>
          </div>
       </div>
    <?php endforeach; ?>
</div>

<div class="row mb-2">
    <?php foreach ($last_records as $record): ?>
       <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
             <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary"><?= $record[ 'author_name' ]; ?></strong>
                <h3 class="mb-0">
                   <a class="text-dark" href="#"><?= $record[ 'title' ]; ?></a>
                </h3>
                <div class="mb-1 text-muted"><?= $record[ 'created_at' ] ?></div>
                <p class="card-text mb-auto"><?= $record[ 'text' ]; ?></p>
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
