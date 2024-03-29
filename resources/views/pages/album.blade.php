@include('common/header')

<div class="profile-home">
    <img src="{{asset('assets/images/home/Rectangle 619.png')}}" alt="" height="100%" width="100%">
</div>


<div class="border-bottom">
    <div class="container ">
        <div class="py-4 d-flex logout justify-content-center gap-5">
            <p class="fs-5 text-secondary fw-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Molestie ultricies <br> pretium, enim id amet,
                dapibus sit nullam. Vel, facilisi interdum morbi id. </p>
            <div class="profile-btn-group d-flex gap-3" role="group" aria-label="Basic example">
                <a href="{{url('profile')}}" class="link-light link-offset-2 link-underline-opacity-0"><button type="button" class="btn btn-primary border-0 fw-semibold rounded-0 btn-box">Profile</button></a>
                <a href="" class="link-light link-offset-2 link-underline-opacity-0"><button type="button" class="btn btn-light text-primary rounded-0 border-2 fw-bold border border-primary btn-box1">Album</button></a>
                <button type="button" class="btn btn-light rounded-0 text-primary fw-bold border-2 border border-primary btn-box1">Logout</button>
            </div>
        </div>
    </div>
</div>


<div class="center">
    <div class="container my-5 py-5 border rounded-4">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fs-6 fw-semibold">Album Name</label>
                <input type="text" class="form-control bg-body-tertiary py-3 ps-3 fs-6 " id="exampleInput" placeholder="Enter Your Album Name">
            </div>

            <div class="mb-3">
                <label for="formFileLg" class="form-label">Large file input example</label>
                <input class="form-control form-control-lg " id="formFileLg" type="file">
            </div>

            <button type="submit" class="btn btn-primary my-3 rounded-0 px-5 py-2">Upload</button>
            <p class="text-dark fw-bolder">Upload image will be resized to fit within: <br>
                Width of 500 pixels and Height of 500 Pixels</p>
        </form>
    </div>
</div>


@include('common/footer')
