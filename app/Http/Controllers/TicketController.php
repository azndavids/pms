<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Remark;

use Session;

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


        return redirect()->route('tickets.index')->with(['alert-msg' => 'Even registered successfully', 'alert-type' => 'success']);
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

        return redirect('tickets')->with('success', 'Information has been added');
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
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // $this->validate($request, [
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);

        $input = $request->except(['_token','_method','submit']);

        $ticket->fill($input)->save();
        // dd($request->all());
        // Ticket::where('id', $ticket)->update($request->except(['_token','_method','submit']));

       

        Session::flash('flash_message', 'Ticket successfully updated!');
        return redirect()->back();
        // return Redirect::to('tickets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ticket =Ticket::find($id);
        $ticket->delete();
        return redirect('tickets')->with('success','Information has been  deleted');
    }
}
