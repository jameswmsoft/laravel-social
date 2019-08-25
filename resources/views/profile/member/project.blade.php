@extends('profile.member.layout')

@section('membercontent')

    <h3 class="mt-0 font-18 ml-md-1 mb-md-4">Projects {{$member->name}} Follow -
        <span>{{count($projects)}} </span></h3>

    @if (!$projects->count())
        <p style="margin-left: 5px">There aren't any projects</p>
    @else
        @foreach($projects as $project)
            <div class="row" style="margin: 0">
                <h5 class="project_title"><i class="ion-ios7-arrow-thin-right"></i><a
                            href="{{route('detail.index', ['pid'=>$project->followable->id])}}">{{$project->followable->name}}</a>
                </h5>
            </div>
        @endforeach
    @endif

@endsection
