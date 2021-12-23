@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('pum.store')}}" method="post">
    @csrf
    Program name
    <input type="text" name="name"
    class="form-control">
    Faculty
    
    <select class="form-control" name="faculty">
    @foreach ($fums as $fum)
   <option value="{{ $fum->name }}">{{$fum->name}} </option>   
@endforeach
</select>
    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('pum.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>


@endsection