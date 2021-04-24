@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add Categories</h3>
    <p class="outro-dash">add a new category e.g electrical, new or used parts e.t.c</p>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module">

                <form>
                    <input class="input-1" type="text" placeholder="Enter category name" required /> <br>
                    <textarea>Enter category descreption</textarea>
                    <button class="btn-dash" type="submit">Create</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
