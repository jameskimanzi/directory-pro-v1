@extends('layouts.admin')
@section('content')
<div class="container">
<a href="{{ url('location/'.$location->id.'/sublocations') }}" class="btn btn-sm btn-info btn-icon-split">
    <span class="icon text-white-50">
      <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Go back</span>
</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Sublocation ') }}</div>

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

                   
                    <form action="{{ url('location/'.$location->id.'/sublocations/create') }}" method="post">

                    @csrf
                
                     
                      <div class="form-group row">
                        <label for="subcounty" class="col-md-4 col-form-label text-md-right">{{ __('Sublocation Name') }}</label>
                        <div class="col-md-6">
                            <input id="sublocation_name" type="text" class="form-control{{ $errors->has('sublocation_name') ? ' is-invalid' : '' }}" value="{{old('sublocation_name')}}" name="sublocation_name" required data-validation-required-message= "Please enter   Sublocation name." required autofocus>

                            @if ($errors->has('sublocation_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sublocation_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                     <input type="hidden" name="location_id" value="{{$location->id}}">
                      
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