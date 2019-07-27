<?php

namespace App\Http\Controllers\api;
use App\Http\Resources\PostResource;
use \App\Post;
use \App\Http\Controllers\api\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $posts = PostResource::collection((Post::paginate($this->pagenateNumber)) ) ;
       // return $posts;
     
       return $this->apiResponse( $posts);
    }
    public function show($id)

    {
        $post = Post::find($id) ;
        if($post){
            return $this->apiResponse(new PostResource ( $post ));
           }
           return $this->apiResponse(null , "this post not found " , 404);
    }
    public function store(Request $request){
        $post =     Post::create($request->all());
        if($post){
            return $this->apiResponse( new PostResource ($post) , null , 201);
        }
        return $this->apiResponse(null , "can't store " , 520);
    }
}
