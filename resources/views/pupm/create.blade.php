@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('pupm.store')}}" method="post">
    @csrf
    Program name
    <input type="text" name="name"
    class="form-control">
    Faculty
    
    <select class="form-control" name="faculty">
    @foreach ($fupms as $fupm)
   <option value="{{ $fupm->name }}">{{$fupm->name}} </option>   
@endforeach
</select>
    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('pupm.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>


@endsection