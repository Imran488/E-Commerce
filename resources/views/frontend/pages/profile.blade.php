@extends('frontend.master')
@section('contents')
    <section class="user-profile">
        <div class="container">
            <h2 class="text-center pt-3 text-capitalize"><u>Account of {{ $user->name }}</u></h2>
            <!-- Message -->
            @if(session()->has('error'))
            <p class="alert alert-danger text-center">{{ session()->get('error') }}</p>
            @endif
            @if(session()->has('message'))
            <p class="alert alert-success text-center">{{ session()->get('message') }}</p>
            @endif
            <!-- end -->

            <!-- user details -->
            <div class="user_image d-flex justify-content-center ">
                <img src="{{ asset('/uploads/users/'.$user->image ) }}" style="height: 150px;width:150px;">
                <div style="margin-left:20px;">
                     Name: {{ $user->name }}<br>
                     E-mail: {{ $user->email }}<br>
                     Phone: {{ $user->phone }}<br>
                     Address: {{ $user->address }}<br>
                </div>
            </div>
            <br>
            <div class="change_image text-center" style="margin-right: 200px;">
                <a href="{{ route('user.change.profile.image',$user->id) }}" class="btn btn-primary">uploads</a>
                <a href="{{ route('user.edit.profile',$user->id) }}" class="btn btn-secondary">Edit profile</a>
            </div>

            <br><br>

            <!-- desktop design -->
            <div class="desktop_design">
                {{-- <nav>
                    <div class="nav nav-tabs nav-fill text-uppercase" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="user_details-tab" data-toggle="tab" href="#user_details" role="tab" aria-controls="user_details" aria-selected="true"><h5>My Information</h5></a>
                    </div>
                </nav> --}}

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
