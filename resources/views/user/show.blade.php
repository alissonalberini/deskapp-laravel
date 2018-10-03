@extends('layouts.app')

@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue">Show</h4>
            <p class="mb-30 font-14">All bootstrap element classies</p>
        </div>
    </div>
    
    <form>
        @csrf
       
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input id="name" name="name" type="text" required autofocus
                       class="form-control" disabled=""
                       placeholder="Username" value="{{ !isset($edit) ? '' : $edit->name }}" >
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input id="email" name="email" type="text" required autofocus
                       class="form-control" disabled=""
                       placeholder="email" value="{{ !isset($edit) ? '' : $edit->email }}">
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input id="password" name="password" type="password" class="form-control" placeholder="******" value="" required autofocus disabled="">
            </div>
        </div>
        
        <div class="btn-list">
            <button type="reset" id="reset" class="btn btn-outline-danger">{{ __('Cancel') }}</button>
        </div>
        
    </form>

</div>
<!-- Default Basic Forms End -->
@endsection

@section('scripts')

    
    
@endsection