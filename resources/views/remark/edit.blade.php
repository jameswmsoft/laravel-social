@include('includes/header_start')

<!--Morris Chart CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">

@include('includes/header_end')

<!-- ==================
                         PAGE CONTENT START
                         ================== -->

<div class="page-content-wrapper" style="padding-top: 110px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 pt-md-3">
                <div class="card m-b-30 p-md-5">

                    <div class="card-body p-md-4 biobox_body">

                        <div id="morris-area-example" class="dash-chart">

                            <h3 style="color: #0B7405;">{{$comment->remark_ct->remark}}</h3>
                            <div class="row m-t-15" style="margin-left: 0">
                                <form role="form" action="{{route('detail.remarks.edit', ['id'=>$comment->id])}}" method="post" style="width: 40%">
                                    <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <textarea placeholder="Write a Comment ... " name="comment" class="form-control" rows="2">{{$comment->comment}}</textarea>
                                        @if ($errors->has('comment'))
                                            <span class="help-block">{{ $errors->first('comment') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-default submit_btn">Submit</button>
                                    <a href="{{route('detail.remarks.delete', ['id'=>$comment->id])}}" class="btn btn-default del_btn">Delete</a>
                                    <a href="{{route('detail.index', ['pid'=>$comment->project_id])}}" class="btn btn-default cancel_btn">Cancel</a>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!--Morris Chart-->
<script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>

<script src="{{asset('assets/pages/dashborad.js')}}"></script>

@include('includes/footer_end')