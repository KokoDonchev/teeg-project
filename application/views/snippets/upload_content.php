<div class="modal fade" id="upload_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload content</h4>
      </div>
      <div class="modal-body">
        <!-- content goes here -->
        <form action="/home/upload_content" method="POST">
            <div class="form-group">
            <label for="InputTitle">Title</label>
            <input type="text" class="form-control" id="InputTitle" placeholder="Title" name="u_title">
            </div>
            <div class="form-group">
            <label for="InputDesc">Description</label>
            <textarea rows="4" class="form-control" id="InputDesc" name="u_desc" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
            <label for="exampleInputFile">Thumbnail</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Recommended image size: 440x260px</p>
            </div>
            <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile">
            <p class="help-block">Please choose a .pdf file.</p>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>