@extends('layouts.admin4')

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

                    {{ __('Choose university:') }}

                    <br>
</br>
                    <div>
                    <td><a href="{{route('usim.index')}}" 
            class="btn btn-primary">USIM 
            <i class=""></i> </a>
            <td><a href="{{route('upm.index')}}" 
            class="btn btn-primary">UPM 
            <i class=""></i> </a>
            <td><a href="{{route('um.index')}}" 
            class="btn btn-primary">UM 
            <i class=""></i> </a>
        </td>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection