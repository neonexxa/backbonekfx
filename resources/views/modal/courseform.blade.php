<div class="form-group">
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', $coursecategories) }}    
</div>
<div class="form-group">
    {{ Form::label('name', 'Course Title') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Course Title', 'id' => 'coursename']) }}
</div>
<div class="form-group">
    {{ Form::label('level', 'Level') }}
    {{ Form::select('level', $courselevels) }}    
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Describe it...', 'id' => 'coursedescription', 'balance' => 'tdesc_cm']) }}
    <p class="help-block tdesc_cm count_message"></p>
</div>
<div class="form-group">
    {{ Form::label('duration', 'Duration') }}
    {{ Form::text('duration', null, ['class' => 'form-control', 'placeholder' => '3 days..', 'id' => 'courseduration']) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'RM60/person', 'id' => 'courseprice']) }}
</div>
<div class="form-group">
    {{ Form::label('background', 'Background') }}
    {{ Form::file('background') }}
    {{-- <p class="help-block">Example block-level help text here.</p> --}}
</div>
<div class="form-group">
    {{ Form::label('article', 'Article') }}
    {{ Form::textarea('article', null, ['class' => 'form-control', 'placeholder' => 'Article', 'balance' => 'tart_cm', 'id' => 'coursearticle']) }}
    <p class="help-block tart_cm count_message"></p>
</div>