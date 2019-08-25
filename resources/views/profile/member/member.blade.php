@extends('profile.member.layout')

@section('membercontent')

    {{--<h3 class="mt-0 font-18 ml-md-1 mb-md-4">{{$member->name}}'s Projects ---}}
        {{--<span>{{count($projects)}} </span></h3>--}}

    <div class="row">
        <div class="col-md-12" style="text-align: center">

                <h4 style="color: #0B7405;margin-bottom: 23px">{{ucwords($member->name)}}</h4>

            <img src="{{asset('uploads/user')}}/{{$member->avatar}}" alt="200x200" class="img-thumbnail" style="width: 180px; height: 180px;">

        </div>
    </div>

    <div class="@if($projects->count() > 0)row @endif p-md-5" style="text-align: center">

            @if (!$projects->count())
                <p style="margin-left: 5px;font-size: 18px;color: #D95E27;">{{ucwords($member->name)}} still doesn’t participate as a project owner
                </p>
            @else
                <?php $i = 0; ?>
                @foreach($projects as $project)
                <?php ++$i; ?>
                    <div class="col-md-4 @if($i == 2 ) profile_view_center @endif">
                    <img src="{{asset('uploads/project')}}/{{$project->image}}" alt="200x200" class="img-thumbnail rounded-circle" style="width: 180px; height: 180px;">
                        <h5 class="project_title"><a href="{{route('detail.index', ['pid'=>$project->id])}}">{{$project->name}}</a>
                        </h5>
                    </div>
                @endforeach

            @endif

    </div>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-5">
            {!! $projects->render() !!}
        </div>

    </div>

@endsection
