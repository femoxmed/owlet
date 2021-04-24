@extends('layouts.admin')

@section('title', 'View and Edit Categories')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent">Categories</h3>
    <p class="outro-dash">View & Manage all categories</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-view">
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('dashboard/icons/edit.svg')}}" class="img-fluid icon-size" />
                </a>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Category name </h6>
                            <p class="title-value">Mechanical </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> No of listing(s) </h6>
                            <p class="title-value"> 1,345 </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Category discreption(s) </h6>
                            <p class="title-value"> not avaliable </p>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <input class="input-1" type="text" placeholder="Enter category name" required /> <br>
                    <textarea>Enter category descreption</textarea>
                </form>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn-modal" data-dismiss="modal">Save & update</button>
            </div>
        </div>
    </div>
</div>
@endsection
