<table class="table table-responsive table-striped table-bordered" id="regions-table" width="100%">
    <thead>
     <tr>
        <th>City Name</th>

        <th>Kadaa</th>
        <th >Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($regions as $regions)
        <tr>
            <td>{!! $regions->Name !!}</td>

            <td> </td>
            <td>
                 <a href="{{ route('admin.city.show', collect($regions)->first() ) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view regions"></i>
                 </a>
                 <a href="{{ route('admin.city.edit', collect($regions)->first() ) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit regions"></i>
                 </a>
                 <a href="{{ route('admin.city.confirm-delete', collect($regions)->first() ) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete regions"></i>
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
	
	  var table =$('#regions-table').DataTable({
                      responsive: true,
                      pageLength: 10
                  });
          table.on( 'draw', function () {
            $('.livicon').each(function(){
                $(this).updateLivicon();
            });
        } );
		
    </script>

@stop