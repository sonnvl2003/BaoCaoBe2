@extends('dashboard')
@section('content')
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <button class="btn btn-secondary">
                    <img src="{{ asset('/public/image/' . $user->image . '') }}" alt="{{ $user->image }}" height="100" width="100" />
                </button>
                <span class="name mt-3">{{ $user->name }}</span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="idd1">{{ $user->email }}</span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">1069 <span
                            class="follow">{{ $user->phone }}</span></span> </div>
                <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Edit Profile</button> </div>
            </div>
        </div>
    </div>
@endsection
