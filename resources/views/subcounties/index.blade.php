@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
                <a href="{{ url('counties') }}" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Go back</span>
                </a>
            <a   href="{{ url('county/'.$county->id.'/sub-counties/create') }}"class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                Add Subcounty
            </a>
        </div>
    </div>
@endcan
{{--@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12" style="margin-left:220px;margin-top:-48px">
            <a class="btn btn-info" href="{{ route("locations.create") }}">
                Add Location
            </a>
        </div>
    </div>
@endcan--}}
<div class="card">
    <div class="card-header">
   
        {{ $county->county_name}} County

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           Sub  County Name
                        </th>
                        {{-- <th>
                           County Name
                        </th>--}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sub_counties as $subcounty)
                        <tr data-entry-id="{{ $subcounty->id }}">
                            <td>

                            </td>
                           
                            <td>
                                  <a  href="{{ url('/subcounty/'.$subcounty->id.'/locations') }}">
                                 <!-- <a  href="{{ url('county/'.$county->id.'/sub-counties/'.$subcounty->id.'/locations') }}"> -->
                                {{ $subcounty->subcounty_name ?? '' }}
                            </td>
                          
                          {{--<td>
                                  <a  href="{{ url('/county/'.$county->id.'/sub-counties') }}">
                                {{ $subcounty->county->county_name ?? '' }}
                            </td>--}}
                           
                           
                           
                            <td>
                               
                               @can('user_edit')
                               <a class="btn btn-sm btn-info" href=" {{url('county/'.$county->id.'/subcounties/'.$subcounty->id.'/edit') }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('subcounties.destroy', $subcounty->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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