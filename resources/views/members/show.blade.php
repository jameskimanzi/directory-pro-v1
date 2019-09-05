@extends('layouts.admin')
@section('content')

<div class="card">
    
    <div class="card-header">
            <a href="{{ url('members') }}" class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Go back</span>
            </a>
        Show Member
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        First Name
                    </th>
                    <td>
                        {{ $member->fname }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Surname
                    </th>
                    <td>
                        {{ $member->sname }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Other Name
                    </th>
                    <td>
                        {{ $member->other_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Phone No.
                    </th>
                    <td>
                        {{ $member->phone }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Email Address.
                    </th>
                    <td>
                        {{ $member->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Gender
                    </th>
                    <td>
                        {{ $member->gender }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Marital Status
                    </th>
                    <td>
                        {{ $member->marital_status }}
                    </td>
                </tr>
                <tr>
                    <th>
                        B/S Nature
                    </th>
                    <td>
                        {{ $member->bs_nature }}
                    </td>
                </tr>
                <tr>
                    <th>
                        B/S Permit
                    </th>
                    <td>
                        {{ $member->bs_permit }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection