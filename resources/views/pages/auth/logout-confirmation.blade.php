<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
            <form action="/logout" method="post">
                @csrf
                @method('POST')
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Log Out?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to Log Out?;</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-danger">Yes</button>
                  </div>
                </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
