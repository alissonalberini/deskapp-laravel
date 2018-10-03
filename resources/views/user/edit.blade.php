@extends('layouts.app')

@section('content')
<!-- Default Basic Forms Start -->
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue">Editando</h4>
            <p class="mb-30 font-14">All bootstrap element classies</p>
        </div>
    </div>
        
    <form method="post" action="{{ route('users.update', $edit->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group {{ $errors->first('name') ? ' has-danger' : '' }} row">
            <label class="col-sm-12 col-md-2 col-form-label">Name</label>
            <div class="col-sm-12 col-md-10">
                <input id="name" name="name" type="text" required autofocus
                       class="form-control form-control{{ $errors->first('name') ? '-danger' : '' }}" 
                       placeholder="Username" value="{{ !isset($edit) ? '' : $edit->name }}" >
                @if ($errors->first('name') )
                <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>
        
        <div class="form-group {{ $errors->first('email') ? ' has-danger' : '' }} row">
            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
            <div class="col-sm-12 col-md-10">
                <input id="email" name="email" type="text" required autofocus
                       class="form-control form-control{{ $errors->first('email') ? '-danger' : '' }}" 
                       placeholder="email" value="{{ !isset($edit) ? '' : $edit->email }}">
                @if ($errors->first('email') )
                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>
        
        <div class="form-group {{ $errors->first('password') ? ' has-danger' : '' }} row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
                <input id="password" name="password" type="password" 
                       class="form-control form-control{{ $errors->first('password') ? '-danger' : '' }}" 
                       placeholder="******" value="" required autofocus>
                @if ($errors->first('password') )
                <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>
        </div>
        
        <div class="btn-list">
            <button type="submit" id="submit" class="btn btn-outline-primary">{{ __('Update') }}</button>
            <button type="reset" id="reset" class="btn btn-outline-danger">{{ __('Cancel') }}</button>
        </div>
        
    </form>

</div>
<!-- Default Basic Forms End -->
@endsection

@section('scripts')

    
    
@endsection