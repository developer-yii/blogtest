<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.blogs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $login_user = Auth::user();

        $condition = [];
        $condition[] = ['blogs.created_by', '=', $login_user->id];
        $data = Blog::where($condition)
        ->join('users','users.id','=','blogs.created_by')
        ->select('blogs.*','users.name as user_name');

        return DataTables::eloquent($data)
        ->addColumn('image_url', function($row) {
            if($row->image!="" && file_exists(public_path('admin-assets/blog-images')."/".$row->image)) {    
                return asset('admin-assets/blog-images')."/".$row->image;
            }else{
                return "hello";
            }
        })
        ->filter(function ($query) use ($request) {

            $search = $request->get('search');
            if (trim($search)) {
               $query->where(function($w) use($search){
                $w->orWhere('blogs.title', 'LIKE', "%$search%")
                ->orWhere('blogs.short_description', 'LIKE', "%$search%")
                ->orWhere('blogs.tags', 'LIKE', "%$search%");
            });                            

           }
       })
        ->toJson();die();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) 
        {   
            $rules = array(
                'title' => 'required|max:255',
                'image' => 'required|mimes:jpeg,png,jpg,svg',   
                'short_description' => 'required|max:255',
                'long_description' => 'required',
                'tags' => 'required',
            );
            
            $validator = Validator::make($request->all(),$rules);            
            if($validator->fails()){
                $result = ['status' => false, 'message' => $validator->errors(), 'data' => []];
            }else{

                $blog = new Blog;            
                $blog->title = $request->title;
                $blog->short_description = $request->short_description;
                $blog->long_description = $request->long_description;
                $blog->tags = $request->tags;
                if ($request->hasFile('image')) {
                    if($blog->image != '') {
                        if(file_exists(public_path('admin-assets/blog-images/') . $blog->image)) {
                            unlink(public_path('admin-assets/blog-images/') . $blog->image);
                        }
                    }                
                    $file_name = $request->file('image')->hashName();
                    request()->image->move(public_path('admin-assets/blog-images/'), $file_name);                
                    $blog->image = $file_name;
                }
                $blog->created_by = Auth::user()->id;
                $blog->created_at = Carbon::now();
                if($blog->save())
                {         
                    $result = ['status' => true, 'message' => 'Blog save successfully.', 'data' => []];
                }else{
                    $result = ['status' => false, 'message' => 'Blog save fail!', 'data' => []];
                }
            }
            return response()->json($result);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $blog = Blog::find($request->id);      
        if(isset($blog->id)){
            if($blog->image!="" && file_exists(public_path('admin-asset/blog-images').'/'. $blog->image)) {    
                $blog->image = asset('admin-asset/blog-images')."/".$blog->image;
            }

            $result = ['status' => true, 'message' => '', 'detail' => $blog];
        }else{
            $result = ['status' => true, 'message' => 'data not found. please try again.', 'detail' => ""];
        }
        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()) 
        {   
            $rules = array(
                'title' => 'required|max:255',
                'short_description' => 'required|max:255',
                'edit_long_description' => 'required',
                'edit_tags' => 'required',
            );
            
            $validator = Validator::make($request->all(),$rules);            
            if($validator->fails()){
                $result = ['status' => false, 'message' => $validator->errors(), 'data' => []];
            }else{

                $blog = Blog::find($request->id);            
                $blog->title = $request->title;
                $blog->short_description = $request->short_description;
                $blog->long_description = $request->edit_long_description;
                $blog->tags = $request->edit_tags;
                if ($request->hasFile('image')) {
                    if($blog->image != '') {
                        if(file_exists(public_path('admin-assets/blog-images/') . $blog->image)) {
                            unlink(public_path('admin-assets/blog-images/') . $blog->image);
                        }
                    }                
                    $file_name = $request->file('image')->hashName();
                    request()->image->move(public_path('admin-assets/blog-images/'), $file_name);                
                    $blog->image = $file_name;
                }
                $blog->created_by = Auth::user()->id;
                $blog->created_at = Carbon::now();
                if($blog->save())
                {         
                    $result = ['status' => true, 'message' => 'Blog updated successfully.', 'data' => []];
                }else{
                    $result = ['status' => false, 'message' => 'Blog update fail!', 'data' => []];
                }
            }
            return response()->json($result);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Blog::destroy($request->id);        
        
        $result = ['status' => true, 'message' => 'Delete successfully'];
        
        return response()->json($result);
    }
}
