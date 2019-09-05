@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        <a href="{{route('counties.index') }}" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Go back</span>
        </a>
            <a  href=" {{ url('subcounty/'.$subcounty->id.'/locations/create')}}"class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                Add Location
            </a>
        </div>
    </div>
@endcan
{{--@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-left:220px;margin-top:-48px">
            <a class="btn btn-info" href="{{  url('location/'.$location->id.'/sublocations/create') }}">
                Add Sublocation
            </a>
        </div>
    </div>
@endcan--}}
<div class="card">
    <div class="card-header">
         {{ $subcounty->subcounty_name ?? '' }} SubCounty
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                         Location Name
                        </th>
                        {{-- <th>
                           SubCounty Name
                        </th>--}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                        <tr data-entry-id="{{ $location->id ?? '' }}">
                            <td>

                            </td>
                           
                            <td>
                                   {{-- <a  href="{{ url('/location/'.$location->id.'/sublocations') }}">--}}
                                {{ $location->location_name ?? '' }}
                            </td>
                          
                          {{--<td>
                             
                                {{ $location->subcounty->subcounty_name ?? '' }}
                            </td>--}}
                           
                           
                           
                            <td>
                                 {{--@can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('members.show', $member->id) }}">
                                        View
                                    </a>
                                @endcan--}}
                                @can('user_edit')
                                    <a class="btn btn-sm btn-info" href="{{ route('locations.edit', $location->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection