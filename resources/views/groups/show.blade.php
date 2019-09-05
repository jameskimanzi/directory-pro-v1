@extends('layouts.admin')
@section('content')

<div class="card">
    
    <div class="card-header">
            <a href="{{ url('groups') }}" class="btn btn-info">Go back</a>
        Show Group
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                       Group Code
                    </th>
                    <td>
                        {{ $group->code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Group Name
                    </th>
                    <td>
                        {{ $group->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Group Leader
                    </th>
                    <td>
                        {{ $group->leader }}
                    </td>
                </tr>
                <tr>
                    <th>
                        No. of Members
                    </th>
                    <td>
                        {{ $group->members }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Agent Name
                    </th>
                    <td>
                        {{ $group->agent_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                      Agent Phone Number
                    </th>
                    <td>
                        {{ $group->agent_no }}
                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</div>

@endsection