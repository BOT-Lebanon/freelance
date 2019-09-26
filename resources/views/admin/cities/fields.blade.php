
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Kadaaid Field -->
<div class="form-group col-sm-12">
    {!! Form::label('KadaaId', 'Kadaa :') !!}
    {!! Form::select('KadaaId', $kadaas,null,array('class' => 'form-control')) !!}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.cities.index') !!}" class="btn btn-default">Cancel</a>
</div>
