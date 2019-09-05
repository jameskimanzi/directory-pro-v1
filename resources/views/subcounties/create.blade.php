@extends('layouts.admin')
@section('content')
<div class="container">
     
        <a href="{{ url('county/'.$county->id.'/sub-counties') }}" class="btn btn-sm btn-info btn-icon-split" style="margin-left:-50px">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">View Created Subcounties</span>
        </a>
        
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Subcounty ') }}</div>

                <div class="card-body text-muted">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('county/'.$county->id.'/sub-counties/create') }}" method="POST">
                      @csrf
                    <div class="form-group row">
                        <input type="hidden" name="county_id" value="{{$county->id}}">
                      </div>
                     
                      <div class="form-group row">
                        <label for="constituency" class="col-md-4 col-form-label text-md-right">{{ __('SubCounty Name') }}</label>
                        <div class="col-md-6">
                            <input id="subcounty_name" type="text" class="form-control{{ $errors->has('subcounty_name') ? ' is-invalid' : '' }}" value="{{old('subcounty_name')}}" name="subcounty_name" required data-validation-required-message= "Please enter   SubCounty name." required autofocus>

                            @if ($errors->has('subcounty_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subcounty_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                     
                      
                      
                     
                     
                     
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-info btn-inline-info">
                                   <i class="fas fa-paper-plane"></i> {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection