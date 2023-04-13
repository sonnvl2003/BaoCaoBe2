@if (isset($panigation))
    <div class="container">
        <h1 class="text-center my-5">List Of Users</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($panigation as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <img src="{{asset('image/'. $user->image .'')}}" alt="profile Pic" height="100"
                                width="100">
                        </td>
                        <td><a href="http://127.0.0.1:8000/user/{{$user->id}}">{{ $user->name }}</a></td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @extends('auth.paginationUser')
    </div>
@endIf
