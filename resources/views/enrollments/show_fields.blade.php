<!-- Client Id Field -->
<div class="col-sm-12">
    {!! Form::label('client_id', 'Client:') !!}
    <p>{{ $enrollments->clients->full_name }}</p>
</div>

<!-- Program Id Field -->
<div class="col-sm-12">
    {!! Form::label('program_id', 'Program:') !!}
    <p>{{ $enrollments->programs->name }}</p>
</div>

<!-- Enrolled At Field -->
<div class="col-sm-12">
    {!! Form::label('enrolled_at', 'Enrolled At:') !!}
    <p>{{ $enrollments->enrolled_at }}</p>
</div>

