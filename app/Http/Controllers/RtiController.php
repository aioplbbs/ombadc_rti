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
        $this->middleware('permission:create rti')->only(['create', 'store', 'document']);
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
        return redirect()->route('rti.document.index', ['id'=>$rti->id])->with('success', 'RTI Applied successfully');
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
        if(!in_array($rti->status, ["Approve", "Reject", "Responded", "In Process"])){
            $rti->status = "In Process";
            $rti->update();
        }
        return view('rti.show', compact('rti'));
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

    public function document($id, Request $request)
    {
        $rti = Rti::findOrFail($id);

        if ($request->isMethod('post')) {

            $request->validate([
                'identity' => 'required|image|max:2048',
                'challan' => 'required|image|max:2048',
            ]);

            // Store in Spatie Media Library
            if ($request->hasFile('identity')) {
                $rti->addMediaFromRequest('identity')
                    ->toMediaCollection('identity_documents');
            }

            if ($request->hasFile('challan')) {
                $rti->addMediaFromRequest('challan')
                    ->toMediaCollection('challan_documents');
            }

            $rti->status = "Submitted";
            $rti->update();
            
            return redirect()->route('rti.index')->with('success', "Document Uploaded Successfully.");
        }

        return view('rti.document', compact('rti'));
    }
}