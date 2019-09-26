<!-- Region Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('region_name', 'Region Name') !!}
    {!! Form::text('region_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Region Nameara Field -->
<div class="form-group col-sm-12">
    {!! Form::label('region_nameAra', 'Region Nameara') !!}
    {!! Form::text('region_nameAra', null, ['class' => 'form-control']) !!}
</div>

<!-- Kadaaid Field -->
<div class="form-group col-sm-12">
    {!! Form::label('kadaaId', 'Kadaa') !!}
    {!! Form::select('kadaaId', $kadaa, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.regions.index') !!}" class="btn btn-default">Cancel</a>
</div>
