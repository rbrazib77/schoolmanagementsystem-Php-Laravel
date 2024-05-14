@extends('admin.adminmaster')
@section('admin_content')
<section class="content">
    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Add User</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form action="{{route('user.store')}}" method="POST">
                @csrf
                 <div class="row">
                   <div class="col-6">
                    <div class="form-group">
                        <h5>User Role <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="role" id="select" required="" class="form-control" aria-invalid="false">
                                <option value="" disabled="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                        <div class="help-block"></div></div>
                    </div>
                   </div>
                   <div class="col-6">
                    <div class="form-group">
                        <h5>User Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                        </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <h5>User E-mail <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                        </div>
                    </div>
                  </div>
                 </div>
                   <div class="text-xs-right">
                       {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                       <input type="submit" class="btn btn-info" value="Submit">
                   </div>
               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </section>
   @endsection
