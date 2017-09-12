@extends('layouts.app')

@section('content')

<div class="container">
@if (session('status'))
    <div class="row">
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ session('status') }}
        </div>
    </div>
@elseif(session('warning'))
    <div class="row">
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> {{ session('warning') }}
        </div>
    </div>
@elseif(session('danger'))
    <div class="row">
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong> {{ session('danger') }}
        </div>
    </div>
@endif
    <p>
        <button class="col btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">+</button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-block">
            
            {!! Form::open(['route' => ['carrier.store'], 'class' => 'newcarrier', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('carrier_title', 'Carrier') !!}
                {!! Form::text('carrier_title', Null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="carrier_courses">Courses</label>
                {!! Form::select('carrier_courses[]', ['1'=>'BAA','2'=>'CAA'], null, ['multiple' => true, 'class' => 'form-control margin']) !!}
                
            </div>
            <div class="form-group">
                {{ Form::label('icon', 'ICON') }}
                {{ Form::file('icon',['class' => 'form-control-file']) }}
                {{-- <p class="help-block">Example block-level help text here.</p> --}}
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            {!! Form::close() !!}
            
        </div>
    </div>
    <div class="row">
        <div class="col-4" style="padding:10px">
            <div class="card">
                <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22318%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20318%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15e72029b00%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A16pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15e72029b00%22%3E%3Crect%20width%3D%22318%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22118.0859375%22%20y%3D%2297.2%22%3E318x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Carrier Title</h4>
                    <p class="card-text">- Prerequisite</p>
                    <a href="#" class="btn btn-primary disabled" aria-disabled="true">Next Features</a>
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection