@extends('layouts.admin')
@section('content')
<div class="container">
    
        <a href="{{ url('subcounty/'.$subcounty->id.'/locations') }}" class="btn btn-info">View Created Locations</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Location ') }}</div>

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

                    <form action="{{ url('subcounty/'.$subcounty->id.'/locations/create') }}" method="POST">
                      @csrf
                   <div class="form-group row">
                        <input type="hidden" name="subcounty_id" value="{{$subcounty->id}}">
                      </div>
                     
                      <div class="form-group row">
                        <label for="location_name" class="col-md-4 col-form-label text-md-right">{{ __('Location Name') }}</label>
                        <div class="col-md-6">
                            <input id="location_name" type="text" class="form-control{{ $errors->has('location_name') ? ' is-invalid' : '' }}" value="{{old('location_name')}}" name="location_name" required data-validation-required-message= "Please enter   Location name." required autofocus>

                            @if ($errors->has('location_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('location_name') }}</strong>
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