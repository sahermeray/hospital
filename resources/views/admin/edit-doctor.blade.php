@extends('admin.main')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
@section('content')
    <div class="pagetitle">
        <h1>Edit Doctor</h1>
    </div>

    @if(Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    <section class="section dashboard">
        <form method="post" action="{{route('update_doctor',$doctor->id)}}" enctype="multipart/form-data">
            @csrf
            <input name="id" value="{{$doctor->id}}" type="hidden">
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Name</label>
                <input value="{{$doctor->name}}" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Phone</label>
                <input value="{{$doctor->phone}}" name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Ente phone">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Room</label>
                <input value="{{$doctor->room}}" name="room" type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter room">
                @error('room')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Select Speciality</label>
                <select name="speciality" class="form-control" id="exampleFormControlSelect1">
                    <option @if($doctor->speciality == "Heart") selected @endif>Heart</option>
                    <option @if($doctor->speciality == "Skin") selected @endif>Skin</option>
                    <option @if($doctor->speciality == "Eye") selected @endif>Eye</option>
                    <option @if($doctor->speciality == "Nose") selected @endif>Nose</option>
                </select>
                @error('speciality')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlFile1">Doctor Image</label>
                <img src="/doctorsImages/{{$doctor->image}}" style="width: 100px;height: 70px">
                <br>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                <br>
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection