@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Assign Subject Add</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('assign.subject.store')}}" method="POST">
                             @csrf
                             <div class="add_item">
                              <div class="row">
                                <div class="col-12">
                                 <div class="form-group">
                                     <h5>Student Class<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <select name="student_class_id" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="" >Select Student Class</option>
                                            @foreach ($allStudentClass as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                         </select>
                                     <div class="help-block"></div></div>
                                 </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                 <div class="form-group">
                                     <h5>Student Subject Name <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                        <select name="student_subject_id[]" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="" >Select Student Subject</option>
                                            @foreach ($allSchoolSubject as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                               </div>
                               <div class="col-2">
                                 <div class="form-group">
                                     <h5>Full Mark<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="text" name="full_mark[]" class="form-control">
                                     </div>
                                 </div>
                               </div>
                               <div class="col-2">
                                <div class="form-group">
                                    <h5>Pass Mark<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="pass_mark[]" class="form-control">
                                    </div>
                                </div>
                              </div>
                              <div class="col-2">
                                <div class="form-group">
                                    <h5>Subjective Mark<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subjective_mark[]" class="form-control">
                                    </div>
                                </div>
                              </div>
                               <div class="col-2" style="padding-top: 12px">
                                    <span class="btn btn-success addeventmore mt-3"><i class="fa-solid fa-plus"></i></span>
                               </div>
                            </div>
                        </div>
                            <div class="text-xs-right">
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
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>


<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="row">
                    <div class="col-4">
                     <div class="form-group">
                         <h5>Student Class Name <span class="text-danger">*</span></h5>
                         <div class="controls">
                            <select name="student_subject_id[]" id="select" required="" class="form-control" aria-invalid="false">
                                <option value="" selected="" disabled="" >Select Student Class Name</option>
                                @foreach ($allSchoolSubject as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                             </select>
                         </div>
                     </div>
                   </div>
                   <div class="col-2">
                    <div class="form-group">
                        <h5>Full Mark<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="full_mark[]" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="col-2">
                   <div class="form-group">
                       <h5>Pass Mark<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="pass_mark[]" class="form-control">
                       </div>
                   </div>
                 </div>
                 <div class="col-2">
                   <div class="form-group">
                       <h5>Subjective Mark<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="subjective_mark[]" class="form-control">
                       </div>
                   </div>
                 </div>
                   <div class="col-2" style="padding-top: 12px">
                        <span class="btn btn-success addeventmore mt-3"><i class="fa-solid fa-plus"></i></span>
                        <span class="btn btn-danger removeeventmore mt-3"><i class="fa-solid fa-minus"></i></span>
                   </div>
                </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",'.removeeventmore',function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

    });
</script>


@endsection
