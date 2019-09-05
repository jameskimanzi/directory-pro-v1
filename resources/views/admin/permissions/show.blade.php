@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
            <a href="{{ route("admin.permissions.index") }}" class="btn btn-sm  btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go back</span></a>
        {{ trans('global.show') }} {{ trans('global.permission.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.permission.fields.title') }}
                    </th>
                    <td>
                        {{ $permission->title }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection