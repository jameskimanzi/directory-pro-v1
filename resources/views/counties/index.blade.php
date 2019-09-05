@extends('layouts.admin')
@section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="horizontal">
        
        <div class="col-lg-12">
                <a href="{{ url('admin') }}" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-left"></i>
                    </span>
                    <span class="text">Go back</span>
                </a>
            <a class="btn btn-sm  btn-info" href="{{ route("counties.create") }}"class="btn btn-sm btn-info btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                Add county
            </a>

        </div>
    </div>
    
@endcan
{{--@can('user_create')
    <div style="margin-bottom: 10px;" class="row" >
        <div class="col-lg-12" style="margin-left:220px;margin-top:-48px">
            <a class="btn btn-info" href="{{ route("subcounties.create") }}">
                Add SubCounty
            </a>
        </div>
    </div>
@endcan--}}

<div class="card">
    <div class="card-header">
        Counties List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           County Code
                        </th>
                        <th>
                            County Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($counties as $county)
                        <tr data-entry-id="{{ $county->id }}">
                            <td>

                            </td>
                            <td>
                                    <a  href="{{ url('/county/'.$county->id.'/sub-counties') }}">
                                {{ $county->code ?? '' }}
                            </td>
                            <td>
                                    <a  href="{{ url('/county/'.$county->id.'/sub-counties') }}">
                                {{ $county->county_name ?? '' }}
                            </td>
                          
                           
                           
                           
                           
                            <td>
                                 {{--@can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('members.show', $member->id) }}">
                                        View
                                    </a>
                                @endcan--}}
                               @can('user_edit')
                               <a class="btn btn-sm btn-info" href="{{ route('counties.edit', $county->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('counties.destroy', $county->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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