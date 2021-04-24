@extends('layouts.admin')

@section('title', 'Admin')

@section('content')
<div id="guts">

    <!--top banner intro-->
    <div class="bac-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="intro-dash">Applications at a glance.</h3>
                    <p class="outro-dash">The central showpieces of many vehicle collections.</p>
                </div>
            </div>
        </div>
    </div>
    <!--end-->

    <!--intro for card components-->
    <div class="row">
        <div class="col-lg-12">
            <h6 class="market-place-intro">Marketplace applications</h6>

        </div>
    </div>
    <!--end-->

    <!--card intro 1-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Agent</h6>
                    <p class="card-text-outro">agents manage dealers accounts, also agents are responsible for uploading
                        and validating ads for dealers. </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Dealer</h6>
                    <p class="card-text-outro">Company, brands & individuals who list products on the platform. </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Listings</h6>
                    <p class="card-text-outro">Uploaded products on the platform such as electronic to mechanical car
                        parts; this are also know as ads. </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>
        </div>
    </div>


    <!--end-->

    <!--card intro 2-->
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Brands</h6>
                    <p class="card-text-outro">Car companies such as Benz, Toyota, Nissan, BMW, Lexus, Renault e.t.c
                    </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Categories</h6>
                    <p class="card-text-outro">Create & modify categories for products; such as mechanical & electrical
                        categories. </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card-panel">
                    <h6 class="header-card">Billing</h6>
                    <p class="card-text-outro">Send invoices, create & manage billing prices for services offered. </p>
                    <img src="{{url('dashboard/icons/keyboard_arrow_right-24px (2).svg')}}"
                        class="img-fluid arr-right" />
                </div>
            </div>
        </div>
    </div>


    <!--end-->

</div>
@endsection
