<!-- Modal -->
<div class="modal fade" id="formData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div v-if="loading">
          <h5 class="text-danger">Loading ...</h5>
        </div>

        <blockquote>
          Isi form data dengan lengkap
        </blockquote>

        <form @submit.prevent="kirimData">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" v-model="testData.title">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" v-model="testData.content"></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-sm">Kirim Data</button>

        </form>

      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
