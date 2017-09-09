<div id="newcourse" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Course!!</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['route' => ['training.store'], 'class' => 'newcourseform', 'files' => true]) !!}
            @include('modal.courseform')
            {{-- <div class="checkbox">
                <label><input type="checkbox"> Check me out</label>
            </div> --}}
            {{-- <button type="submit" class="btn btn-default">Submit</button> --}}
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success savebtnform" data-dismiss="modal" form="newcourseform">Save</button>
      </div>
    </div>

  </div>
</div>