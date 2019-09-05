@extends('layouts.admin')
@section('content')
<div class="container">

    <span class="icon text-white-50">
      <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Go back</span>
</a>

    <div class="row justify-content-center">
        
        <div class="col-md-8">
            
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Update Location ') }}</div>

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

                    <form action="{{  url('subcounty/'.$subcounty->id.'/locations/'.$location->loc_id.'/update')}}" method="POST">
                      @csrf
                      @method('PATCH')

                     
                      <div class="form-group row">
                        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location Name') }}</label>
                        <div class="col-md-6">
                                
                            <input id="location_name" type="text" class="form-control{{ $errors->has('location_name') ? ' is-invalid' : '' }}"  name="location_name" value="{{$location->location_name }}" rquired data-validation-required-message= "Please enter County name." required autofocus>

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