@extends('layouts.app')



@section('content')

    <link href="{{ asset('css/form-input.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



  @foreach($data as $d)
 

    <div class="p-3 mb-2 bg-white">
      <div class="container">
          @include('alert')
        <!-- You only need this form and the form-basic.css -->

        <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cust Name</th>
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

          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->customer_name}}</td>
            {{--  <td>{{$date}}</td>  --}}
            <td>{{$d->circuit_number}}</td>
            <td>{{$d->product}}</td>
            <td>{{$d->created_by}}</td>
            <td>{{$d->responsible_team}}</td>
            <td>{{$d->priority}}</td>
            <td>{{$d->problem_log}}</td>
            <td>{{$d->status}}</td>
            <td>{{$d->ctt}}</td>
            <td>{{$d->log_date}}</td>
            <td>{{$d->target_date}}</td>
            <td>{{$d->completed_date}}</td>


            <td><a href="{{route('ticket.edit',$d['id'])}}" class="btn btn-info">Edit</a></td>
           <td>   
            <form action="{{action('TicketController@destroy', $d['id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>

          </tr>
        </tbody>
      </table>

        <div class="container">
                <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Remark</th>
                            <th>Created At</th>
                            <th>Updated At</th>

                          </tr>
                        </thead>
                        <tbody>



                        @foreach($d->remarks as $data_remark)
                          <tr>
                            <td>{{$data_remark['id']}}</td>
                            <td>{{$data_remark['remarks']}}</td>
                            <td>{{$data_remark['created_at']}}</td>
                            <td>{{$data_remark['updated_at']}}</td>




                          </tr>
                          @endforeach



                        </tbody>
                      </table>
                      <form method="post" action="{{route('remark.add')}}">
                        {!! csrf_field() !!}

                      <div class="form-row">

                      <label>
                          <span>Remarks</span>
                          <textarea name="remarks"></textarea>

                        </label>
                        <input type="hidden"  name="ticket_id" value={{$d->id}}>

                        <button class="btn btn-primary" type="submit" style="margin:0px 5px;" name="submit">Submit Remarks</button>





                    </div>
                  </form>


        </div>

    </div>
  </div>
  @endforeach

    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
         });
    </script>
    @endsection
