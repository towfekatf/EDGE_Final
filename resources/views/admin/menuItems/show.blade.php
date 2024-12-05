@extends("Admin.layouts.master")
@section("title", "View Menu Item Show")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">show Menu Item</h1>
            <a href="{{ route("admin.menuItems.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Menu Item</a>
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
                <form action="{{ route("admin.menuItems.update", $menuItem->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="form-group row">
                        <label for="category_id" class="col-sm-3 col-form-label text-right font-weight-bold">Category *</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="category_id" name="category_id" disabled>
                                <option value="" selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $menuItem->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ $menuItem->name }}" name="name" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-sm-3 col-form-label text-right font-weight-bold">Slug *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="slug" value="{{ $menuItem->slug }}" name="slug" disabled>
                        </div>
                    </div>





                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold"> Image</label>
                        <div class="col-sm-6">
                            <img src="{{ asset("storage/uploads/menuItems/$menuItem->image") }}" width="120" alt="{{ $menuItem->image }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Image</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="image" name="image" disabled>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="price"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Price *</label>
                        <div class="col-sm-6">
                            <input type="number" name="price" id="price" class="form-control" value="{{$menuItem->price }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" {{ $menuItem->is_available ? 'checked' : '' }} disabled>
                            <label class="form-check-label font-weight-bold" for="is_available"> Is Available</label>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
@endsection
