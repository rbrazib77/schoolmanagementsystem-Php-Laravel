@extends('admin.adminmaster')
@section('admin_content')
<section class="content">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Employee Add</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('employee.registration.store')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                          <div class="row">
                            <div class="col-12">
                                <div class="row"><!---1st row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control">
                                                @error('name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="father_name" class="form-control">
                                                @error('father_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Mother's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mother_name" class="form-control">
                                                @error('name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div><!---1st row end---->
                                <div class="row"><!---2nd row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Mobile Number <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control">
                                                @error('name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Address	<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control">
                                                @error('father_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="">Select Role</option>
                                                    <option value="Male"  >Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            <div class="help-block"></div>
                                        </div>
                                        </div>
                                    </div>

                                </div><!---2nd row end---->
                                <div class="row"><!---3rd row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Religion <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="religion" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="">Select Role</option>
                                                    <option value="Islam"  >Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Christan">Christan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control">
                                                @error('dob')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Designation<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="designation_id" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="" selected="">Select Designation</option>
                                                    @foreach ($allDesignation as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><!---3rd row end---->
                                <div class="row"><!---4th row---->
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <h5>Salary<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="salary" class="form-control">
                                                @error('salary')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <h5>Joining Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="join_date" class="form-control">
                                                @error('join_date')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <h5>Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <img width="100" id="showImage" height="100" src="{{url('upload/no_image.jpg')}}" alt="User Avatar">
                                            </div>
                                        </div>
                                    </div>
                                </div><!---4th row end---->
                           </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Employee Add">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    })
</script>
@endsection
