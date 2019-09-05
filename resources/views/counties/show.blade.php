@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Adminstration Structure
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        County
                    </th>
                    <td>
                        {{ $administration->county }}
                    </td>
                </tr>
                <tr>
                    <th>
                      Constituency
                    </th>
                    <td>
                        {{ $administration->constituency }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Ward
                    </th>
                    <td>
                        {{ $administration->ward }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Location
                    </th>
                    <td>
                        {{ $administration->location }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Chief Name
                    </th>
                    <td>
                        {{ $administration->chief_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                       Chief_phone
                    </th>
                    <td>
                        {{ $administration->chief_phone }}
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection