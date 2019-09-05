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
                <div class="card-header border-0 bg-info text-white font-weight-bold"><i class="fas fa-plus"></i> {{ __('Edit  Group') }}</div>

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

                    <form action="{{ route('groups.update', $group->id) }}" method="POST">
                      @csrf
                     {{ method_field('PATCH') }}  
                     

                    <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Group code') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"  name="code"  value= {{ $group->code ?? '' }} readonly>

                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Group name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name"  value={{ $group->name }} required data-validation-required-message= "Please enter G." required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                               <select id="location_id" class="form-control"  name="location_id" required>
                                    <option value="">--Choose ---</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
    
                                    @endforeach
                                </select>
                            </div>
                          </div>
                       <div class="form-group row">
                        <label for="leader" class="col-md-4 col-form-label text-md-right">{{ __('Group leader') }}</label>
                        <div class="col-md-6">
                            <input id="leader" type="text" class="form-control{{ $errors->has('leader') ? ' is-invalid' : '' }}"  name="leader" value={{ $group->leader }} required data-validation-required-message= "Please enter Group leader" required autofocus>

                            @if ($errors->has('leader'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('leader') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                            <label for="leader_phone" class="col-md-4 col-form-label text-md-right">{{ __('Group leader Phone No.') }}</label>
                            <div class="col-md-6">
                                <input id="leader_phone" type="text" class="form-control{{ $errors->has('leader_phone') ? ' is-invalid' : '' }}"  name="leader_phone" value={{ $group->leader_phone }} required data-validation-required-message= "Please enter Group leader No" required autofocus>
    
                                @if ($errors->has('leader_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('leader_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                      <div class="form-group row">
                        <label for="members" class="col-md-4 col-form-label text-md-right">{{ __('No. of Members:') }}</label>
                        <div class="col-md-6">
                            <input id="members" type="text" class="form-control{{ $errors->has('members') ? ' is-invalid' : '' }}" name="members"   value={{ $group->members }} required>

                            @if ($errors->has('members'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('members') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agent_name" class="col-md-4 col-form-label text-md-right">{{ __('Agent name') }}</label>
                        <div class="col-md-6">
                            <input id="agent_name" type="text" class="form-control{{ $errors->has('agent_name') ? ' is-invalid' : '' }}"  name="agent_name" value={{ $group->agent_name }} required>

                            @if ($errors->has('agent_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('agent_name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="agent_no" class="col-md-4 col-form-label text-md-right">{{ __('Agent number') }}</label>
                        <div class="col-md-6">
                            <input id="agent_no" type="text" class="form-control{{ $errors->has('agent_no') ? ' is-invalid' : '' }}"  name="agent_no"   value={{ $group->agent_no }} required>

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