@extends('layouts.admin3')

@section('content')

<br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
   


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblData" width="100%" cellspacing="0">
                                <tr class="header">
        <th>First Name</th>
        <th>Edit</th>
        <th>Delete</th>
      
    @foreach ($fupms as $fupm)
    
    <tr>
    <tbody>
    <td class="block">{{ $fupm->name }}</td>
  
        <td><a href="{{route('fupm.edit',$fupm->id)}}" 
            class="btn btn-success">
            <i class="fas fa-edit"></i> </a>
        </td>
        <td>
            <form method="POST" 
            action="{{route('fupm.destroy',$fupm->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger"
            onclick="return confirm('Are you sure to delete the record?')">
            
            <i class="fas fa-trash"></i> </button>
            </form>
        </td>
</tbody>
        
    
    </tr>
    
    @endforeach

    <a href="{{route('fupm.create')}}" 
            class="btn btn-primary" style="margin-right:500px;">Create New 
            <i class="fas fa-edit"></i> </a>

            
  
            
        
</table>
{{ $fupms->links('pagination::bootstrap-4') }}


@endsection

