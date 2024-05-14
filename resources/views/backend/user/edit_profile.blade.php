@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Manage Profile</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                          <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                 <h5>User Name <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name" class="form-control" required="" value="{{$editData->name}}">
                                 </div>
                             </div>
                           </div>
                           <div class="col-6">
                             <div class="form-group">
                                 <h5>User E-mail <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="email" name="email" class="form-control" required="" value="{{$editData->email}}">
                                 </div>
                             </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <h5>User Mobile <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="mobile" class="form-control" required="" value="{{$editData->mobile}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                                <h5>User Address <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="address" class="form-control" required="" value="{{$editData->address}}">
                                </div>
                            </div>
                          </div>
                           <div class="col-6">
                            <div class="form-group">
                                <h5>Gender<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="select" required="" class="form-control" aria-invalid="false">
                                        <option value="">Select Role</option>
                                        <option value="Male" {{$editData->gender=="Male" ? "selected":""}} >Male</option>
                                        <option value="Female" {{$editData->gender=="Female" ? "selected":""}}>Female</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>
                            </div>
                           </div>
                           <div class="col-6">
                            <div class="form-group">
                                <h5>Profile Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                   <input type="file" name="image" id="image" class="form-control">
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <img width="100" id="showImage" height="100" src="{{(!empty($user->image)) ? url('upload/user_images/'.$user->image):url('upload/no_image.jpg')}}" alt="User Avatar">
                               </div>
                            </div>
                           </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Update">
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
    </div>
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

