<div id="deleteUser" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">删除用户</h4>
      </div>
      <div class="modal-body">
        <p>您确定要删除用户吗</p>
        <form method="post" action="/user/delete" id="userForm">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value={{ $id }}></input>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-raised btn-danger" form="userForm">删除</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#deleteUser').modal('show');

$('#deleteUser').on('hidden.bs.modal', function (e) {
    $('#deleteUser').remove()
})
</script>
