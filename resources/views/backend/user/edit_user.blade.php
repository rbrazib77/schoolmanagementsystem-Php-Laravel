@extends('admin.adminmaster')
@section('admin_content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Update User</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('user.update',$editData->id)}}" method="POST">
                         @csrf
                          <div class="row">
                            <div class="col-6">
                             <div class="form-group">
                                 <h5>User Role <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <select name="role" id="select" required="" class="form-control" aria-invalid="false">
                                         <option value="">Select Role</option>
                                         <option value="Admin" {{$editData->role=="Admin" ? "selected":""}} >Admin</option>
                                         <option value="Operator" {{$editData->role=="Operator" ? "selected":""}}>Operator</option>
                                     </select>
                                 <div class="help-block"></div></div>
                             </div>
                            </div>
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
