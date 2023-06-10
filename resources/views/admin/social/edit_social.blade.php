@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Social</h4>
                            <br>
                            <form action="{{ route('update.social', $socials->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $socials->id }}">


                                <div class="row mb-3">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Icon</label>
                                  <div class="col-sm-10">
                                      <i class="{{ $socials->icon }}"></i>
                                  </div>
                              </div>
                              <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Icon</label>
                                    <div class="col-sm-10">
                                        <input name="icon" class="form-control" type="text"
                                            id="example-text-input" value="{{ $socials->icon }}">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                  <label for="example-text-input" class="col-sm-2 col-form-label">Link</label>
                                  <div class="col-sm-10">
                                      <input name="link" class="form-control" type="text"
                                          id="example-text-input" value="{{ $socials->link }}">
                                  </div>
                              </div>
                              <!-- end row -->

                              <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Desk</label>
                                <div class="col-sm-10">
                                    <input name="desk" class="form-control" type="number"
                                        id="example-text-input" value="{{ $socials->desk }}">
                                </div>
                            </div>
                            <!-- end row -->



                                <hr>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">


                            </form>







                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->



        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
