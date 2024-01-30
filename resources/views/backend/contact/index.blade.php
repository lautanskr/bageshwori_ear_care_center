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
                        <h1>Contact</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="m-4">
            
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
                                <h3 class="card-title">Message</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Published Date</th>
                                            <th>Document</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($messages as $list)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="badge badge-danger m-2 p-3">{{ $list->published_date }}</td>
                                                <td>
                                                    @isset($list->document)
                                                        <a href="{{route('admin_notice.show',$list->id)}}" target="_blank"><img src="/documents/logo/document_logo.png" height="40"
                                                            width="40" alt=""></a>
                                                    @endisset
                                                </td>
                                                <td>{!! $list->description !!}</td>
                                                <td>
                                                    <form action="{{ route('admin_notice.destroy', $list->id) }}"
                                                        method="POST" enctype="multipart/form-data">

                                                        <a class="btn btn-info" target="_blank"
                                                            href="{{ route('admin_notice.show', $list->id) }}"><i
                                                                style='font-size:15px' id="view"
                                                                class='fas'>&#xf06e;</i></a>

                                                        <a class="btn btn-primary"
                                                            href="{{ route('admin_notice.edit', $list->id) }}"><i
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
