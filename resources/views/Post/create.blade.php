@extends('layouts.standard')
@section('title',"PostCreate")
@section('content')
    <div class="container p-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header boxTitle">{{ __('Crear Post') }}</div>
                    <div class="card-body">
                        <!-- Div errors -->
                        <div class="row">
                            <div class="col-12 col-center">
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
                                @if($message = Session::get('success'))
                                    <div class="alert alert-success alert-block ">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{$message}}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <form id="post-form" name="post-form" action="{{url('post')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-center">

                                    <div class="md-form text-left py-2">
                                        <label class="text-center" for="asunto">
                                            Asunto
                                        </label>
                                        <input class="form-control" id="asunto" type="text" name="asunto" value="{{old('asunto')}}" />
                                    </div>
                            
                                    <div class="md-form mb-0 text-left py-2">
                                        <label class="mt-1 text-center" for="post">
                                            Post
                                        </label>
                                        <textarea class="form-control" id="post" type="text" name="post" value="{{old('post')}}">
                                        </textarea>
                                    </div>

                                    <div class="md-form text-left py-2">
                                        <input type="file" name="file" id="file" class="input-file" accept="image/*">
                                    </div>

                                    <div class="md-form  text-center">
                                        <input type="submit" value="Agregar" class="btn primaryButton"> 
                                    </div>

                                </div>
                            </div>
                        </form> 

                    </div>           
                </div>
            </div>
        </div>
    </div>
    <div class="container p-4">
        <div class="row justify-content-center">
            @if(count($posts) >= 1)
                @foreach($posts as $key => $post)
                    <div class="col-md-6 pt-2">
                        <div class="card">
                            <div class="card-header boxTitle">{{ __('Asunto: ')}} {{$post->asunto}} </div>
                            <div class="card-body text-center">
                                @if ($post->image != 'SinImagen')
                                    <img class="img-fluid" src="{{$post->image}}" alt="img post" style="width: 40px; height: 40px;"> <br>
                                @endif
                                
                                Post: <?php echo (nl2br($post->post)); ?> <br>

                                <form id="post-form" class="mt-2" name="post-form" action="{{route('post.destroy', ['post' => $post->id])}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-block primaryButton">
                                        Borrar
                                    </button>
                                </form>

                                <a class="btn btn-block primaryButton mt-2" href="{{route('post.show', ['post' => $post->id])}}"> Ver post </a>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection