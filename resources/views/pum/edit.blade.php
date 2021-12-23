@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit existing record</h3>
<form action="{{route('pum.update',$pum->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$pum->id}}">
    Program Name
    <input type="text" name="name"
    class="form-control" value="{{$pum->name}}">
    <button type="submit" class="btn btn-primary">Save Record
    </button>
    Faculty
    <input type="text" name="faculty"
    class="form-control" value="{{$pum->faculty}}">
    <button type="submit" class="btn btn-primary">Save Record
    </button>

</form>
@endsection