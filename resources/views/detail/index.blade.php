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
                    <div class="row biobox_about">
                        <div class="col-md-9">
                            <p><span style="font-weight: 600;line-height: 40px">{{$project->name}}</span>
                                <br>{{$project->description}}
                            </p>
                        </div>
                    </div>
                    @include('includes/partials/alerts')
                    <div class="card-body p-md-4 biobox_body">
                        @if( $project->followerofProject())

                        <div id="morris-area-example" class="dash-chart">

                            @foreach($comments as $comment)
                                <div class="row" style="margin: 3px 10px">
                                <div style="width: 45px;float: left">
                                <img src="{{asset('uploads/user')}}/{{$comment->user->avatar}}" class="rounded-circle" style="width: 35px;height: 35px"/></div>
                                    <div class="col-10" style="padding: 0;float: left">
                                    <ul class="list-inline" style="vertical-align: 2px">
                                        <li style="font-size: 15px">
                                            <span style="font-weight: 600">{{$comment->user->getName()}}</span>
                                            <?php
                                            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

                                            $text = $comment->comment;

                                            if(preg_match_all($reg_exUrl, $text, $url)) {

                                                $text_array = array();
                                                for ($i=0; $i<count($url[0]); $i++){
                                                    array_push($text_array, "<a href='{$url[0][$i]}' target='_blank'>{$url[0][$i]}</a>");
                                                }
                                                echo preg_replace_array($reg_exUrl, $text_array, $text);

                                            } else {
                                                echo $text;
                                            }
                                            ?>
                                        </li>
                                        <li class="small">{{ $comment->created_at->diffForHumans() }}</li>
                                        @if($comment->file != 'default')
                                        <li>
                                            @if($comment->ext == 'mp4')
                                                <video controls height="300" width="400">
                                                    <source src="{{asset('uploads/comment')}}/{{$comment->file}}" type="video/mp4">
                                                    <source src="movie.ogg" type="video/ogg">
                                                </video>
                                            @else
                                            <embed src="{{asset('uploads/comment')}}/{{$comment->file}}" height="300" width="400" style="margin-top: 20px"></embed>
                                                @endif
                                        </li>
                                        @endif
                                    </ul>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                            <div class="row m-t-15" style="margin-left: 0">
                                <div class="col-md-7">
                                    <form role="form" action="{{route('detail.comment', ['pid'=>$project->id])}}" method="post" enctype="multipart/form-data" style="width: 100%">
                                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                            <textarea placeholder="Write a Comment ... " name="comment" class="form-control" rows="2" required></textarea>
                                            @if ($errors->has('status'))
                                                <span class="help-block">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>

                                        <div class="row" style="margin: 0">
                                            <div class="col-md-2" style="padding: 0;margin-top: -11px">
                                                <button type="submit" class="btn btn-default submit_btn">Post</button>
                                            </div>

                                            <div class="col-md-9 input-group">
                                                <input type="hidden" name="Filename" id="Filename" value="">
                                                <input type="file" name="inputFile" class="doc_file_name" style="display: none">
                                                <div class="input-group-prepend" id="select_file">
                                                    <span class="input-group-text grey">Photo/Video</span>
                                                </div>
                                                <input type="text" class="form-control" name="selected_file" id="selected_file" placeholder="" readonly>
                                                @if ($errors->has('inputFile'))
                                                    <span class="help-block">
                                                        {{ $errors->first('inputFile') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form></div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-3" style="padding-left: 0;min-height:600px;">
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">

                            <ul class="nav nav-main">
                                <li class="nav-parent @if(Session::get('dt_rid') == 1 || Session::get('dt_rid') == '') nav-expanded @endif">
                                    <a class="nav-link" href="#">
                                        <span>Requirements</span>
                                        <span class="remark_count_body">{{$remarks->where('remark_ct_id', 1)->count()}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        @foreach($remarks as $remark)
                                            @if($remark->remark_ct_id == 1)
                                        <li>
                                            <a class="nav-link" @if($project->beMemberofProject()) href="{{route('detail.remarks.edit', ['id'=>$remark->id])}}" @endif>
                                                <i class="ion-ios7-circle-filled"></i>
                                                {{$remark->comment}}
                                            </a>

                                            @foreach($remark->recommends as $recommend)
                                                <div class="recommend_body">
                                                    <div>
                                                <span><i class="ion-ios7-arrow-thin-right"></i><span class="recommend_user">{{$recommend->user->getName()}}</span>
                                                        <?php
                                                        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                        $text = $recommend->body;

                                                        if(preg_match_all($reg_exUrl, $text, $url)) {

                                                            $text_array = array();
                                                            for ($i=0; $i<count($url[0]); $i++){
                                                                array_push($text_array, "<a href='{$url[0][$i]}' target='_blank'>{$url[0][$i]}</a>");
                                                            }
                                                            echo preg_replace_array($reg_exUrl, $text_array, $text);

                                                        } else {
                                                            echo $text;
                                                        }
                                                        ?>
                                                        </span>
                                                    </div>
                                                    @if($recommend->recommend_user_id != 0)
                                                        <div style="padding-left: 20px">
                                                            <span style="font-weight: 400; font-size: 13px;color: #0B7405">Recommend User: </span> <a href="{{route('profile.member', ['uid' => $recommend->userTo->id])}}" style="display: inline"><span style="font-weight: 500;color: #0B7405">&nbsp; {{$recommend->userTo->getName()}}</span></a>
                                                        </div>
                                                     @endif
                                                </div>
                                            @endforeach
                                            <div class="toggle toggle-primary toggle-sm" style="margin: -5px 0 10px;" data-plugin-toggle>

                                                <section class="toggle">
                                                    <label>Apply or Recommend</label>
                                                    <div class="toggle-content">
                                                        <form role="form" action="{{route('detail.recommend', ['rid'=>$remark->id])}}" method="post">
                                                            <div class='form-group {{ $errors->has("reply") ? " has-error" : "" }}' style="margin-bottom: 10px">
                                                                <textarea name="recommend" class="form-control" rows="1" placeholder="Reply to this status" required></textarea>
                                                                @if ($errors->has("reply"))
                                                                    <span class="help-block">{{ $errors->first("reply") }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="require_user" list="userList" value="" class="form-control" name="user" type="text" placeholder="Choose the User"/>

                                                                <datalist id="userList">
                                                                    @foreach($users as $user)
                                                                        @if($user->id != Auth::user()->id)
                                                                        <option value="{{$user->name}}">{{$user->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </datalist>
                                                            </div>

                                                            <input type="submit" value="Reply" class="btn btn-default btn-sm biobox_right_replybtn" style="background: #75B760;color: white">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        </form>
                                                    </div>
                                                </section>

                                            </div>
                                        </li>
                                            @endif
                                        @endforeach
                                            @if($project->beMemberofProject())
                                        <li>
                                            <a class="nav-link biobox_right_btn" href="{{route('detail.remarks.add', ['rid'=>1, 'pid'=>$project->id])}}">
                                                Add
                                            </a>
                                        </li>
                                            @endif
                                    </ul>
                                </li>
                                <li class="nav-parent @if(Session::get('dt_rid') == 2) nav-expanded @endif">
                                    <a class="nav-link" href="#">
                                        <span>Remarks</span>
                                        <span class="remark_count_body">{{$remarks->where('remark_ct_id', 2)->count()}}</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        @foreach($remarks as $remark)
                                            @if($remark->remark_ct_id == 2)
                                                <li>
                                                    <a class="nav-link" @if($project->beMemberofProject()) href="{{route('detail.remarks.edit', ['id'=>$remark->id])}}" @endif>
                                                        <i class="ion-ios7-circle-filled"></i>
                                                        {{$remark->comment}}
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                            @if($project->beMemberofProject())
                                            <li>
                                                <a class="nav-link biobox_right_btn" href="{{route('detail.remarks.add', ['rid'=>2, 'pid'=>$project->id])}}">
                                                    Add
                                                </a>
                                            </li>
                                            @endif
                                    </ul>
                                </li>
                                <li class="nav-parent @if(Session::get('dt_rid') == 3) nav-expanded @endif">
                                    <a class="nav-link" href="#">
                                        <span>Milestones and achievements</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        @foreach($remarks as $remark)
                                            @if($remark->remark_ct_id == 3)
                                                <li>
                                                    <a class="nav-link" @if($project->beMemberofProject()) href="{{route('detail.remarks.edit', ['id'=>$remark->id])}}" @endif>
                                                        <i class="ion-ios7-circle-filled"></i>
                                                        {{$remark->comment}}
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                            @if($project->beMemberofProject())
                                        <li>
                                            <a class="nav-link biobox_right_btn" href="{{route('detail.remarks.add', ['rid'=>3, 'pid'=>$project->id])}}">
                                                Add
                                            </a>
                                        </li>
                                            @endif
                                    </ul>
                                </li>
                                <li class="nav-parent @if(Session::get('dt_rid') == 4) nav-expanded @endif">
                                    <a class="nav-link" href="#">
                                        <span>Write a recommendation</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        @foreach($remarks as $remark)
                                            @if($remark->remark_ct_id == 4)
                                                <li>
                                                    <a class="nav-link" @if($project->beMemberofProject()) href="{{route('detail.remarks.edit', ['id'=>$remark->id])}}" @endif>
                                                        <i class="ion-ios7-circle-filled"></i>
                                                        {{$remark->comment}}
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                            @if($project->beMemberofProject())
                                        <li>
                                            <a class="nav-link biobox_right_btn" href="{{route('detail.remarks.add', ['rid'=>4, 'pid'=>$project->id])}}">
                                                Add
                                            </a>
                                        </li>
                                            @endif
                                    </ul>
                                </li>
                            </ul>
                        </nav>
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

<script>
    $("#select_file").click(function () {
        $(".doc_file_name").click();
    });
    $(".doc_file_name").change(function () {
        let file_url = $(this).val();
        let array = file_url.split("\\");
        file_name = array[array.length - 1];
        $("#Filename").val(file_name);
        $("#selected_file").val(file_name);
    });

</script>

@include('includes/footer_end')