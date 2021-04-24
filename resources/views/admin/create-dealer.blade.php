@extends('layouts.admin')

@section('title', 'Create Dealer')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add new dealer</h3>
<p class="outro-dash">create a new dealer account</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-2">

               <form>
                   <input class="input-1" type="text" placeholder="Enter first name" required/>
                   <input class="input-1" type="text" placeholder="Enter second name" required/>
                   <input class="input-1" type="email" placeholder="Valid email address" required/>
                   <input class="input-1" type="password" placeholder="Set a default password ****" required/>
                   <input class="input-1" type="password" placeholder="Re-type password ****" required/>
                   <input class="input-1" type="number" placeholder="Valid mobile number(1)" required/>
                   <input class="input-1" type="number" placeholder="Valid mobile number(2)" required/>
                   <input class="input-1" type="text" placeholder="Company name"/>
                   <input class="input-1" type="text" placeholder="Enter address (1)"/>
                   <input class="input-1" type="text" placeholder="Enter address (2)"/>
                   <button class="btn-dash" type="submit">Create</button>
               </form>

            </div>
        </div>
    </div>

</div>
@endsectionF
