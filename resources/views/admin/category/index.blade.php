<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories <b></b>


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        <div class="card-header">All Categories</div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">S No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- @php($i = 1) --}}
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user->name }}</td>
                            @if($category->created_at == NULL)
                                <td><span class="text-danger">No date set</span></td>
                            @else
                            <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>

                            @endif
                            <td>
                            <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $categories->links() }} {{--  variable called outside the table --}}
                        </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                        <form action="{{route('store.category')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                @error('category_name')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror

                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>


{{--Trash section --}}
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trash List</div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">S No</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- @php($i = 1) --}}
                            @foreach($trashCat as $category)
                                <tr>
                                    <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    @if($category->created_at == NULL)
                                        <td><span class="text-danger">No date set</span></td>
                                    @else
                                        <td>{{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}</td>

                                    @endif
                                    <td>
                                        <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
                                        <a href="{{ url('permdelete/category/'.$category->id) }}" class="btn btn-danger"> Perm Delete</a>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        {{ $trashCat->links() }} {{--  variable called outside the table --}}
                    </div>

                </div>

                <div class="col-md-4">


                </div>

            </div>

        </div>

{{--End Trash section--}}

    </div>
</x-app-layout>
