  @include('common/header')

    <div class="profile-home">
        <img src="{{asset('assets/images/home/Rectangle 619.png')}}" alt="" height="100%" width="100%">
    </div>

    <div class="border-bottom">
        <div class="container ">
            <div class="py-4 d-flex logout justify-content-center gap-5">
                <p class="fs-5 text-secondary fw-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Molestie ultricies <br> pretium, enim id amet,
                    dapibus sit nullam. Vel, facilisi interdum morbi id.</p>
                <div class="profile-btn-group d-flex gap-3" role="group" aria-label="Basic example">
                    <a href="{{url('profile')}}" class="link-light link-offset-2 link-underline-opacity-0"><button type="button"
                        class="btn btn-primary border-0 fw-semibold rounded-0 btn-box">Profile</button></a>
                        <a href="{{url('album')}}" class="link-light link-offset-2 link-underline-opacity-0"><button type="button"
                        class="btn btn-light text-primary rounded-0 border-2 fw-bold border border-primary btn-box1">Album</button></a>
                    <button type="button"
                        class="btn btn-light rounded-0 text-primary fw-bold border-2 border border-primary btn-box1">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <form  method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')
    <div class="container border rounded-4 my-5 px-3 profile-form">

        <div class=" profile-form-bg">
            <img  src="../images/profile-form-images/gallery.png" alt="">
        </div>

        <div class="d-flex profile-edit justify-content-between align-items-center flex-wrap py-5">
            <div class="d-flex profile-name gap-4 align-items-center flex-wrap ">
                <div class="rounded-circle bg-secondary-subtle profile-form-img text-center">
                    <img src="../images/profile-form-images/gallery.png" alt="">
                </div>
                <div class="">
                    <h5 class="text-dark fw-bold">{{$user->name}} </h5>
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-primary px-4 py-2 fw-bold">Edit</button>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="mb-3">
        <label for="firstname" class="form-label fs-6 fw-semibold">First Name</label>
        <input type="text" name="firstname" class="form-control bg-body-tertiary py-3 ps-3 fs-6" id="firstname" 
            aria-describedby="firstnameHelp" placeholder="Your First Name" value="{{ $firstName }}">
    </div>
    @error('firstname') 
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
     @enderror
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">LAST Name</label>
                    <input type="text" class="form-control bg-body-tertiary py-3 ps-3 fs-6" id="exampleInputEmail11"
                        aria-describedby="emailHelp" placeholder="Your First Name" value="{{ $lastName }}">
                </div>
                <div class="mb-1">  
    <label for="gender" class="form-label text-secondary fw-bold fs-6">Gender</label>

    <div class="login-input d-flex gap-2">
        <input class="form-check-input" type="radio" name="gender" value="male" id="flexRadioDefault1" {{ $user->gender == 'male' ? 'checked' : '' }}>
        <label class="form-check-label text-secondary fw-bold fs-6" for="flexRadioDefault1">Male</label>

        <input class="form-check-input ms-2" type="radio" name="gender" value="female" id="flexRadioDefault2" {{ $user->gender == 'female' ? 'checked' : '' }}>
        <label class="form-check-label text-secondary fw-bold fs-6" for="flexRadioDefault2">Female</label>

        <input class="form-check-input ms-2" type="radio" name="gender" value="other" id="flexRadioDefault3" {{ $user->gender == 'other' ? 'checked' : '' }}>
        <label class="form-check-label text-secondary fw-bold fs-6" for="flexRadioDefault3">Other</label>
    </div>
</div>


<div class="mb-3">
              <label for="exampleInputEmail1" class="form-label  text-secondary fw-bold fs-6">Hobbies</label>

              <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-secondary fw-bold fs-6">Hobbies</label>

    <div class="login-input d-flex gap-4">
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Listeningtomusic" id="flexCheckDefault1" {{is_array(old('hobbies')) && in_array('Listeningtomusic' , old('hobbies')) ? 'checked' : ''}} >
                <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault1">
                    Listening to music
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Dancing" id="flexCheckDefault2" {{is_array(old('hobbies')) && in_array('Dancing', old('hobbies')) ? 'checked' : ''}}>
                <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault2">
                    Dancing
                </label>
            </div>
        </div>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Watchingtomovies" id="flexCheckDefault3" {{is_array(old('hobbies')) && in_array('Watchingtomovies' , old('hobbies')) ? 'checked' : ''}}>
                <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault3">
                    Watching to movies
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing" id="flexCheckDefault4" {{is_array(old('hobbies')) && in_array('Singing', old('hobbies')) ? 'checked' : ''}}>
                <label class="form-check-label text-secondary fw-bold" for="flexCheckDefault4">
                    Singing
                </label>
            </div>
        </div>
    </div>
    
</div>









            <div class="col-sm-6">
            <div class="mb-3">
        <label for="country" class="form-label fs-6 fw-semibold">Country</label>
        <input type="text" name="country" class="form-control bg-body-tertiary py-3 ps-3 fs-6" id="country" 
            aria-describedby="countryHelp" placeholder="Your Country"  value="{{$userWithCountry->country}}">
    </div>
               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Address</label>
                <input type="email" class="form-control bg-body-tertiary py-3 ps-3 fs-6" id="exampleInputEmail16"
                    aria-describedby="emailHelp" placeholder="Your First Name">
            </div>
        </div>
        <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save Changes</button>
</div>
</form>
        <div class="py-5 email-heading">
            <h5 class="text-dark fw-bold ">My email Address</h5>
            <div class="d-flex profile-name gap-3 align-items-center flex-wrap pt-3">
                <div class="rounded-circle bg-info-subtle profile-email text-center">
                    <img src="../images/profile-form-images/sms.png" alt="">
                </div>
                <div class="">
                    <p class="text-dark fs-5">{{$user->email}}</p>
                    <p class="text-secondary">{{$user->created_at}}</p>
                </div>
            </div>
     
        </div>
    </div>

    <!-- profile-form section end................................................................................................................... -->

   
@include('common/footer')