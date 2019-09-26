<!-- Resourcecode Field -->
<div class="form-group col-sm-12">
    {!! Form::label('resourceCode', 'Resource Code:') !!}
    <select class="form-control" title="Select Resource" name="resourceCode">
        <option disabled selected>Select Resource</option>
        <option value="functionalskills" >functional skills</option>
        <option value="major" >Major</option>
        <option value="trainingcourses" >Training Courses</option>
        <option value="specialneeds" >Special Needs</option>
        <option value="highesteducation" >Highest Education</option>
        <option value="technologyplatform" >Technology Platform</option>
        <option value="institutions" >Institutions</option>

    </select>

</div>

<!-- Resourcevalue Field -->
<div class="form-group col-sm-12">
    {!! Form::label('resourceValue', 'Resource Value:') !!}
    {!! Form::text('resourceValue', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.resources.index') !!}" class="btn btn-default">Cancel</a>
</div>
