<form action="/submit-record" method="POST">
   
   <div class="form-group">
      <label for="author_name">Enter your name:</label>
      <input name="author_name" type="text" class="form-control" maxlength="255" minlength="2" required>
   </div>
   <div class="form-group">
      <label for="title">Subject:</label>
      <input name="title" type="textarea" class="form-control" maxlength="255" minlength="3" required>
   </div>
   <div class="form-group">
      <label for="text">Text:</label>
      <textarea name="text"  class="form-control"  maxlength="65535"  minlength="13" required></textarea>
   </div>
   <button class="btn btn-warning" type="submit">Submit</button>
</form>