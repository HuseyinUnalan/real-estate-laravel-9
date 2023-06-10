@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Ev Listesi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ev İşlemleri </a></li>
                                <li class="breadcrumb-item active">Ev Listesi</li>
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



                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Başlık</th>
                                                    <th>Fiyat</th>
                                                    <th>Yayın Durumu</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($houses as $item)
                                                    <tr class="odd">
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>
                                                            @if ($item->activity_status == 1)
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Yayında
                                                                </div>
                                                            @else
                                                                <div class="font-size-13"><i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-danger align-middle me-2"></i>
                                                                    Yayında Değil
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('add.house.photo', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-images"></i>
                                                                </button>
                                                            </a>


                                                            <a href="{{ route('edit.house', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('delete.house', $item->id) }}" id="delete">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </a>

                                                            @if ($item->activity_status == 1)
                                                                <a href="{{ route('house.inactive', $item->id) }}"
                                                                    class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-arrow-down"
                                                                        title="Inactive Now"></i></a>
                                                            @else
                                                                <a href="{{ route('house.active', $item->id) }}"
                                                                    class="btn btn-success btn-sm"><i class="fa fa-arrow-up"
                                                                        title="Active Now"></i></a>
                                                            @endif

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








        </div> <!-- container-fluid -->
    </div>
@endsection
