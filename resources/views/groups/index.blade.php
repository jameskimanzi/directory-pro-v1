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
                <a href="{{ route("admin.home") }}" class="btn btn-sm  btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Go back</span>
                </a>
            <a href="{{ route("groups.create") }}" class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Group</span>
            </a>
        </div>
    </div>
    @endcan

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Groups</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>
                       Group Code
                    </th>

                    <th>
                        Group Name
                    </th>
                    <th>
                        Group Location
                    </th>
                    <th>
                        Group Leader
                    </th>
                    <th>
                        Group Leader Phone No.
                    </th>
                    <th>
                       No. of members
                    </th>
                    <th>
                        Agent Name
                    </th>
                    <th>
                       Agent Phone Number
                    </th>
                   
                    <th style="width: 15%">
                        &nbsp;
                    </th>
                </tr>
            </thead>
          
            <tbody>
              @foreach($groups as $group)
                        <tr data-entry-id="{{ $group->id }}">
                            <td>
                                {{ $group->code ?? '' }}
                            </td>
                            <td>
                                {{ $group->name ?? '' }}
                            </td>
                            <td>
                                {{ $group->location->location_name ?? '' }}
                            </td>
                            <td>
                                {{ $group->leader ?? '' }}
                            </td>
                            <td>
                                {{ $group->leader_phone ?? '' }}
                            </td>
                            <td>
                                {{ $group->members ?? '' }}
                            </td>
                            <td>
                                {{ $group->agent_name ?? '' }}
                            </td>
                            <td>
                                {{ $group->agent_no ?? '' }}
                            </td>
                            <td>
                                @can('user_show')
                                    <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm  btn-primary btn-show">
                                        <i class="fas fa-eye"></i>
                                        view
                                    </a>
                                @endcan
                                @can('user_edit')
                                    <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm  btn-info btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
