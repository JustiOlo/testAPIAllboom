<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
//Se necesita esta clase para poder trabajar con el Storage
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Le diremmos qué hacer al invocarse desde la ruta (Postcontroller@index)
        //return view('home');

        //Enviaremos toda la lista de recursos disponibles
        $posts = Post::all();
        
        return response()->json(['posts'=> $posts,] , 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $posts = Post::where('id_user','=',  auth()->id())->get();

        //Enviandome a la vista que contiene el formulario de creación de posts
        return view('Post\create', compact('posts'));

    }

    /**
     * Store a newly crestoreated resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validador
        $this->validate($request, [
            'asunto' => 'required|max:255',
            'post' => 'required',
            'file' => 'image|max:20048'
        ],[
            'asunto.required' => __('Necesitas agregar el asunto'),
            'post.required' => __('Necesitas agregar el post'),
            'file.image' => __('El archivo que debes subir es una imagen'),
        ]);
        
        $id_user = auth()->id();
        if ($request->file('file')) {
            $imagen = $request->file('file')->store("public/users/user$id_user");
            $url = Storage::url($imagen);
    
            $post = Post::create([
                'asunto' => $request->input('asunto'),
                'post' => $request->input('post'),
                'id_user' => auth()->id(), 
                'estado' => false, 
                'image' => $url,
            ]);
    
            return redirect('post/create')->with('success', 'Post creado');

        }else {
            //Guardas info en BBDD
            $post = Post::create([
                'asunto' => $request->input('asunto'),
                'post' => $request->input('post'),
                'id_user' => auth()->id(), 
                'estado' => false, 
                'image' => 'SinImagen',
            ]);
    
            return redirect('post/create')->with('success', 'Post creado');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Post\post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('Post\edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $post-> asunto = $request->asunto;
        $post-> post = $request->post;

        $post->save();

        return redirect('post/create');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        if ($post->image == 'SinImagen') {
            $post->delete();
            return redirect('post/create');
        }else {
            $image_path = public_path().$post->image;
            unlink($image_path);
            $post->delete();
            return redirect('post/create');
        }    
    

    }
    //crearemos 5 funciones y 5 rutas 
    public function pruebaAPI1($id) {
        $post = Post::find($id)->first();
        return response()->json(['post'=> $post,] , 200);
    }

    public function pruebaAPI2(Request $request) {

        $this->validate($request, [
            'asunto' => 'required|max:255',
            'post' => 'required',
        ],[
            'asunto.required' => __('Necesitas agregar el asunto'),
            'post.required' => __('Necesitas agregar el post'),
        ]);

        $post = new Post();
        $post->asunto = $request->asunto;
        $post->post = $request->post;
        $post->image = 'SinImagen';
        $post->estado = False;
        $post->id_user = $request->id;
        $post->save();
        return $post;

      }
    
    public function pruebaAPI3($id)
    {
        $user = User::find($id)->first();
    
        return $user;
    }
    
    public function pruebaAPI4($name)
    {
        $user = User::where('name', $name)->get();

        return $user;
            
    }
    public function pruebaAPI5()
    {

        
            
    }

}
