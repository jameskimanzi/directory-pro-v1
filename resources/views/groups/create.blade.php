@extends('layouts.admin')
@section('content')
<div class="container">
    <a href="{{ url('groups') }}" class="btn btn-sm btn-info btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Go back</span>
    </a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Create New Group') }}</div>

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

                    <form action="{{ route('groups.store') }}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Group name') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('sname')}}" name="name" required data-validation-required-message= "Please enter G." required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }} <span class="required">*</span></label>
                            <div class="col-md-6">
                            <select id="location_id" class="form-control"  name="location_id">
                                    <option value="">--Choose ---</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id ?? ''}}">{{$location->location_name ?? ''}}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                       <div class="form-group row">
                        <label for="leader" class="col-md-4 col-form-label text-md-right">{{ __('Group leader') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="leader" type="text" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }}" value="{{old('sname')}}" name="leader" required data-validation-required-message= "Please enter Group leader" required autofocus>

                            @if ($errors->has('leader'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('leader') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                       <div class="form-group row">
                        <label for="leader_phone" class="col-md-4 col-form-label text-md-right">{{ __('Group leader Phone No.') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="leader_phone" type="tel" pattern="^\d{10}$" class="form-control{{ $errors->has('leader_phone') ? ' is-invalid' : '' }}" value="{{old('leader_phone')}}" name="leader_phone" required data-validation-required-message= "Please enter Group leader No" required autofocus>

                            @if ($errors->has('leader_phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('leader_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="members" class="col-md-4 col-form-label text-md-right">{{ __('No. of Members:') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="members" type="number" class="form-control{{ $errors->has('members') ? ' is-invalid' : '' }}" value="{{old('members')}}" name="members"  min="1" max="100000">

                            @if ($errors->has('members'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('members') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agent_name" class="col-md-4 col-form-label text-md-right">{{ __('Agent name') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="agent_name" type="text" class="form-control{{ $errors->has('agent_name') ? ' is-invalid' : '' }}" value="{{old('agent_name')}}" name="agent_name"  >

                            @if ($errors->has('agent_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('agent_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agent_no" class="col-md-4 col-form-label text-md-right">{{ __('Agent Phone Number') }} <span class="required">*</span></label>
                        <div class="col-md-6">
                            <input id="agent_no" type="text" class="form-control{{ $errors->has('agent_no') ? ' is-invalid' : '' }}" value="{{old('agent_no')}}" name="agent_no" >

                            @if ($errors->has('agent_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('agent_no') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      
                     
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-info btn-inline-info">
                                   <i class="fas fa-paper-plane"></i> {{ __('Submit') }}
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