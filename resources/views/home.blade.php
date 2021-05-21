@extends('layouts.standard')

@section('content')
<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header boxTitle">{{ __('Cpanel') }}</div>

                <div class="card-body">
                   <a href= {{url('post\create')}}> Crear post </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
