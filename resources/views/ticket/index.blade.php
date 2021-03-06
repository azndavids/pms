@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white">
    <br />
      @include('alert')
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Remark Name</th>
        <th>Circuit No</th>
        <th>Product</th>
        <th>Created By</th>
        <th>Responsible Team</th>
        <th>Priority</th>
        <th>Problem Log</th>
        <th>Status</th>
        <th>CTT</th>
        <th>Date Log</th>
        <th>Target Date</th>
        <th>Date Completed</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($tickets as $ticket)
       {{--  @php  --}}
        {{--  $date=date('Y-m-d', $passport['date']);  --}}
        {{--  @endphp  --}}
      <tr>
        <td>{{$ticket['id']}}</td>
        <td>{{$ticket['customer_name']}}</td>
        {{--  <td>{{$date}}</td>  --}}
        <td>{{$ticket['circuit_number']}}</td>
        <td>{{$ticket['product']}}</td>
        <td>{{$ticket['created_by']}}</td>
        <td>{{$ticket['responsible_team']}}</td>
        <td>{{$ticket['priority']}}</td>
        <td>{{$ticket['problem_log']}}</td>
        <td>{{$ticket['status']}}</td>
        <td>{{$ticket['ctt']}}</td>
        <td>{{$ticket['log_date']}}</td>
        <td>{{$ticket['target_date']}}</td>
        <td>{{$ticket['completed_date']}}</td>


        <td><a href="{{route('ticket.remarks',$ticket['id'])}}" class="btn btn-info">Remarks</a></td>
        <td><a href="{{route('ticket.edit',$ticket['id'])}}" class="btn btn-info">Edit</a></td>

      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  </div>
@endsection
