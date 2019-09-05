@extends('layouts.admin')
@section('content')
<div class="container">
    <a href="{{ url('constituency/'.$constituency->id.'/wards') }}" class="btn btn-sm btn-info btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Go back</span>
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Ward ') }}</div>

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

                   <form action="{{ url('constituency/'.$constituency->id.'/wards/create') }}" method="POST">
                      @csrf
                   <div class="form-group row">
                        <input type="hidden" name="constituency_id" value="{{$constituency->id}}">
                      </div>
                     
                      <div class="form-group row">
                        <label for="ward_name" class="col-md-4 col-form-label text-md-right">{{ __('Ward Name') }}</label>
                        <div class="col-md-6">
                            <input id="ward_name" type="text" class="form-control{{ $errors->has('ward_name') ? ' is-invalid' : '' }}" value="{{old('ward_name')}}" name="ward_name" required data-validation-required-message= "Please enter   Ward name." required autofocus>

                            @if ($errors->has('ward_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ward_name') }}</strong>
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