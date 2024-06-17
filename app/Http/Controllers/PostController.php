<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function update(Request $request, Post $post)
    {
        if (! Gate::allows('update-post', $post)) {
            abort(403);
        }
 
        // Update the post...
 
        return redirect('/');
    }






    public function show(Post $post, User $user)
    {
        // this method is for Authenticated user
            // if(!Gate::allows('show-post', $post))
            // {
            //     abort(403);
            // }
                // show the post                
                // return response()->json($post);


        // this method is for SPECIFIC users other than authenticated user
            // if (Gate::forUser($user)->allows('show-post', $post)) {          
            //     return response()->json($post);
            // }
            //     abort(403);



        // this method will automatically return AuthorizationException
            // Gate::authorize('show-post', $post);
            // return response()->json($post);
           
                
       
           


    }

    public function edit(Post $post)
    {


        // this method to get the full authorization response returned by the gate        
            // $response = Gate::inspect('edit-settings');

            // if ($response->allowed()) {
            //     // The action is authorized...
            //     return response()->json($post);
            // } else {
            //     echo $response->message();
            // }

        // this method , the error message provided by the Authorization Response will be propagated to the HTTP Response:
            // Gate::authorize('edit-settings');
            // return response()->json($post);





             // Perform authorization check for updating a post
    if (Gate::allows('edit-settings', $post)) {
        // The user is authorized to update the post
        // Proceed with updating the post...
        return response()->json($post);
    } else {
        // The user is not authorized to update the post
        abort(403, 'Unauthorized action.');   

    }


    }


}
