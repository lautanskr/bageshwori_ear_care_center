@extends('backend.layout')
@section('title', 'Notice')
@section('backend_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Program</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Program</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="m-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-info">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('deleted'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of program</h3>
                                <a href="{{ route('admin_program.create') }}" class="btn btn-primary float-right"> <i
                                        class="fa fa-plus"></i> Add Program</a>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Published Date</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($programs as $list)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $list->created_at }}</td>
                                                <td>
                                                    <img src="/documents/programs/{{ $list->image }}" height="40"
                                                        width="40" alt="">
                                                </td>
                                                <td>{{ $list->title }}</td>
                                                <td>{!! Str::limit($list->description,100) !!}</td>
                                                <td>
                                                    <form action="{{ route('admin_program.destroy', $list->id) }}"
                                                        method="POST" enctype="multipart/form-data">

                                                        
                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin_program.edit', $list->id) }}"><i
                                                                style='font-size:15px' id="edit"
                                                                class='fas'>&#xf044;</i></a>

                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure want to delete?')"><i
                                                                style='font-size:15px' class='fas'>&#xf1f8;</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
