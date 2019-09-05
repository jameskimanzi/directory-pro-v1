@extends('layouts.admin')
@section('content')
    <div class="container">
        {{--<button class="btn btn-info hBack" type="button">Go back</button>--}}
        <a href="{{ url('members') }}" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Go back</span>
        </a>

        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-10 col-xs-12 col-lg-10">
                <div class="card shadow-lg border-0 mb-5 bg-white rounded">
                    <div class="card-header border-0 bg-info text-white font-weight-bold"><i
                            class="fas fa-plus"></i> {{ __('Create New Member') }}</div>

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

                        <form action="{{ route('members.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="fname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('First Name') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="fname" type="text"
                                           class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                           value="{{old('fname')}}" name="fname" required
                                           data-validation-required-message="Please enter member's name." required
                                           autofocus>

                                    @if ($errors->has('fname'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Surname') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="sname" type="text"
                                           class="form-control{{ $errors->has('sname') ? ' is-invalid' : '' }}"
                                           value="{{old('sname')}}" name="sname" required
                                           data-validation-required-message="Please enter member's surname." required
                                           autofocus>

                                    @if ($errors->has('sname'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sname') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="other_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Other Name') }}</label>
                                <div class="col-md-6">
                                    <input id="other_name" type="text"
                                           class="form-control{{ $errors->has('other_name') ? ' is-invalid' : '' }}"
                                           value="{{old('other_name')}}" name="other_name"
                                           data-validation-required-message="Please enter member's other name." 
                                           >

                                    @if ($errors->has('other_name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('other_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                    pattern="^\d{10}$"
                                           class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           value="{{old('phone')}}" name="phone" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}<span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           value="{{old('email')}}" name="email" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bs_nature"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Business Nature') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="bs_nature" type="text"
                                           class="form-control{{ $errors->has('bs_nature') ? ' is-invalid' : '' }}"
                                           value="{{old('bs_nature')}}" name="bs_nature" required>

                                    @if ($errors->has('bs_nature'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('bs_nature') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bs_permit"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Business Permit') }}</label>
                                <div class="col-md-6">
                                    <select name="bs_permit" class="form-control">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="marital_status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>
                                <div class="col-md-6">
                                    <select name="marital_status" class="form-control">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="county_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('County') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <select id="county_id" class="form-control" name="county_id" required>
                                        <option value="">--Choose ---</option>
                                        @foreach($counties as $county)
                                            <option value="{{$county->id}}">{{$county->county_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="constituency_id" class="col-md-4 col-form-label text-md-right">Constituency <span class="required">*</span></label>
                                <div class="form-group col-md-6">
                                    <div id="old_constituency">
                                        <select class="form-control select2" id="constituency_id1">
                                            <option value="">--Select Constituency --</option>
                                        </select>
                                    </div>
                                    <span id="get-constituencies"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                        <div id="old_ward">
                                    <select  class="form-control select2"  id="ward_id">
                                        <option value="">--Choose Ward---</option>

                                    </select>
                                </div>
                                <span id="get-wards"></span>
                            </div>
                            </div>
                            <div class="form-group row">
                                <label for="location"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Location') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <select id="location_id" class="form-control" name="location_id" required>
                                        <option value="">--Choose ---</option>
                                        @foreach($locations as $location)
                                            <option value="{{$location->id}}">{{$location->location_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="chief_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Chief Name') }} <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="chief_name" type="text"
                                           class="form-control{{ $errors->has('chief_name') ? ' is-invalid' : '' }}"
                                           value="{{old('chief_name')}}" name="chief_name" required>

                                    @if ($errors->has('chief_name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('chief_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="chief_phone"
                                       class="col-md-4 col-form-label text-md-right">Chief's Phone No. <span class="required">*</span></label>
                                <div class="col-md-6">
                                    <input id="chief_phone" type="text"
                                           class="form-control{{ $errors->has('chief_phone') ? ' is-invalid' : '' }}"
                                           value="{{old('chief_phone')}}" name="chief_phone" required>

                                    @if ($errors->has('chief_phone'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('chief_phone') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">Member belongs to a group?<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="is_grouped" class="custom-control-input" value=0>
                                    <label class="custom-control-label" for="customRadioInline1">No</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="is_grouped" class="custom-control-input" value=1>
                                    <label class="custom-control-label" for="customRadioInline2">Yes</label>
                                </div>
                                <div class="help-block with-errors">
                                </div>
                                </div>
                            </div>
                            <div class="form-group row" id="show-groups">
                                <label for="group_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Group Name ') }}</label>
                                <div class="col-md-6">
                                    <select name="group_id"  class="form-control">
                                        <option value="">--Choose--</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#county_id').on('change', function () {
            let county = $(this).find(':selected').val();
            console.log(county);
            let html = '';
            if (county) {
                $.ajax({
                    url: "{{url('/api/get-constituencies')}}/"+county,
                    data: "",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        html = "<select name=\"constituency_id\" class=\"form-control\" id=\"constituency_id\" onchange=\"getWard(this);\" required>" +
                            "  <option value=\"\">--Select Constituency--</option>";
                        for (let i = 0; i < data.length; i++) {
                            html += "<option value= \"" + data[i].id + "\">" + data[i].constituency_name + "</option>";
                        }
                        html += "</select>";
                        $("#old_constituency").hide();
                        $("#get-constituencies").html(html);


                    },

                });
            }
            else {
                html = '';
                $("#old_constituency").hide();
                $("#get-constituencies").html(html);
            }
        });

    });


</script>
<script type="text/javascript">
                  // Start on wards
        function getWard(constituency){
            let const_id = constituency.options[constituency.selectedIndex].getAttribute("value");
            console.log("Constituency is : "+const_id);
            let html1 = '';
            if (const_id) {
                $.ajax({
                    url: "{{url('/api/get-wards')}}/"+const_id,
                    data: "",
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);

                        html1 = "<select name=\"ward_id\" class=\"form-control\" id=\"id\" required>" +
                            "  <option value=\"\">--Select Ward--</option>";
                        for (let i = 0; i < data.length; i++) {
                            html1 += "<option value= \"" + data[i].id + "\">" + data[i].ward_name + "</option>";
                        }
                        html1 += "</select>";
                        $("#old_ward").hide();
                        $("#get-wards").html(html1);


                    },

                });
            }
            else {
                html1 = '';
                $("#old_ward").hide();
                $("#get-wards").html(html1);
            }
        }

</script>
    <script>
        $("input[type=radio][name=is_grouped]").on('change', function () {
            console.log(this.value);
            if (this.value === "1") {
                $('#show-groups').show();
            } else if (this.value === "0") {
                $('#show-groups').hide();
            } else {
                $('#show-groups').hide();
            }
        });
    </script>
@endsection


