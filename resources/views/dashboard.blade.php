<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


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
                        @foreach($users as $row)
                   <tr>
                       <th scope="row">1</th>
                       <td>{{$row->name}}</td>
                       <td>{{$row->email}}</td>
                       <td>{{$row->created_at}}</td>
                   </tr>
                        @endforeach

                   </tbody>
               </table>
           </div>

       </div>
    </div>
</x-app-layout>
