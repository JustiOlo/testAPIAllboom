@extends('layouts.standard')
@section('title',"PostEdit")
@section('content')
<section class="container">
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if(count($errors ) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header boxTitle">{{ __('Editar')}}  </div>
                    <div class="card-body text-center">
                        <form id="postDelete-form" name="postDelete-form" action="{{route('post.update', ['post' => $post->id])}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row mt-4 text-center">
                                <div class="col-md-6 offset-md-3 col-6 offset-3">
                                    <div class="md-form mb-0 text-center my-2">
                                        <label class="mt-1 text-center" for="asunto">
                                           Asunto
                                        </label>
                                        <input class="form-control" id="asunto" type="text" name="asunto" value="{{$post->asunto}}" />
                                    </div>
                                    <div class="md-form mb-0 text-center my-2">
                                        <label class="mt-1 text-center" for="image">
                                            Imagen
                                        </label>
                                        <input class="form-control" id="image" type="text" name="image" value="{{$post->image}}"/>
                                        <div class="card mb-4 mt-2 text-white bg-dark">
                                            <img class="card-img-top" src="/images/team/{{$post->image}}">
                                        </div>
                                        <div class="md-form text-left py-2">
                                            <input type="file" name="file" id="file" class="input-file" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="md-form mb-0 text-center my-2">
                                        <label class="mt-1 text-center" for="post">
                                            Descripcion
                                        </label>
                                        <textarea class="form-control" id="post" type="text" style="min-height: 100px" name="post" value="post">
                                            {{$post->post}}
                                        </textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn primaryButton">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection