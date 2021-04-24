@extends('layouts.admin')

@section('title', 'View and Edit Billing')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Billing plans</h3>
    <p class="outro-dash">View & Manage all billing plans</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-view">
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('dashboard/icons/edit.svg')}}" class="img-fluid icon-size" />
                </a>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Billing name </h6>
                            <p class="title-value">Compact + </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Duration type </h6>
                            <p class="title-value">weekly </p>
                        </div>


                        <div class="bb">
                            <h6 class="title-holder"> package listings </h6>
                            <p class="title-value">28 </p>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Package price </h6>
                            <p class="title-value"> N2,500 </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Package discreption(s) </h6>
                            <p class="title-value">Not availabe </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-component-module-view">
            <a href="#" data-toggle="modal" data-target="#exampleModal">
                <img src="{{url('dashboard/icons/edit.svg')}}" class="img-fluid icon-size" />
            </a>

            <div class="row">

                <div class="col-lg-6">
                    <div class="bb">
                        <h6 class="title-holder"> Billing name </h6>
                        <p class="title-value">Compact + </p>
                    </div>

                    <div class="bb">
                        <h6 class="title-holder"> Duration type </h6>
                        <p class="title-value">weekly </p>
                    </div>


                    <div class="bb">
                        <h6 class="title-holder"> package listings </h6>
                        <p class="title-value">28 </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="bb">
                        <h6 class="title-holder"> Package price </h6>
                        <p class="title-value"> N2,500 </p>
                    </div>

                    <div class="bb">
                        <h6 class="title-holder"> Package discreption(s) </h6>
                        <p class="title-value">Not availabe </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal for editing view -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn-modal" data-dismiss="modal">Save & update</button>
            </div>
        </div>
    </div>
</div>
@endsection
