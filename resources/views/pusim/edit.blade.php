@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit existing record</h3>
<form action="{{route('pusim.update',$pusim->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$pusim->id}}">
    Program Name
    <input type="text" name="name"
    class="form-control" value="{{$pusim->name}}">
   
    Faculty
    <select class="form-control" name="faculty">
    @foreach ($fusims as $fusim)
   <option value="{{ $fusim->name }}">{{$fusim->name}} </option>   
@endforeach
</select>
<button type="submit" class="btn btn-primary">Save Record
    </button>
</form>
@endsection