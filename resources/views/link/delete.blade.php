<div id="deleteImage" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">删除链接</h4>
      </div>
      <div class="modal-body">
        <p>您确定要删除该链接吗</p>
        <form method="post" action="{{ URL::to('image/delete') }}" id="imageForm">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value={{ $id }}></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-raised btn-danger" form="imageForm">删除</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#deleteImage').modal('show');

$('#deleteImage').on('hidden.bs.modal', function (e) {
    $('#deleteImage').remove()
})
</script>
