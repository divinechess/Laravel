<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Hi.. <b> {{ Auth::user()->name }}</b>
                <b style="float:right">Total users
                <span>{{ count($users) }}  </span>
                </b>

        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
           <div class="row">
               <table class="table">
                   <thead>
                   <tr>
                       <th scope="col">S No</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Created at</th>
                   </tr>
                   </thead>
                   <tbody>

                   @php ($i = 1)
                        @foreach($users as $row)
                   <tr>
                       <th scope="row">{{ $i++ }}</th>
                       <td>{{ $row->name }}</td>
                       <td>{{ $row->email }}</td>
                       <td>{{ Carbon\Carbon::parse( $row->created_at)->diffForHumans() }}</td>
                   </tr>
                        @endforeach

                   </tbody>
               </table>
           </div>

       </div>
    </div>
</x-app-layout>
