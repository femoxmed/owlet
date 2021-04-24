@extends('layouts.admin')

@section('title', 'Create Admin')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add new admin</h3>
    <p class="outro-dash">create a new admin account</p>

    <div class="row">
        <div class="col-lg-12">

            <div class="card-component-module">

                <form method="POST" action="{{ route('create-admin') }}">
                    @csrf
                    <input class="input-1" type="text" name="firstname" id="firstname" placeholder="Enter first name"
                        required />
                    @if ($errors->has('firstname'))
                    <span class="error">{{ $errors->first('firstname') }}</span>
                    @endif
                    <input class="input-1" type="text" name="lastname" id="lastname" placeholder="Enter second name"
                        required />
                    @if ($errors->has('lastname'))
                    <span class="error">{{ $errors->first('lastname') }}</span>
                    @endif
                    <input class="input-1" type="email" name="email" id="email" placeholder="Valid email address"
                        required />
                    @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                    <input class="input-1" type="text" name="phone" id="phone" placeholder="Phone number" required />
                    @if ($errors->has('phone'))
                    <span class="error">{{ $errors->first('phone') }}</span>
                    @endif
                    <input class="input-1" type="password" name="password" id="password"
                        placeholder="Set a default password ****" required />
                    @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                    <input class="input-1" type="password" name="confirm_password" id="confirm_password"
                        placeholder="Re-type password ****" required />
                    <button class="btn-dash" type="submit">Create</button>
                </form>

            </div>
        </div>
    </div>

</div>
@endsection
