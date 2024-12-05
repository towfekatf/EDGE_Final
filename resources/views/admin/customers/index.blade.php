@extends("Admin.layouts.master")
@section("title", "Customers")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customers</h1>
            <a href="{{ route("admin.customers.create") }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Create Customers
            </a>
        </div>

        @if (session()->has("success"))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("success") }}
            </div>
        @endif

        @if (session()->has("error"))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session("error") }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $i => $customer)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @if (file_exists(public_path("storage/uploads/customers/$customer->image")) && !empty($customer->image))
                                        <img src="{{ asset("storage/uploads/customers/$customer->image") }}" width="80" alt="">
                                    @else
                                        <img src="{{ asset("customer.png") }}" width="80" alt="Placeholder">
                                    @endif
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                   <td>

                                       <a href="{{ route("admin.customers.show", $customer->id) }}" class="btn btn-sm"><i class="fa fa-eye"></i></a>
                                       <a href="{{ route("admin.customers.edit", $customer->id) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                       <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="post" class="d-inline">
                                           @csrf
                                           @method('DELETE')
                                           <button class="btn btn-sm" onclick="return confirm('Are you sure to delete?')">
                                               <i class="fa fa-trash"></i>
                                           </button>
                                       </form>
                                   </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
