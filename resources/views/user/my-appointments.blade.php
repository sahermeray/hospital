<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.css')
</head>
<body>

@include('user.header')
<div class="pagetitle" style="padding-top:30px;padding-bottom: 30px;padding-left: 120px">
    <h1>My Appointments</h1>
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
</div>

<section class="section dashboard"style="padding-left:120px;padding-right: 120px">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Doctor</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{$appointment->first_name}}</td>
                <td>{{$appointment->last_name}}</td>
                <td>{{$appointment->phone}}</td>
                <td>{{$appointment->doctor}}</td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->status}}</td>
                <td>
                    <a class="btn btn-danger" href="{{route('delete_appointment',$appointment->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>

@include('user.footer')
@include('user.script')
</body>
</html>