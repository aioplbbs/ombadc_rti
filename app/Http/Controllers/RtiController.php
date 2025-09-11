<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RtiRequest;
use App\Jobs\SendRtiResponseJob;
use App\Models\Rti;
use App\Models\Respond;

class RtiController extends Controller
{
    public function __construct()
    {
        // Protect entire controller
        $this->middleware('permission:view rti')->only(['index']);
        $this->middleware('permission:create rti')->only(['create', 'store']);
        $this->middleware('permission:update rti')->only(['edit', 'update', 'statusUpdate']);
        $this->middleware('permission:delete rti')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rti = Rti::paginate(20);
        return view('rti.index', compact('rti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RtiRequest $request)
    {
        $data = $request->all();
        $data["permanent_address"] = [
            "address1" => $request['address1'],
            "address2" => $request['address2'],
            "city" => $request['city'],
            "state" => $request['state'],
            "country" => "INDIA",
            "pincode" => $request['pincode'],
        ];
        $data["request_information"] = [
            "subject" => $data['subject'],
            "period_from" => $data['period_from'],
            "period_to" => $data['period_to'],
            "description" => htmlspecialchars(strip_tags($data['description'])),
        ];
        $data['concent'] = [
            "place" => $data["place"],
            "date" => $data['date']
        ];
        $data['user_id'] = auth()->user()->id;
        $rti = new Rti($data);
        $rti->save();
        return redirect()->route('rti.index')->with('success', 'RTI Applied successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rti = Rti::find($id);
        return view('rti.show', compact('rti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role Deleted successfully');
    }

    public function statusUpdate($id, Request $request)
    {
        $rti = Rti::find($id);
        $rti->status = $request->status;
        $rti->update();
        $msg = 'RTI Successfully '.$request->status;
        return redirect()->route('rti.index')->with('success', $msg);
    }

    public function respond($id, Request $request)
    {
        $rti = Rti::findOrFail($id);

        if ($request->isMethod('post')) {
            // dd($request->all());
            $data = $request->all();
            $data['rti_id'] = $rti->id;
            $respond = new Respond($data);
            $respond->save();
            $rti->status = "Responded";
            $rti->update();
            SendRtiResponseJob::dispatch($respond)->delay(now()->addMinute());
            $msg = "Response is sent to ".$rti->full_name;
            return redirect()->route('rti.index')->with('success', $msg);
        }

        return view('rti.respond', compact('rti'));
    }
}
