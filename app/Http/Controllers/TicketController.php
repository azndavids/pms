<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Remark;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::all();
        return view('ticket.index',compact('tickets'));
    }

    public function remarks($ticket)
    {
      // dd($ticket);

      $data = Ticket::where('id', '=', $ticket)->with('remarks')->get();
       // $ranks = Log::with('events')->get();
      // dd($data);
      return view('ticket.remarks', compact('data'));
    }

    public function add(Request $request)
    {

      // dd($request->all());
      $remark= new Remark;
      $remark->remarks = $request->get('remarks');
      $remark->ticket_id = $request->get('ticket_id');

      $remark->save();

      $id=$request->get('ticket_id');


      return redirect()->route('ticket.remarks',$id)->with(['alert-msg' => 'Remarks added successfully', 'alert-type' => 'success']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



        $data = $request->all();
        // dd($data);
        $tickets= new Ticket;

        $tickets->customer_name=$request->get('customer_name');
        $tickets->log_date=$request->get('log_date');
        $tickets->target_date=$request->get('target_date');
        $tickets->completed_date=$request->get('completed_date');
        $tickets->status=$request->get('status');
        $tickets->created_by=$request->get('created_by');
        $tickets->problem_log=$request->get('problem_log');
        $tickets->problem_title=$request->get('problem_title');
        $tickets->product=$request->get('product');
        $tickets->circuit_number=$request->get('circuit_number');
        $tickets->ctt=$request->get('ctt');
        $tickets->responsible_team=$request->get('responsible_team');
        $tickets->category=$request->get('category');
        $tickets->priority=$request->get('priority');

        $tickets->save();


        return redirect()->route('tickets.index')->with(['alert-msg' => 'Ticket created successfully', 'alert-type' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $ticket= new \App\Passport;
        $ticket->name=$request->get('name');
        $ticket->email=$request->get('email');
        $ticket->number=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $ticket->date = strtotime($format);
        $ticket->office=$request->get('office');
        $ticket->filename=$name;
        $ticket->save();

        return redirect('tickets')->with(['alert-msg' => 'successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ticket)
    {
      $data = Ticket::where('id', '=', $ticket)->with('remarks')->get();
       // $ranks = Log::with('events')->get();
      // dd($data);
      return view('ticket.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      // dd($request->get('tid'));

        $tickets = Ticket::find($request->get('tid'));

        $tickets->customer_name=$request->get('customer_name');
        $tickets->log_date=$request->get('log_date');
        $tickets->target_date=$request->get('target_date');
        $tickets->completed_date=$request->get('completed_date');
        $tickets->status=$request->get('status');
        $tickets->created_by=$request->get('created_by');
        $tickets->problem_log=$request->get('problem_log');
        $tickets->problem_title=$request->get('problem_title');
        $tickets->product=$request->get('product');
        $tickets->circuit_number=$request->get('circuit_number');
        $tickets->ctt=$request->get('ctt');
        $tickets->responsible_team=$request->get('responsible_team');
        $tickets->category=$request->get('category');
        $tickets->priority=$request->get('priority');

        $tickets->save();

        $id=$request->get('tid');

        return redirect()->route('ticket.edit',$id)->with(['alert-msg' => 'Ticket updated successfully', 'alert-type' => 'success']);

    }

    public function updateremark(Request $request)
    {

        // dd($request->all());

        $id=$request->get('id');
        $rem=$request->get('remarks');

        $count = 0;
        foreach($id as $i)
        {
            $remark = Remark::find($i);
            $remark->remarks = $rem[$count];
            $remark->save();

            $count++;
        }

        // $tickets = App\Ticket::find($request->get('ticket_id'));
        // $tickets->save();

        // $id=$request->get('ticket_id');
        $tid=$request->get('tixd');

        return redirect()->route('ticket.edit',$tid)->with(['alert-msg' => 'Remark updated successfully', 'alert-type' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
         {
             
             $ticket =Ticket::find($id);
             $ticket->delete();
             return redirect('tickets')->with(['alert-msg' => 'Deleted successfully', 'alert-type' => 'success']);
         }
         public function destroyremark($id)
         {
             dd($id);
             $remark =Remark::find($id);
             $remark->delete();
             return redirect('tickets')->with(['alert-msg' => 'Deleted successfully', 'alert-type' => 'success']);
         }
}
