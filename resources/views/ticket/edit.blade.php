{{ $ticket}}

{!! Form::model($ticket, [
    'method' => 'PATCH',
    'route' => ['tickets.update', $ticket->id]
]) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>