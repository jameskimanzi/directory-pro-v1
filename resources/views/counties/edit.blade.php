@extends('layouts.admin')
@section('content')
<div class="container">
        <a href="{{ url('counties') }}" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Go back</span>
        </a>
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Update County ') }}</div>

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

                    <form action="{{ route('counties.update', $county->id) }}" method="POST">
                      @csrf
                      @method('PATCH')

                      <div class="form-group row">
                        <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"  name="code" value={{ $county->code }} required data-validation-required-message= "Please enter County code." required autofocus>

                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="constituency" class="col-md-4 col-form-label text-md-right">{{ __('County Name') }}</label>
                        <div class="col-md-6">
                                
                            <input id="county_name" type="text" class="form-control{{ $errors->has('county_name') ? ' is-invalid' : '' }}"  name="county_name" value="{{$county->county_name }}" rquired data-validation-required-message= "Please enter County name." required autofocus>

                            @if ($errors->has('county_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('county_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                     
                      
                      
                     
                     
                     
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-info btn-inline-info">
                                   <i class="fas fa-paper-plane"></i> {{ __('Update') }}
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