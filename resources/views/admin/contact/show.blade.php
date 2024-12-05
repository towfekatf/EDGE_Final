@extends("Admin.layouts.master")
@section("title", "View Contact")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Show Contact</h1>
            <a href="{{ route("admin.contact.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Contact</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route("admin.contact.update", $contact->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ $contact->name }}" name="name" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" value="{{ $contact->phone }}" name="phone" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right font-weight-bold">Email *</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" value="{{ $contact->email }}" name="email" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label text-right font-weight-bold">Address</label>
                        <div class="col-sm-6">
                            <textarea name="address" id="address" class="form-control" disabled>{{ $contact->address }}</textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label text-right font-weight-bold">Description *</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control" disabled>{{ $contact->description }}</textarea>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
@endsection
