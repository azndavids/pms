

{{--  {!! Form::model($ticket, [
    'method' => 'PATCH',
    'route' => ['tickets.update', $ticket->id]
]) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>  --}}

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update Form</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Fonts -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/form-input.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


</head>
<body>
    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->

         @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

            {!! csrf_field() !!}
            {{ method_field('PATCH') }}
            <div class="form-title-row">
                <h1>Update ticket</h1>
            </div>

            <div class="form-row">
                <label>
                    <span>Customer name</span>
                    <input type="text" name="customer_name" value={{$ticket->customer_name}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Log date</span>
                    <input class="date"  type="date" id="datepicker" name="log_date" required="true" value={{$ticket->log_date}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Target date</span>
                    <input class="date "  type="date" id="datepicker" name="target_date" required="true" value={{$ticket->target_date}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Completed date</span>
                    <input class="date "  type="date" id="datepicker" name="completed_date" required="true" value={{$ticket->completed_date}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Problem log</span>
                    <textarea name="problem_log">{{$ticket->problem_log}}</textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Problem title</span>
                    <textarea name="problem_title">{{$ticket->problem_title}}</textarea>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Product</span>
                    <select name="product">
                        {{--  <option selected="selected" value={{$ticket->product}}>{{$ticket->product}}</option>  --}}
                        <option>IPVPN</option>
                        <option>ADSL</option>
                        <option>SDSL</option>
                        <option>IP Value</option>
                        <option>IP Lite</option>
                        <option>ISDN BRI</option>
                        <option>ISDN PRI</option>
                        <option>METRO E</option>
                        <option>Multisip</option>
                        <option>PRI Voice</option>
                        <option>BRI voice</option>
                        <option>EFM</option>
                        <option>VSAT</option>
                        <option>DQ</option>
                        <option>IPME</option>
                        <option>3G</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Circuit number</span>
                    <input type="text" name="circuit_number" value={{$ticket->circuit_number}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Status</span>
                    <select name="status">
                        <option>pending</option>
                        <option>ongoing</option>
                        <option>completed</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Created by</span>
                    <input type="text" value="{{Auth::user()->name}}" name="created_by">
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>CTT (If any)</span>
                    <input type="text" name="ctt" value={{$ticket->ctt}}>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Responsible team</span>
                    <select name="responsible_team">
                        <option>NMOS</option>
                        <option>NMCC</option>
                        <option>ASD IM</option>
                        <option>ISPNM</option>
                        <option>CD</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Category</span>
                    <select name="category">
                        <option>Process</option>
                        <option>System</option>
                        <option>People</option>
                        <option>Re-engineering</option>
                        <option>Post-Mortem</option>
                        <option>Repeated Issues</option>
                        <option>Major Incidents</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <label>
                    <span>Priority</span>
                    <select name="priority">
                        <option>Low</option>
                        <option>Medium</option>
                        <option>High</option>
                    </select>
                </label>
            </div>

            <div class="form-row">
                <!-- <button type="submit">Submit Form</button> -->
                <td><button type="submit" name="submit">Submit Form</button></td>
            </div>

        </form>
        <div class="container">
                <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Remark</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($ticket->remarks as $ticket_remark)
                          <tr>
                            <td>{{$ticket_remark['id']}}</td>
                            <td>{{$ticket_remark['remarks']}}</td>
                            {{--  <td>{{$date}}</td>  --}}
                            <td><a href="{{action('RemarkController@edit', $ticket_remark['id'])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                              <form action="{{action('RemarkController@destroy', $ticket_remark['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                            </td>
                          </tr>
                         @endforeach
                        </tbody>
                      </table>

        </div>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
         });
    </script>
</body>
</html>
