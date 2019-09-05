@extends('layouts.admin')

@section('content')

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">DIRECTORY PRO</h1>
    </div>
    @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
                <a href="{{ route("admin.home") }}" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Go back</span>
                </a>
            <a href="{{ route("members.create") }}" class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Member</span>
            </a>
        </div>
    </div>
    @endcan

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Members</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th>
                     First Name
                  </th>

                  <th>
                      SurName
                  </th>
                  <th>
                      Other Name
                  </th>
                  <th>
                    Phone No:
                  </th>
                  <th>
                      Email Address
                  </th>
                  <th>
                   Gender
                  </th>
                  <th>
                      Marital Status
                  </th>
                  <th>
                     B/S Nature
                  </th>
                  <th>
                      B/S Permit
                  </th>
                  <th>
                     Group
                  </th>
                  <th>
                     County
                  </th>
                  <th>
                      Constituency
                  </th>
                  <th>
                    Ward
                  </th>
                  <th>
                     Location
                  </th>
                  <th>
                     Chief Name
                  </th>
                  <th>
                     Chief Phone
                  </th>
                  <th style="width: 25%">
                      &nbsp;
                  </th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($members as $member)
                  <tr data-entry-id="{{ $member->id }}">
                      <td>
                          {{ $member->fname ?? '' }}
                      </td>
                      <td>
                          {{ $member->sname ?? '' }}
                      </td>
                      <td>
                          {{ $member->other_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->phone ?? '' }}
                      </td>
                      <td>
                          {{ $member->email ?? '' }}
                      </td>
                      <td>
                          {{ $member->gender ?? '' }}
                      </td>
                      <td>
                          {{ $member->marital_status ?? '' }}
                      </td>
                      <td>
                          {{ $member->bs_nature ?? '' }}
                      </td>
                      <td>
                          {{ $member->bs_permit ?? '' }}
                      </td>
                      <td>
                          @if($member->group->name ?? '')
                          {{$member->group->name ?? ''}}
                          @else
                          No Group
                          @endif

                      </td>
                      <td>
                          {{ $member->county->county_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->constituency->constituency_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->ward->ward_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->location->location_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->chief_name ?? '' }}
                      </td>
                      <td>
                          {{ $member->chief_phone ?? '' }}
                      </td>
                     
                    
                      
                    
                      <td>
                          @can('user_show')
                                <a href="{{ route('members.show', $member->id) }}" class="btn btn-sm  btn-primary btn-show">
                                    <i class="fas fa-eye"></i>
                                    view
                                </a>
                          @endcan
                          @can('user_edit')
                                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-sm  btn-primary btn-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                          @endcan
                          @can('user_delete')
                              <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="btn btn-sm  btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                              </form>
                          @endcan
                      </td>

                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
  <!-- /.container-fluid -->

@endsection
