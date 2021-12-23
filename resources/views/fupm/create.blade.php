@extends('layouts.admin1')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Insert New Record</h3>
<form action="{{route('fupm.store')}}" method="post">
    @csrf
    Faculty name
    <input type="text" name="name"
    class="form-control">
    

    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('fupm.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>


@endsection