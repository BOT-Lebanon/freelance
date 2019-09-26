<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sortname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('sortname', 'Sortname:') !!}
    {!! Form::text('sortname', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.countries.index') !!}" class="btn btn-default">Cancel</a>
</div>
