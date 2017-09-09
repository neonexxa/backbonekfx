@extends('layouts.app')

@section('content')
<div class="container">
{{-- 
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script> --}}
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#newcourse">A</button>
    </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listofcourses as $key => $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->cname}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->description}}</td>
                    <td>{{$course->lname}}</td>
                    <td>
                        <button class="btn btn-primary editcourses" 
                            data-toggle="modal" 
                            data-target="#editcourse" 
                            data-course="{{$course->id}}" 
                            data-coursename="{{$course->name}}"
                            data-coursedescription="{{$course->description}}" 
                            data-courseduration="{{$course->duration}}" 
                            data-courseprice="{{$course->price}}" 
                            data-coursearticle="{{$course->content}}"                             
                            >E</button>
                        {{Form::open(['method'  => 'DELETE', 'route' => ['training.destroy', $course->id], 'style' => 'display: inline;'])}}
                            <button type="submit" class="btn btn-primary">D</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@include('modal.newcourseform')
@include('modal.editcourseform')


@endsection


