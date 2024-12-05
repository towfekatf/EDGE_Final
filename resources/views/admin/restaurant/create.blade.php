@extends("Admin.layouts.master")
@section("title", "Create restaurant")
@section("content")
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create restaurant</h1>
            <a href="{{ route("Admin.restaurant.index") }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-eye fa-sm text-white-50"></i> restaurant</a>
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
                <form action="{{ route("Admin.restaurant.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label text-right font-weight-bold">Name *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" value="{{ old("name") }}"
                                   name="name"
                                   autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact_info" class="col-sm-3 col-form-label text-right font-weight-bold">Contact Info *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="contact_info" value="{{ old("contact_info") }}"
                                   name="contact_info">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="operating_hours" class="col-sm-3 col-form-label text-right font-weight-bold">Operating Hours *</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="operating_hours" value="{{ old("operating_hours") }}"
                                   name="operating_hours">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="address"
                               class="col-sm-3 col-form-label text-right font-weight-bold">Address *</label>
                        <div class="col-sm-6">
                            <textarea name="address" id="address" class="form-control">{{ old("address") }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_available" class="col-sm-3 col-form-label text-right font-weight-bold"></label>
                        <div class="col-sm-6">
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available">
                            <label class="form-check-label font-weight-bold" for="is_available"> Is Available</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#detail',  // Use textarea as the editor
            height: 300,           // Set the height of the editor
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
            menubar: false,
        });
    </script>

@endpush
