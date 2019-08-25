@extends('profile.member.layout')

@section('membercontent')

    <h3 class="mt-0 ml-md-1 mb-md-4">{{ucwords($member->name)}}'s Info</h3>


    <div style="margin: 0">
        <h5 class="project_title"><a>Name: {{ucwords($member->name)}}</a>
        </h5>
        <h5 class="project_title"><a>Email: {{$member->email}}</a>
        </h5>
        @if($member->profile)
        <h5 class="project_title"><a>Age: {{$member->profile->age}}</a>
        </h5>
        <h5 class="project_title"><a>City: {{$member->profile->city}}</a>
        </h5>
        <h5 class="project_title"><a>Studies: {{$member->profile->study}}</a>
        </h5>
        <h5 class="project_title"><a>Interests: {{$member->profile->interest}}</a>
        </h5>
        @endif
    </div>

    <div class="member_btnBack">
        <a class="btn btn-primary" href="{{route('profile.member', ['uid' => $member->id])}}">Back</a>
    </div>

@endsection
