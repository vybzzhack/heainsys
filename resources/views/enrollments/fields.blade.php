


<!-- Client Selection Dropdown -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client:') !!}
    {!! Form::select('client_id', $clients, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select a client...'
    ]) !!}
</div>

<!-- Program Selection Dropdown -->
<div class="form-group col-sm-6">
    {!! Form::label('program_id', 'Program:') !!}
    {!! Form::select('program_id', $programs, null, [
        'class' => 'form-control select2',
        'placeholder' => 'Select a program...'
    ]) !!}
</div>



<!-- Enrolled At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enrolled_at', 'Enrolled At:') !!}
    {!! Form::date('enrolled_at', null, ['class' => 'form-control','id'=>'enrolled_at']) !!}
</div>
@push('page_scripts')
    <script type="text/javascript">
        $('#enrolled_at').datepicker()
    </script>
@endpush