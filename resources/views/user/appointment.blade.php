<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" method="post" action="{{route('add_appointment')}}">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input name="first_name" type="text" class="form-control" placeholder="Firs name">
                    @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input name="last_name" type="text" class="form-control" placeholder="Last name">
                    @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input name="date" type="date" class="form-control">
                    @error('date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="departement" class="custom-select">
                        @foreach($doctors as $doctor)
                        <option value="{{$doctor->name}}">{{$doctor->name}}</option>
                        @endforeach
                    </select>
                    @error('doctor')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input name="phone" type="text" class="form-control" placeholder="Number..">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                    @error('message')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div>