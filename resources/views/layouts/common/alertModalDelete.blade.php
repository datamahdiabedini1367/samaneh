<div class="modal fade" id="removeItem" tabindex="-1" role="dialog"
     aria-labelledby="removeItemTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-6">
                    <h5 class="modal-title" id="exampleModalLongTitle">پیغام سیستم</h5>
                </div>
                <div class="col-6">
                    <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                آیا از حذف اطلاعات اطمینان دارید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">خیر</button>
                {{Form::open(['url'=>'','method'=>'delete','id'=>'itemDelete'])}}
                {{Form::submit('بله',['class'=>"btn btn-danger mx-2", "data-toggle"=>"modal" ,"data-target"=>"#removeItem"])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
