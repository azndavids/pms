@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/form-input.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



  @foreach($data as $d)

    <div class="main-content">

        <!-- You only need this form and the form-basic.css -->
        <div class="container-fluid">
                @include('alert')
        <form class="form-basic" method="post" action="{{route('ticket.update')}}">


            {!! csrf_field() !!}

            <div class="form-title-row">
                <h1>Update ticket</h1>
            </div>

            <input type="hidden" name="tid" value={{$d->id}}>


            <div class="form-row">
                <label>
                    <span>Customer name</span>
                    <input type="text" name="customer_name" value={{$d->customer_name}}>
                </label>
                <label>
                        <span>Category</span>
                        <select name="category">
                            <option selected>{{$d->category}}</option>
                            <option>Process</option>
                            <option>System</option>
                            <option>People</option>
                            <option>Re-engineering</option>
                            <option>Post-Mortem</option>
                            <option>Repeated Issues</option>
                            <option>Major Incidents</option>
                        </select>
                    </label>
                <label>
                    <span>Log date</span>
                    <input class="date"  type="date" id="datepicker" name="log_date" required="true" value={{$d->log_date}}>
                </label>

                
              
              </div>
              <div class="form-row">

                <label>
                    <span>Problem title</span>
                    <textarea name="problem_title">{{$d->problem_title}}</textarea>
                </label>
                <label>
                        <span>Priority</span>
                        <select name="priority">
                            <option selected>{{$d->priority}}</option>
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                    </label>
                <label>
                        <span>Target date</span>
                        <input class="date "  type="date" id="datepicker" name="target_date" required="true" value={{$d->target_date}}>
                    </label>
              </div>

          <div class="form-row">
                <label>
                    <span>Problem log</span>
                    <textarea name="problem_log">{{$d->problem_log}}</textarea>
                </label>
                <label>
                        <span>Status</span>
                        <select name="status">
                            <option selected>{{$d->status}}</option>
                            <option>pending</option>
                            <option>ongoing</option>
                            <option>completed</option>
                        </select>
                </label>
                <label>
                        <span>Completed date</span>
                        <input class="date "  type="date" id="datepicker" name="completed_date" required="true" value={{$d->completed_date}}>
                </label>
               
            </div>

            <div class="form-row">
               
                 <label>
                       <span>Circuit number</span>
                       <input type="text" name="circuit_number" value={{$d->circuit_number}}>
                 </label>
                <label>
                        <span>Product</span>
                        <select name="product">
                            <option selected>{{$d->product}}</option>
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
                 <label>
                        <span>CTT (If any)</span>
                        <input type="text" name="ctt" value={{$d->ctt}}>
                 </label>

               
                
            </div>

            <div class="form-row">

                <label>
                        <span>Created by</span>
                          <input type="text" value="{{Auth::user()->name}}" name="created_by">
                 </label>
                  
                <label>
                    <span>Responsible team</span>
                    <select name="responsible_team">
                        <option selected>{{$d->responsible_team}}</option>
                        <option>NMOS</option>
                        <option>NMCC</option>
                        <option>ASD IM</option>
                        <option>ISPNM</option>
                        <option>CD</option>
                    </select>
                </label>
                
                
                
            </div>

                <div class="form-row">

                <!-- <button type="submit">Submit Form</button> -->
                <button type="submit" name="submit">Submit Form</button>
            </div>

        </form>
      </div>
      <br>
        <div class="container">
          <form method="post" action="{{route('remark.update')}}">

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Remark</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      {{--  <th>Action</th>  --}}
                    </tr>
                  </thead>
                  <tbody>


                        {!! csrf_field() !!}
                        <input type="hidden" name="tixd" value={{$d->id}}/>
                    
                    @foreach($d->remarks as $data_remark)
                    <input type="hidden" name="id[]" value="{{$data_remark['id']}}"/>

                    <tr>
                      <td>{{$data_remark['id']}}</td>
                      <td><textarea type="text" class="form-control" name="remarks[]">{{$data_remark['remarks']}}</textarea></td>
                      <td>{{$data_remark['created_at']}}</td>
                      <td>{{$data_remark['updated_at']}}</td>
                   

                    </tr>
                    @endforeach
                    @if($d->remarks->isEmpty())
                         <td colspan="5" align="center">
                            <p>Does not have any remarks<p>
                           </td>
                       
                    @else
                    <td colspan="5" align="right">
                            <button class="btn btn-success" type="submit" name="submit">Submit Remarks</button>
                    </td>
                    @endif
                    
                        </tbody>
                      </table>
                    </form>

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
