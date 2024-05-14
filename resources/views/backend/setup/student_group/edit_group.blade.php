@extends('admin.adminmaster')
@section('admin_content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Student Group Update</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('student.group.update',$allGroup->id)}}" method="POST">
                         @csrf
                          <div class="row">
                            <div class="col-12">
                             <div class="form-group">
                                 <h5>Student Group Name <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="name" class="form-control" value="{{$allGroup->name}}">
                                     @error('name')
                                     <strong class="text-danger">{{$message}}</strong>
                                     @enderror
                                 </div>
                             </div>
                           </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Student group Update">
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
