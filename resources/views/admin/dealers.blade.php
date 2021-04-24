@extends('layouts.admin')

@section('title', 'View and Edit Dealers')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent">Dealers</h3>
    <p class="outro-dash">View & Manage dealers account</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-view">
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('dashboard/icons/edit.svg')}}" class="img-fluid icon-size" />
                </a>

                <a href="#" data-toggle="modal" data-target="#exampleModal2">
                    <h6>View detials </h6>
                </a>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> First name </h6>
                            <p class="title-value">Elizade </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Phone number (1) </h6>
                            <p class="title-value">08182175835 </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> No of Listings </h6>
                            <p class="title-value">128 </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Last name </h6>
                            <p class="title-value"> Motors </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Email address </h6>
                            <p class="title-value">peteroromeru@gmail.com </p>
                        </div>


                        <a href="#" data-toggle="modal" data-target="#exampleModal">
                            <img src="{{url('dashboard/icons/view.svg')}}" class="img-fluid icon-size" />
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--modal for dealer full detials -->

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dealers details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-4">
                            <h6 class="title-holder"> First name </h6>
                            <p class="title-value">Elizade </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Last name </h6>
                            <p class="title-value">Motor </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Phone number (1) </h6>
                            <p class="title-value">08182175835 </p>
                        </div>


                        <div class="col-sm-4">
                            <h6 class="title-holder"> Phone number (2)</h6>
                            <p class="title-value">not avaliable </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> No Listings </h6>
                            <p class="title-value">128</p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Address (1) </h6>
                            <p class="title-value">15 jimmy street, abule egba lagos </p>
                        </div>


                        <div class="col-sm-4">
                            <h6 class="title-holder"> Address (2) </h6>
                            <p class="title-value">not avaliable </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Email address </h6>
                            <p class="title-value">peteroromeru@gmail.com </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Company </h6>
                            <p class="title-value">elizade motors </p>
                        </div>


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
                <h5 class="modal-title" id="exampleModalLabel">Edit dealer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <input class="input-1" type="text" placeholder="Enter first name" required />
                    <input class="input-1" type="text" placeholder="Enter second name" required />
                    <input class="input-1" type="email" placeholder="Valid email address" required />

                    <input class="input-1" type="number" placeholder="Valid mobile number(1)" required />
                    <input class="input-1" type="number" placeholder="Valid mobile number(2)" required />
                    <input class="input-1" type="text" placeholder="Company name" />
                    <input class="input-1" type="text" placeholder="Enter address (1)" />
                    <input class="input-1" type="text" placeholder="Enter address (2)" />

                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn-modal" data-dismiss="modal">Save & update</button>
            </div>
        </div>
    </div>
</div>
@endsection
