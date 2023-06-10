@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">To Do List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">To Do List</a></li>
                                <li class="breadcrumb-item active">To Do List</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <div class="row">


                                <div class="col-sm-12 col-md-12 col-xl-12">
                                    <div class="my-4 text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add To
                                            Do</button>
                                    </div>
                                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                        aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add To Do</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('store.todo') }}" method="POST">
                                                        @csrf
                                                        <label for="">Title</label>
                                                        <input type="text" class="form-control" name="title">
                                                        <hr>
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>



                            </div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div><!-- end row -->


        </div> <!-- container-fluid -->

        <!-- End Page-content -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">



                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer container">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                        style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                        aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @php($i = 1)

                                            @foreach ($todolists as $item)
                                                <tr class="odd">
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        @if ($item->status == 0)
                                                            {{ $item->title }}
                                                        @else
                                                            <p><del class="text-danger">{{ $item->title }}</del></p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 0)
                                                            <a href="{{ route('todo.inactive', $item->id) }}"
                                                                class="btn btn-success btn-sm"><i class="fa fa-check"
                                                                    title="Back Check"></i></a>
                                                        @else
                                                            <a href="{{ route('todo.active', $item->id) }}"
                                                                class="btn btn-primary btn-sm"><i class="fas fa-backspace"
                                                                    title="Check"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                                    <td>
                                                        <a href="{{ route('edit.todo', $item->id) }}">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                        </a>

                                                        <a href="{{ route('delete.todo', $item->id) }}" id="delete">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </a>

                                                    </td>

                                                </tr>
                                            @endforeach







                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
