<div id="setlev" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new level</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => 'setting.store_lev',  'class' => 'setlevel', 'files' => true]) !!}  
          <div class="form-group">
              {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Level', 'id' => 'levelname']) }}
          </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success savebtnform" data-dismiss="modal" form="setlevel">Save</button>
      </div>
    </div>

  </div>
</div>