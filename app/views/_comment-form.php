<form action="/submit-comment" method="POST">
   <input type="hidden" value="<?= $record[ 'id' ]; ?>" name="record_id">
   <div class="form-group">
      <label for="author_name">Enter your name:</label>
      <input name="author_name" type="text" class="form-control" maxlength="255" minlength="2" required>
   </div>
   <div class="form-group">
      <label for="text">Enter new comment:</label>
      <textarea name="text"  class="form-control" maxlength="65535" minlength="3" required></textarea>
   </div>
   <button class="btn btn-warning" type="submit">Отправить</button>
</form>