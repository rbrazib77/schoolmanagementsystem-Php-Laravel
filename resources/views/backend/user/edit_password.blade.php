@extends('admin.adminmaster')
@section('admin_content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Password Change</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('password.change')}}" method="POST">
                         @csrf
                          <div class="row">
                            <div class="col-12">
                             <div class="form-group">
                                 <h5>Current Password <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="current_password" class="form-control">
                                     @error('current_password')
                                     <strong class="text-danger">{{$message}}</strong>
                                     @enderror
                                     <strong class="text-danger"> {{session('curruntPassword_error')}}</strong>
                                 </div>
                             </div>
                           </div>
                           <div class="col-12">
                             <div class="form-group">
                                 <h5>New Password <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="password" class="form-control">
                                     @error('password')
                                     <strong class="text-danger">{{$message}}</strong>
                                     @enderror
                                 </div>
                             </div>
                           </div>
                           <div class="col-12">
                            <div class="form-group">
                                <h5>Comfirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="password_confirmation"class="form-control">
                                    @error('password_confirmation')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
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
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>

@endsection
