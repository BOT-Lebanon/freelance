<table class="table table-responsive table-striped table-bordered" id="resources-table" width="100%">
    <thead>
     <tr>
        <th>Resource Code</th>
        <th>Resource Value</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($resources as $resource)
        <tr>
            <td>{!! $resource->resourceCode !!}</td>
            <td>{!! $resource->resourceValue !!}</td>
            <td>
                 <a href="{{ route('admin.resources.edit', collect($resource)->first() ) }}">
                     <i class="material-icons text-warning leftsize" title="edit resource">edit</i>
                 </a>
                 <a href="{{ route('admin.resources.confirm-delete', collect($resource)->first() ) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="material-icons text-danger leftsize" title="delete resource">delete</i>
                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css') }}"/>
 <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}" ></script>
 <script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

    <script>
        $('#resources-table').DataTable({
                      responsive: true,
                      pageLength: 10
        });
         $('#resources-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                         $('.livicon').updateLivicon();
                     },200);
         });

       </script>
@stop
