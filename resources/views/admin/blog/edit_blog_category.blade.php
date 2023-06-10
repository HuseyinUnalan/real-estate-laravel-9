@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category</h4>
                            <br>
                            <form action="{{ route('update.blog.category', $blogcategory->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="blog_category" class="form-control" type="text"
                                            id="example-text-input" value="{{ $blogcategory->blog_category }}">
                                        @error('blog_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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