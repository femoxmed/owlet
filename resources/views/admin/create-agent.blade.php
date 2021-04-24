@extends('layouts.admin')

@section('title', 'Create Agent')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add new agent</h3>
<p class="outro-dash">create a new agent account</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module">

               <form>
                   <input class="input-1" type="text" placeholder="Enter first name" required/>
                   <input class="input-1" type="text" placeholder="Enter second name" required/>
                   <input class="input-1" type="email" placeholder="Valid email address" required/>
                   <input class="input-1" type="number" placeholder="Phone number" required/>
                   <input class="input-1" type="password" placeholder="Set a default password ****" required/>
                   <input class="input-1" type="password" placeholder="Re-type password ****" required/>
                   <button class="btn-dash" type="submit">Create</button>
               </form>

            </div>
        </div>
    </div>


</div>
@endsection
