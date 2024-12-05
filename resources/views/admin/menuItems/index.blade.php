@extends('Admin.layouts.master')
@section('title', 'MenuItems')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu Items</h1>
            <a href="{{ route('admin.menuItems.create') }}"
               class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i>Create Menu Items</a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th style="width: 100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuItems as $i => $menuItem)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $menuItem->name }}</td>
                                <td>{{ $menuItem->price }}</td>
                                <td>
                                    @if ($menuItem->image)
                                        <img src="{{ asset("storage/uploads/menuItems/$menuItem->image") }}" width="100" alt="">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.menuItems.show', $menuItem->id) }}" class="btn btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.menuItems.edit', $menuItem->id) }}" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('admin.menuItems.destroy', $menuItem->id) }}" method="post" class="d-inline">
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
