@extends('layouts.admin')

@section('title', 'Create Brand')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add brands</h3>
    <p class="outro-dash">add a new brand name e.g Toyota</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module">

                <form>
                    <input class="input-1" type="text" placeholder="Brand name" required />
                    <input class="input-1" type="text" placeholder="Manufacturing country" />
                    <input id="file" type="file" accept="image/*">
                    <label for="file">
                        upload icon
                    </label>

                    <button class="btn-dash" type="submit">Create</button>
                </form>

            </div>
        </div>
    </div>


</div>
@endsection
