@extends('admin.adminmaster')
@section('admin_content')
<section class="content">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Student Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('student.registration.update',$allDataEdit->student_id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                          <div class="row">
                            <input type="hidden" name="id" value="{{$allDataEdit->id}}">
                            <div class="col-12">
                                <div class="row"><!---1st row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{$allDataEdit['student']['name']}}">
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
                                                <input type="text" name="father_name" class="form-control" value="{{$allDataEdit['student']['father_name']}}">
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
                                                <input type="text" name="mother_name" class="form-control" value="{{$allDataEdit['student']['mother_name']}}">
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
                                                <input type="text" name="mobile" class="form-control" value="{{$allDataEdit['student']['mobile']}}">
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
                                                <input type="text" name="address" class="form-control" value="{{$allDataEdit['student']['address']}}">
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
                                                    <option value="Male" {{($allDataEdit['student']['gender']=="Male")?"selected":""}} >Male</option>
                                                    <option value="Female" {{($allDataEdit['student']['gender']=="Female")?"selected":""}}>Female</option>
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
                                                    <option value="Islam" {{($allDataEdit['student']['religion']=="Islam")?"selected":""}} >Islam</option>
                                                    <option value="Hindu" {{($allDataEdit['student']['religion']=="Hindu")?"selected":""}}>Hindu</option>
                                                    <option value="Christan" {{($allDataEdit['student']['religion']=="Christan")?"selected":""}}>Christan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control" value="{{$allDataEdit['student']['dob']}}" >
                                                @error('dob')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Discount	<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount" class="form-control" value="{{$allDataEdit['discount']['discount']}}">
                                                @error('discount')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                </div><!---3rd row end---->
                                <div class="row"><!---4th row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Year <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_year_id" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="" selected="">Select Year</option>
                                                    @foreach ($allYear as $item)
                                                    <option value="{{$item->id}}" {{($allDataEdit->student_year_id==$item->id)?"selected":""}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Class<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_class_id" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="" selected="">Select Class</option>
                                                    @foreach ($allClass as $item)
                                                    <option value="{{$item->id}}" {{($allDataEdit->student_class_id==$item->id)?"selected":""}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Group<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_group_id" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="" selected="">Select Group</option>
                                                    @foreach ($allGroup as $item)
                                                    <option value="{{$item->id}}" {{($allDataEdit->student_group_id==$item->id)?"selected":""}} >{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div><!---4th row end---->
                                <div class="row"><!---5th row---->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Shift <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="student_shift_id" id="select" required="" class="form-control" aria-invalid="false">
                                                    <option value="" disabled="" selected="">Select Shift</option>
                                                    @foreach ($allShift as $item)
                                                    <option value="{{$item->id}}" {{($allDataEdit->student_shift_id==$item->id)?"selected":""}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <h5>Class<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <img width="100" id="showImage" height="100" src="{{(!empty($allDataEdit['student']['image'])) ? url('upload/student_images/'.$allDataEdit['student']['image']):url('upload/no_image.jpg')}}" alt="User Avatar">
                                            </div>
                                        </div>
                                    </div>


                                </div><!---5th row end---->
                           </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Student Update">
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
