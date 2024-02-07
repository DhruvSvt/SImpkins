<?php

namespace App\Http\Controllers;

use App\Models\ClassSchool;
use App\Models\ClassSection;
use App\Models\MessageTemplate;
use App\Models\Parents;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassSchool::all();
        $template = MessageTemplate::all();
        return view('message.message', compact('classes', 'template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'template_id' => 'required',
            'class_id' => 'required',
            'msg' => 'required'
        ]);

        $template_message = $request->msg;

        $class_section_ids = ClassSection::where('class_id', $request->class_id)->pluck('id');
        $father_ids = Students::whereIn('class_section_id', $class_section_ids)->pluck('father_id');
        $mobile_numbers = Parents::whereIn('id', $father_ids)->pluck('mobile')->toArray();
        $mobile_numbers_string = implode(',', $mobile_numbers);

        // $response = Http::get('http://sms.a2pservices.in/api/mt/SendSMS', [
        //     'user' => env('SMS_USER'),
        //     'password' => env('SMS_PASSWORD'),
        //     'senderid' => env('SMS_SENDER_ID'),
        //     'channel' => 'Trans',
        //     'DCS' => 0,
        //     'flashsms' => 0,
        //     'number' => '916397646784',
        //     'text' => $template_message,
        //     'route' => '##',
        //     'PEId' => '##',
        // ]);

        // $response = Http::get('http://sms.a2pservices.in/api/mt/SendSMS?user=simpkins&password=Karan@15&senderid=SMPKNS&channel=Trans&DCS=0&flashsms=0&number=916397646784&text='.$template_message.'message&route=20');
        $response = Http::get('http://sms.a2pservices.in/api/mt/SendSMS?user=simpkins&password=Karan@15&senderid=SMPKNS&channel=Trans&DCS=0&flashsms=0&number=916397646784&text='.$template_message.'&route=20');

        if ($response->successful()) {
            // Success: Handle successful response
            return response()->json([
                'message' => 'Message sent successfully'
            ]);
        }
        if ($response->failed()) {
            // Error: Handle error response
            $errorData = $response->json();
            Log::error('Error occurred while sending message: ' . json_encode($errorData));
            // Return an appropriate error response
            return response()->json([
                'error' => 'Error occurred while sending message',
                'message' => 'Unknown error occurred'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $selectedOption)
    {
        $id = $request->selectedOption;
        $template = MessageTemplate::findOrFail($id);
        $template_message = $template->template;
        return response()->json([
            'template_message' => $template_message
        ]);
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
        //
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
    }
}
