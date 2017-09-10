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
    <div class="row">
        <div class="col-md-6" style="padding:40px">
            <h4>Category <button class="btn btn-primary" data-toggle="modal" data-target="#setcat" >+</button></h4>
             <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coursecategories as $key => $categories)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$categories}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6" style="padding:40px">
            <h4>Levels <button class="btn btn-primary" data-toggle="modal" data-target="#setlev" >+</button></h4>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courselevels as $key => $levels)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$levels}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('modal.levelset')
@include('modal.catset')

@endsection