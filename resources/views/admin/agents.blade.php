@extends('layouts.admin')

@section('title', 'View and Edit Agents')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Agents</h3>
    <p class="outro-dash">View & Manage agents account</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-view">
                <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{url('dashboard/icons/edit.svg')}}" class="img-fluid icon-size" />
                </a>

                <div class="row">

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> First name </h6>
                            <p class="title-value">Peter </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Phone number </h6>
                            <p class="title-value">08182175835 </p>
                        </div>


                        <div class="bb">
                            <h6 class="title-holder"> No of dealers </h6>
                            <p class="title-value">28 </p>
                        </div>


                    </div>

                    <div class="col-lg-6">
                        <div class="bb">
                            <h6 class="title-holder"> Last name </h6>
                            <p class="title-value"> Oromeru </p>
                        </div>

                        <div class="bb">
                            <h6 class="title-holder"> Email address </h6>
                            <p class="title-value">peteroromeru@gmail.com </p>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Agent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form>
                     <input class="input-1" type="text" placeholder="Enter first name" required/>
                     <input class="input-1" type="text" placeholder="Enter second name" required/>
                     <input class="input-1" type="email" placeholder="Valid email address" required/>
                     <input class="input-1" type="number" placeholder="Phone number" required/>

                 </form>

        </div>
        <div class="modal-footer">

          <button type="button" class="btn-modal" data-dismiss="modal">Save & update</button>
        </div>
      </div>
    </div>
  </div>

  <!--end-->
@endsection
