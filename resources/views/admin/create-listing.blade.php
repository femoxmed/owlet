@extends('layouts.admin')

@section('title', 'Create Listing')

@section('content')
<div id="guts">

    <h3 class="intro-dash-agent"> Add new listing</h3>
    <p class="outro-dash">create a new listing</p>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-component-module-2">

                <form>
                    <input class="input-1" type="text" placeholder="Item name" required />
                    <select>
                        <option value="0">Select dealer</option>
                        <option value="1">yusuf ventures</option>
                        <option value="2">jac motors</option>
                    </select>
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
                    <input class="input-1" type="date" placeholder="Year of manufacture" />
                    <input class="input-1" type="number" placeholder="selling price e.g ₦50,000" />
                    <textarea>Enter item descreption</textarea>


                    <input id="file" type="file" accept="image/*">
                    <label for="file">
                        <i><img src="icons/round_center_focus_strong_white_18dp.png" class="round" /></i> upload item
                        image
                    </label>

                    <button class="btn-dash-2" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
