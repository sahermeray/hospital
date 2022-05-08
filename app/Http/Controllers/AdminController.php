<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addDoctorView()
    {
        return view('admin.add-doctor');
    }

    public function addDoctor(DoctorRequest $request)
    {
        try {
            $image = $request->image;
            $imageNmae = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('doctorsImages', $imageNmae);
            $doctor = new Doctor();
            $doctor->image = $imageNmae;
            $doctor->name = $request->name;
            $doctor->room = $request->room;
            $doctor->speciality = $request->speciality;
            $doctor->phone = $request->phone;
            $doctor->save();
            return redirect()->back()->with(['success' => 'Doctor has been added successfully']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'there is a problem']);
        }
    }

    public function doctors(){
        $doctors = Doctor::all();
        return view('admin.doctors',compact('doctors'));
    }

    public function deleteDoctor($id){
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->back()->with(['success' => 'Doctor has been deleted successfully']);
    }

    public function editDoctor($id){
        $doctor = Doctor::find($id);
        return view('admin.edit-doctor',compact('doctor'));
    }

    public function updateDoctor($id,DoctorRequest $request){
        try {
            $doctor = Doctor::find($id);
            if ($request->has('image')) {
                $image = $request->image;
                $imageNmae = time() . '.' . $image->getClientOriginalExtension();
                $image->move('doctorsImages', $imageNmae);
                $doctor->image = $imageNmae;
            }
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->room = $request->room;
            $doctor->speciality = $request->speciality;
            $doctor->save();
            return redirect()->back()->with(['success' => 'doctor has been updated succesfully']);
        }catch (\Exception $ex){
            return redirect()->back()->with(['error' => 'there is a problem']);
        }
    }

    public function appointments(){
        $appointments = Appointment::all();
        return view('admin.appointments',compact('appointments'));
    }

    public function cancelAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'canceled';
        $appointment->save();
        return redirect()->back()->with(['success'=>'appointment canceled successfully']);
    }

    public function approveAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'approved';
        $appointment->save();
        return redirect()->back()->with(['success'=>'appointment approved successfully']);
    }
}
