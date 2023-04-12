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
             @if ($users)
                 @foreach ($users as $key => $user)
                     <tr>
                         <th scope="row">{{ $key + 1 }}</th>
                         <td>
                             <img src="{{ asset('/public/image/' . $user->image . '') }}" alt="profile Pic" height="200"
                                 width="200">
                         </td>
                         j
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->phone }}</td>
                         <td>{{ $user->email }}</td>
                     </tr>
                 @endforeach
             @endIf
         </tbody>
     </table>
 </div>
