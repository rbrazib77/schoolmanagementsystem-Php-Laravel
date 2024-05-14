@extends('admin.adminmaster')
@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Fee Amount Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{route('fee.amount.store')}}" method="POST">
                             @csrf
                             <div class="add_item">
                              <div class="row">
                                <div class="col-12">
                                 <div class="form-group">
                                     <h5>Fee Category<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <select name="fee_category_id" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="" >Select Fee Category</option>
                                            @foreach ($FeeCategory as $item)
                                            <option value="{{$item->id}}"  {{($editData['0']->fee_category_id== $item->id)? "selected":""}}>{{$item->name}}</option>
                                            @endforeach
                                         </select>
                                     <div class="help-block"></div></div>
                                 </div>
                                </div>
                            </div>
                            @foreach ($editData as $edit)
                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="row">
                                <div class="col-5">
                                 <div class="form-group">
                                     <h5>Student Class Name <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                        <select name="student_class_id[]" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" selected="" disabled="" >Select Student Class Name</option>
                                            @foreach ($StudentClass as $item)
                                            <option value="{{$item->id}}"  {{($edit->student_class_id== $item->id)? "selected":""}}>{{$item->name}}</option>
                                            @endforeach
                                         </select>
                                     </div>
                                 </div>
                               </div>
                               <div class="col-5">
                                 <div class="form-group">
                                     <h5>Amount<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="text" name="amount[]" class="form-control" value="{{$edit->amount}}">
                                     </div>
                                 </div>
                               </div>
                               <div class="col-2" style="padding-top: 12px">
                                    <span class="btn btn-success addeventmore mt-3"><i class="fa-solid fa-plus"></i></span>
                                    <span class="btn btn-danger removeeventmore mt-3"><i class="fa-solid fa-minus"></i></span>
                               </div>
                            </div>
                            </div>
                            @endforeach
                        </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info" value="Fee Amount Update">
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
                    <div class="col-5">
                     <div class="form-group">
                         <h5>Student Class Name <span class="text-danger">*</span></h5>
                         <div class="controls">
                            <select name="student_class_id[]" id="select" required="" class="form-control" aria-invalid="false">
                                <option value="" selected="" disabled="" >Select Student Class Name</option>
                                @foreach ($StudentClass as $item)
                                <option value="{{$item->id}}" >{{$item->name}}</option>
                                @endforeach
                             </select>
                         </div>
                     </div>
                   </div>
                   <div class="col-5">
                     <div class="form-group">
                         <h5>Amount<span class="text-danger">*</span></h5>
                         <div class="controls">
                             <input type="text" name="amount[]" class="form-control" value="">
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
