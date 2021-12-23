@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit existing record</h3>
<form action="{{route('admin.update',$admin->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$admin->id}}">
    First Name
    <input type="text" name="name"
    class="form-control" value="{{$admin->name}}">
    Last Name
    <input type="text" name="secondname"
    class="form-control" value="{{$admin->secondname}}">
    Matric Number 
    <input type="text" name="studentno"
    class="form-control" value="{{$admin->studentno}}">
    Conferral Date
    <input type="date" name="date"
    class="form-control" value="{{$admin->date}}">
    Faculty
    <input type="text" name="faculty"
    class="form-control" value="{{$admin->faculty}}">
    Degree Achieved
    <input type="text" name="degree"
    class="form-control" value="{{$admin->degree}}">
    University
    <input type="text" name="university"
    class="form-control" value="{{$admin->university}}">
    Conferral Year
    <input type="text" name="year"
    class="form-control" value="{{$admin->year}}">
    <button type="submit" class="btn btn-primary">Save Record
    </button>

</form>
@endsection