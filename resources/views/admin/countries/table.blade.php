<table class="table table-responsive table-striped table-bordered" id="countries-table" width="100%">
    <thead>
     <tr>
        <th>Name</th>
        <th>Sortname</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{!! $country->name !!}</td>
            <td>{!! $country->sortname !!}</td>
            <td>

                 <a href="{{ route('admin.countries.edit', collect($country)->first() ) }}">
                     <i class="material-icons text-warning leftsize" title="edit country">edit</i>
                 </a>
                 <a href="{{ route('admin.countries.confirm-delete', collect($country)->first() ) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="material-icons text-danger leftsize" title="delete country">delete</i>
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
        $('#countries-table').DataTable({
                      responsive: true,
                      pageLength: 10
        });
         $('#countries-table').on( 'length.dt', function ( e, settings, len ) {
                     setTimeout(function(){
                         $('.livicon').updateLivicon();
                     },200);
         });

       </script>
@stop
