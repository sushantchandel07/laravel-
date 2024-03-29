@include('common/header')
<div class="profile-home">
    <img src="{{asset('assets/images/home/Rectangle 619.png')}}" alt="" height="100%" width="100%">
</div>


<div class="border-bottom">
    <div class="container">
        <div class="py-4 d-flex logout justify-content-center gap-5">
            <p class="fs-5 text-secondary fw-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Molestie ultricies <br> pretium, enim id amet,
                dapibus sit nullam. Vel, facilisi interdum morbi id. </p>
            <div class="profile-btn-group d-flex gap-3" role="group" aria-label="Basic example">
                <a href="{{url('profile')}}" class="link-light link-offset-2 link-underline-opacity-0"><button type="button" class="btn btn-primary border-0 fw-semibold rounded-0 btn-box">Profile</button></a>
                <a href="{{url('album')}}" class="link-light link-offset-2 link-underline-opacity-0"><button type="button" class="btn btn-light text-primary rounded-0 border-2 fw-bold border border-primary btn-box1">Album</button></a>
                <button type="button" class="btn btn-light rounded-0 text-primary fw-bold border-2 border border-primary btn-box1">Logout</button>
            </div>
        </div>
    </div>
</div>

<div class=" container">

    <div class="row row-cols-1 row-cols-md-3 g-4 flex-wrap detail-col">

        <div class="col-sm-6 col-md-12 col-lg-5 mb-3 mb-sm-0 detail-row">
            <div class="card bg-body-tertiary d-flex justify-content-center align-items-center py-5 h-100">
            <img style="width:30% ; border-radius:100%;" src="{{ asset($user->profileimage) }}" alt="Profile Image">

    
                
               <form method="POST" action="/profile" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="profileimage">
                    <!-- Other fields -->
                    <button type="submit">Update Profile</button>
               </form>
                <div class="card-body text-center">
                    <h2 class="text-dark fw-semibold">{{$user->name}}</h2>
                    <p class="fw-bold fs-5">Email- {{ $user->email }}</p>
                  
                    <a href="{{url('/profile/edit')}}"><button type="button" class="btn btn-primary rounded-0 fs-5">Edit</button></a>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-12 col-lg-7 detail-row">
            <div class="card bg-body-tertiary p-5 h-100">
                <div class="row flex-wrap flex">
                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">First Name</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">{{$firstName}}</div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Last Name</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">{{$lastName}}</div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Gender</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">{{$user->gender}}</div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Country</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">{{$userWithCountry->country}}
                        
                    </div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Email</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">{{ $user->email }}</div>

                    <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Hobbies</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg fw-semibold text-dark">
                    @php
                        $hobbies = json_decode($user->hobbies);
                    @endphp
                    @if ($hobbies)
                        @foreach ($hobbies as $hobby)
                            {{ $hobby }}
                        @endforeach
                    @else
                        No hobbies found.
                    @endif
                    </div>
                    <!-- <div class="col-6 col-sm-4 col-md-6 col-lg-4 fs-5 lh-lg fw-semibold text-dark">Address</div>
                    <div class="col-6 col-sm-4 col-md-6 col-lg-8 fs-5 lh-lg  fw-semibold text-dark">2020 Lorem ipsum
                        dolor sit amet DE 19080
                    </div>
                </div> -->

            </div>

        </div>
    </div>
</div>
</div>

@include('common/footer')


