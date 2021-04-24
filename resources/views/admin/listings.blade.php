@extends('layouts.admin')

@section('title', 'View and Edit Listings')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent">Listings</h3>
    <p class="outro-dash">View & Manage all listings</p>


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
                            <h6 class="title-holder"> Item name </h6>
                            <p class="title-value">Amg v6 vaulve </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Sold by </h6>
                            <p class="title-value">Elizade motors </p>
                        </div>


                        <div class="bb">
                            <h6 class="title-holder"> Car brand </h6>
                            <p class="title-value"> Benz </p>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Category </h6>
                            <p class="title-value"> Mechanical </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Item condition </h6>
                            <p class="title-value">New (cha cha) </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Price </h6>
                            <p class="title-value">N50,0000 </p>
                        </div>


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
                <h5 class="modal-title" id="exampleModalLabel">Listing details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Item name </h6>
                            <p class="title-value">Amg V6 Valvue </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Sold by </h6>
                            <p class="title-value">Elizade motors </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Car brand </h6>
                            <p class="title-value">Benz </p>
                        </div>


                        <div class="col-sm-4">
                            <h6 class="title-holder"> Category</h6>
                            <p class="title-value">Mechanical </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Item condition </h6>
                            <p class="title-value">New (cha cha)</p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Price </h6>
                            <p class="title-value">N50,0000 </p>
                        </div>


                        <div class="col-sm-4">
                            <h6 class="title-holder"> Model No / Name </h6>
                            <p class="title-value">not avaliable </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Date of Manufacture </h6>
                            <p class="title-value">not avaliable </p>
                        </div>

                        <div class="col-sm-4">
                            <h6 class="title-holder"> Description(s) </h6>
                            <p class="title-value"> not avaliable</p>
                        </div>


                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<!--end-->




<!--modal for editing view -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <input class="input-1" type="text" placeholder="Item name" required />

                    <select>
                        <option value="0">Select Car brand</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="2">Benz</option>
                        <option value="2">toyota</option>
                    </select>

                    <select>
                        <option value="0">Listing Category</option>
                        <option value="1">Mechanical</option>
                        <option value="2">electrical</option>

                    </select>

                    <select>
                        <option value="0">Item condition</option>
                        <option value="1">Tokunbo (fairly used)</option>
                        <option value="2">New (cha cha)</option>

                    </select>

                    <input class="input-1" type="text" placeholder="Part model number or name" />

                    <input class="input-1" type="number" placeholder="selling price e.g ₦50,000" />
                    <textarea>Enter item description</textarea>


                    <input id="file" type="file" accept="image/*">
                    <label for="file">
                        <i><img src="icons/round_center_focus_strong_white_18dp.png" class="round" /></i> Add more item
                        image
                    </label>

                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn-modal" data-dismiss="modal">Save & update</button>
            </div>
        </div>
    </div>
</div>
@endsection
