@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>



                    </div>
                </div>
            </div>
            <!-- end page title -->

            @php
                use Illuminate\Support\Facades\DB;
                
                $blog = DB::table('blogs')->count();
                $message = DB::table('messages')->count();
                $housemessage = DB::table('house_messages')->count();
                $service = DB::table('services')->count();
                $team = DB::table('teams')->count();
                $slider = DB::table('sliders')->count();
                $gallery = DB::table('galleries')->count();
                $faq = DB::table('faqs')->count();
                $testimonial = DB::table('testimonials')->count();
                $client = DB::table('clients')->count();
                $social = DB::table('socials')->count();
                
            @endphp

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Ev Mesajları</p>
                                    <h4 class="mb-2">{{ $housemessage }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-envelope font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Mesaj</p>
                                    <h4 class="mb-2">{{ $message }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-envelope font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Blog</p>
                                    <h4 class="mb-2">{{ $blog }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-pen-nib-fill font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Hizmet</p>
                                    <h4 class="mb-2">{{ $service }}</h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-honour-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Referans</p>
                                    <h4 class="mb-2">
                                        <h4 class="mb-2">{{ $client }}</h4>
                                    </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="ri-team-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">SSS</p>
                                    <h4 class="mb-2">
                                        <h4 class="mb-2">{{ $faq }}</h4>
                                    </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-question font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Müşteri Yorumu</p>
                                    <h4 class="mb-2">
                                        <h4 class="mb-2">{{ $testimonial }}</h4>
                                    </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-user-plus font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Sosyal Medya</p>
                                    <h4 class="mb-2">
                                        <h4 class="mb-2">{{ $social }}</h4>
                                    </h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="far fa-thumbs-up font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



            @php
                $messages = DB::table('messages')
                    ->latest()
                    ->get();
            @endphp


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <h5>Mesajlar</h5>
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
                                                    <th>Ad Soyad</th>
                                                    <th>E-mail</th>
                                                    <th>Okunma Durumu</th>
                                                    <th>Tarih</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                @php($i = 1)

                                                @foreach ($messages as $item)
                                                    <tr class="odd">


                                                        <td> {{ $i++ }}</td>
                                                        <td>{{ $item->name }} </td>
                                                        <td>
                                                            @if ($item->read_status == 0)
                                                                <div class="font-size-13">
                                                                    <i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>
                                                                    Okunmamaış
                                                                </div>
                                                            @else
                                                                <div class="font-size-13">
                                                                    <i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                                                    Okundu
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->mail }}</td>
                                                        <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('detail.message', $item->id) }}">
                                                                <button class="btn btn-primary btn-sm">
                                                                    <i class="far fa-eye"></i>
                                                                </button>
                                                            </a>

                                                            <a href="mailto:{{ $item->mail }}">
                                                                <button class="btn btn-success btn-sm">
                                                                    <i class="fas fa-mail-bulk"></i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('delete.message', $item->id) }}"
                                                                id="delete">
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

    </div>
@endsection
