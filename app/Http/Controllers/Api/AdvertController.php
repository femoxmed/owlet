<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    

    // public function searchAdverts(Request $request) {
        
    //     $search = $request->query('search');
    //     $category_id= $request->query('category_id');

    //     $advert = Advert::with(['category']);
    //     if ($search) {
    //         $advert->where('title', 'Like', '%' . $search . '%')->orWhere('description', 'Like', '%' . $search . '%');
    //     }
        
    //      if($category_id) {
    //         //  dd($category_id);
    //           return $advert->where(['category_id' => $category_id])->whereNotNull('approved_at')->orderBy('created_at','desc')->paginate(15);
    //         }
    //         else {
    //             return $advert->whereNotNull('approved_at')->orderBy('created_at', 'DESC')->paginate(15);
    //         }
        


    // }

    public function searchAdverts(Request $request) {
       $advert = Advert::whereNotNull('approved_at');
        $category_id= $request->query('category_id');
        $brand_id= $request->query('brand_id');
        $condition_id= $request->query('condition_id');
        $dealer_id= $request->query('dealer_id');
        $minPrice= $request->query('minimumPrice');
        $maxPrice= $request->query('maximumPrice');

        if($category_id) {
            $advert = Advert::where(['category_id' => $category_id]);
        }

        if($brand_id) {
            $advert = $advert->where(['brand_id' => $brand_id]);
        }

        if($condition_id) {
            $advert = $advert->where(['condition_id' => $condition_id]);
        }

        if($dealer_id) {
            $advert = $advert->where(['dealer_id' => $dealer_id]);
        }
        if($minPrice) {
            $advert = $advert->where('price' ,'>=' ,$minPrice);
        }

        if($maxPrice) {
            $advert = $advert->where('price', '<=', $maxPrice);
        }

        $searchTerm = $request->query('search');
        $result = $advert;
        $result = $advert->whereLike(['title','brandmodel.name'], $searchTerm)
        ->with(['condition'])
        // ->whereNotNull('approved_at')
        ->orderBy('created_at', 'DESC')->paginate(15);

        return $result;
    //    

    }

    public function adverts (Request $request)
    {

        $status = $request->query('status'); 
        if(auth()->user() && auth()->check() && auth()->user()->id) {
      

              
            switch (auth()->user()->userable_type) {
                case "App\\Dealer":
                  
                    $adverts = Advert::where(['dealer_id' => auth()->user()->userable_id])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address']);// ->latest()->whereNotNull('approved_at')->take(9)->get();
                    break;
                case "App\\Agent":
                    $adverts = Advert::where(['agent_id' => auth()->user()->userable_id])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address']);// ->latest()->whereNotNull('approved_at')->take(9)->get();
                    break;
                default:
                    # code...
                    break;
            }

            if($status == 'inactive') {
                $adverts = $adverts->whereNull('approved_at')->orderBy('created_at','desc')->paginate(15);
            }
            else {
                $adverts = $adverts->whereNotNull('approved_at')->orderBy('created_at','desc')->paginate(15);
            }

            return response()->json(['message' => 'adverts fetched successfully', 'data' => $adverts],200);

           
        } else {
            return response()->json(['message' => 'Token is invalid'],404);
        }
    }
    

    public function index (Request $request)
    {
        $category_id = $request->query('category_id');
        // $status = $request->query('status');
           if( $request->header('authorization') == []) {
                $advert = Advert::with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->whereNotNull('approved_at');// ->latest()->whereNotNull('approved_at')->take(9)->get();
                // return response()->json($advert, 200);
           }else {


            if(auth()->user() && auth()->check() && auth()->user()->id) {

              
                switch (auth()->user()->userable_type) {
                    case "App\\Dealer":
                        $advert = Advert::where(['dealer_id' => auth()->user()->userable_id])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address']);// ->latest()->whereNotNull('approved_at')->take(9)->get();
                        break;
                    case "App\\Agent":
                        $advert = Advert::where(['agent_id' => auth()->user()->userable_id])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address']);// ->latest()->whereNotNull('approved_at')->take(9)->get();
                        break;
                    default:
                        # code...
                        break;
                }
               
            } else {
                return response()->json(['message' => 'Token is invalid'],404);
            }
           


           }
         
         
    
            if($category_id) {
                $advert = $advert->where(['category_id' => $category_id])->orderBy('created_at','desc')->paginate(15);
            }
            else {
                $advert = $advert->orderBy('created_at','desc')->paginate(15);
            }
           
           
            return response()->json($advert, 200);
   
    }

    public function recentAdverts()
    {

            $advert = Advert::with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->latest()->whereNotNull('approved_at')->take(9)->get();
    
            return response()->json($advert, 200);
   
    }

    // public function index()
    // {
        
    //     $advert =  Advert::with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->whereNotNull('approved_at')->orderBy('created_at','desc')->paginate(15);

    //     // $advert = Advert::orderBy('created_at','desc')->paginate(15);

    //     return response()->json($advert, 200);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data =  $request->validate([
            'title' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'price' => ['sometimes', 'string'],
            'condition_id' => 'sometimes|exists:conditions,id',
            'category_id' => 'sometimes|exists:conditions,id',
            'brand_id' => 'sometimes|exists:brands,id',
            'brandmodel_id' => 'sometimes|exists:brand_models,id',
            'address' => ['sometimes', 'string'],
            'longitude' => ['sometimes', 'string'],
            'latitude' => ['sometimes', 'string'],
            'state' => ['sometimes', 'string'],
            'address' => ['sometimes', 'string'],
            'longitude' => ['sometimes', 'string'],
            'latitude' => ['sometimes', 'string']
        ]);

      

      $advert = Advert::create($data);

      if (isset($request['images'])) {
        // $blog = Blog::create($blogData);
        // dd($blog);
            $fileAdders = $advert
            ->addMultipleMediaFromRequest(['images'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('images');
            });
        }

      $advert->address->create([
        'address' => $data['address'],
        'longitude' => $data['longitude'],
        'latitude' => $data['latitude'],
        'state' => $data['state']
      ]);

      return response()->json(['data' => $advert, 'message' => 'Advert created successfully'], 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show($advert)
    {
        // dd($advert);
        $advert = Advert::where(['id' => $advert]
        // , 'is_active' => 1]
    )
        ->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->first();
        if($advert){
          
            return response()->json($advert, 200);
        }
        else{
            return response()->json(['message' => "Advert Not Found"], 404);
        }
     
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $advert)
    {


       $data =  $request->validate([
            'title' => ['sometimes', 'string'],
            'description' => ['sometimes', 'string'],
            'price' => ['sometimes', 'string'],
            'condition_id' => 'sometimes|exists:conditions,id',
            'brandmodel_id' => 'sometimes|exists:brand_models,id',
        ]);
        // return response()->json($data);

        if(auth()->user() && auth()->user()->id) {
            switch (auth()->user()->userable_type) {
                case "App\\Dealer":
                    $advert = Advert::where(['dealer_id' => auth()->user()->userable_id, 'id' => $advert])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->first();// ->latest()->whereNotNull('approved_at')->take(9)->get();
                    break;
                case "App\\Agent":
                    $advert = Advert::where(['agent_id' => auth()->user()->userable_id, 'id' => $advert])->with(['category', 'condition', 'brandmodel', 'dealer', 'agent' , 'address'])->first();// ->latest()->whereNotNull('approved_at')->take(9)->get();
                    break;
                default:
                return response()->json(['message' => "Unauthorized to update this advert"], 401);
                    break;
            }
           
        }else {
            return response()->json(['message' => "Unauthorized to update this advert"], 401);
        }

 
        if(!$advert){
            return response()->json(['message' => "Advert Not Found"], 404);

        }
        
        if( $advert->created_at->addHours(2) < now()  && $advert->approved_at ){
            return response()->json(['message' => "You can not update this advert again"],400);
        };
        $advertUp = $advert->update($data);
        return response()->json(['data' => $advert, 'message' => 'Advert updated successfully'], 200);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        //
    }


    public function DealerUploadProduct(Request $request) {
       
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:png,gif,jpeg,jpg',
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:3',
            'address' => 'required',
            'price' => 'required|string|max:60',
            // 'is_active' => 'nullable|string|max:60',
            // 'expiry_date' => 'required|date|nullable',
            'condition_id'=> ['required',  'exists:conditions,id'],
            'brand_id' => 'required|string|exists:brands,id',
            'brandmodel_id' => 'required|string|exists:brand_models,id',
            'category_id' => 'required|string|exists:categories,id',
            ]);

            if(auth()->user()->userable_type == 'App\Dealer') {
                $validatedData['dealer_id'] = auth()->user()->userable->id;
            };
            // if(auth()->user()->userable_type == 'App\Agent') {
            //     $agent_id = auth()->user()->userable->id;
            // };


        // $validatedData['dealer_id'] = auth()->user->dealer->id;

        $advert = $validatedData;

        $advert =  Advert::create([

            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            // 'year' => $validatedData['year'],
            'price' => $validatedData['price'],
            // 'is_active' => $validatedData['is_active'],
            // 'expiry_date' => $validatedData['expiry_date'],
            'dealer_id' => $validatedData['dealer_id'],
            'condition_id'=> $validatedData['condition_id'],
            'brand_id' => $validatedData['brand_id'],
            'brandmodel_id' => $validatedData['brandmodel_id'],
            'category_id' => $validatedData['category_id'],
        ]);

        $advert->address()->create([
            'address' => $validatedData['address'],
            'city'=> $request->city,
            'country'=> $request->country,
            'lga'=> $request->lga,
            'surburb'=> $request->surburb,
            'state'=> $request->state,
            'postal_code'=> $request->postal_code,
            'longitude'=> $request->longitude,
            'latitude'=> $request->latitude,
        ]);


        if (isset($request['images'])) {
            // $blog = Blog::create($blogData);
            // dd($blog);
                $fileAdders = $advert
                ->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
            }

          return response()->json(['data' => $advert , 'message' => 'advert created'], 201);

    }
}
