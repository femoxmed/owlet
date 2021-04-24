@extends('layouts.admin')

@section('title', 'Billing')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Create billing</h3>
    <p class="outro-dash">create customer billing for listings</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-3">
                <a href="#">
                    <h6 class="view-edit">View & edit </h6>
                </a>
                <form>
                    <input class="input-1" type="text" placeholder="Billing name e.g Compact+" required />
                    <select>
                        <option value="0">Select duration</option>
                        <option value="1">Weekly</option>
                        <option value="2">Monthly</option>
                        <option value="0">Yearly</option>
                        <option value="1">Daily</option>
                        <option value="1">Pay as u go</option>
                    </select>

                    <input class="input-1" type="text" placeholder="No of listings e.g 25 listings for a month" />

                    <input class="input-1" type="number" placeholder="Billing price e.g ₦50,000" />
                    <textarea>Billing descreption</textarea>
                    <button class="btn-dash-create" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
