<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Rate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $data =  $request->validate([
            'value' => ['required', Rule::in([0,25,50,75,100])],
            'comment' => ['nullable', 'string'],
            'user_id' => ['required']
        ]);

        $user = User::find($data['user_id']);

        if (!$user) {
            return response()->json(['message' => "Unauthorized"], 401);
        }

  
        if($request->comment) {
         $comment =  $user->comments()->create([
                'comment' => $data['comment'],
                'user_id' => auth()->user()->id
            ]);

        $payload = [
            'value' => $data['value'],
            'user_id' =>  auth()->user()->id,
            'comment_id' => $comment->id
        ];
        }  else {
            $payload = [
                'value' => $data['value'],
                'user_id' =>  auth()->user()->id,
            ];
        }
       
        $rate = Rate::where(['rateable_id' => $user->id , 'user_id' => auth()->user()->id])->first();
       
        if($rate) {
            $rate->update($payload);
        }else {
            $user->rates()->create($payload);
        }
       

        return response()->json(['message' => '$user->rates()->attach()]'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rating)
    {
        //
    }
}
