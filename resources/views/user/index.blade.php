@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Succesfully Dowloaded Excel') }}
<div>
                    <td><a href="{{ url()->previous() }}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

    

@endsection