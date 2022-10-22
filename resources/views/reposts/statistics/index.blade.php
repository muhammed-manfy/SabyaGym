@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="row">
            <div class="card border-primary ml-5 mr-5" style="max-width: 18rem;">
                <div class="card-header">Supervisor Info</div>
                <div class="card-body text-primary">
                    <h6 class="card-title">sum of salary = {{ $admins->sum('salary') }}</h6>
                    <h6 class="card-title">count of admin = {{ $admins->count() }}</h6>
                    <hr>
                    <p class="card-text"><a href="{{ route('admins') }}"> View Details</a></p>
                </div>
                {{-- <div class="card-header">Admins Info</div>
                <div class="card-body text-primary">
                    <h6 class="card-title">Current Admins</h6>
                    <p class="card-text">count of admin = {{ $admins->count() }}<br>sum of salary =
                        {{ $admins->sum('salary') }}</p>
                    <h6 class="card-title">Old Admins</h6>
                    <p class="card-text">count of admin = {{ $trashed_admins->count() }}<br>sum of salary =
                        {{ $trashed_admins->sum('salary') }}</p>
                    <hr>
                    <p class="card-text"><a href="{{ route('admins') }}"> View Details</a></p>
                </div> --}}

            </div>
            <div class="card border-secondary mr-5" style="max-width: 18rem;">
                <div class="card-header">Trainers Info</div>
                <div class="card-body text-secondary">
                    <h6 class="card-title">sum of salary = {{ $coachs->sum('salary') }}</h6>
                    <h6 class="card-title">count of trainer = {{ $coachs->count() }}</h6>
                    <hr>
                    <p class="card-text"><a href="{{ route('coachs') }}"> View Details</a></p>
                </div>
            </div>
            <div class="card border-success mr-5" style="max-width: 18rem;">
                <div class="card-header">Workers Info</div>
                <div class="card-body text-success">
                    <h6 class="card-title">sum of salary = {{ $cleaners->sum('salary') }}</h6>
                    <h6 class="card-title">count of worker = {{ $cleaners->count() }}</h6>
                    <hr>
                    <p class="card-text"><a href="{{ route('cleaners') }}"> View Details</a></p>
                </div>
            </div>

            <div class="card border-dark mr-5" style="max-width: 18rem;">
                <div class="card-header">Subscriber</div>
                <div class="card-body text-dark">
                    <h6 class="card-title">subscriber costs = {{ $subscribe_costs }}</h6>
                    <h6 class="card-title">count of subscriber = {{ $trainees->count() }}</h6>
                    <hr>
                    <p class="card-text"><a href="{{ route('trainees') }}"> View Details</a></p>
                </div>
            </div>
        </div>
        <!--
                    Card Color
                    warning danger info secondary primary dark light success
                -->
    @endsection
