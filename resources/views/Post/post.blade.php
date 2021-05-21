@extends('layouts.standard')
@section('title',"Post")
@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header boxTitle">{{ __('Asunto: ')}} {{$post->asunto}} </div>
                    <div class="card-body text-center">
                        <img class="img-fluid" src="{{$post->image}}" alt="img post" style="width: 80px; height: 80px;"> <br>
                        Post: <?php echo (nl2br($post->post)); ?> <br>

                        <a class="btn primaryButton mt-2" href="{{route('post.edit', ['post' => $post->id])}}">Editar</a>

                        <a class="btn primaryButton mt-2" href="{{route('post.create')}}">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection