<div class="modal fade" id="modal-delete-{{ $product->id }}">
        <div class="modal-dialog">
            <form action="/products/{{ $product->id }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete this product?;</p>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Yes</button>
                  </div>
                </div>
            </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
