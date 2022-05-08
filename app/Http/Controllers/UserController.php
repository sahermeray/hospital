<?php

namespace App\Http\Controllers;


use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addAppointment(AppointmentRequest $request){
     if(Auth::id()){
         $appointment = new Appointment();
         $appointment->first_name = $request->first_name;
         $appointment->last_name = $request->last_name;
         $appointment->date = $request->date;
         $appointment->doctor = $request->doctor;
         $appointment->phone = $request->phone;
         $appointment->message = $request->message;
         $appointment->user_id = Auth::id();
         $appointment->save();
         return redirect()->back()->with(['success'=>'appointment has been added successfully']);
     }else{
         return redirect()->back()->with(['error'=>'you must login to add an appointment']);
     }
    }

    public function myAppointments($id){
        $appointments = Appointment::where('user_id',$id)->get();
        return view('user.my-appointments',compact('appointments'));
    }

    public function deleteAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back()->with(['success'=>'appointment has been deleted suuccessfully']);
    }

}
