@extends('layouts.admin')
@section('content')
<div class="container">
    <a href="{{ url('constituencies') }}" class="btn btn-sm btn-info btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Go back</span>
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Update Constituency ') }}</div>

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

                    <form action="{{ route('constituencies.update',$constituency->id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                    <div class="form-group row">
                        <label for="county_id" class="col-md-4 col-form-label text-md-right">{{ __('County') }}</label>
                        <div class="col-md-6">
                            <select id="county_id" class="form-control"  name="county_id"  required>
                                <option value="">--Choose ---</option>
                                @foreach($counties as $county)
                                <option value="{{$county->id}}">{{$county->county_name}}</option>

                                @endforeach
                            </select>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="constituency_name" class="col-md-4 col-form-label text-md-right">{{ __('Constituency Name') }}</label>
                        <div class="col-md-6">
                            <input id="constituency_name" type="text" class="form-control{{ $errors->has('constituency_name') ? ' is-invalid' : '' }}"  name="constituency_name" value="{{$constituency->constituency_name }}" required data-validation-required-message= "Please enter   Location name." required autofocus>

                            @if ($errors->has('constituency_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('constituency_name') }}</strong>
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