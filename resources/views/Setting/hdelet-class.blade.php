@extends('layouts.app')
@section('content')

@if ($Classes->count() > 0)
<div class="right_col" role="main" style="background-color:#faf4ff">

    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        Classes Trached</div>
    <br />
    {{-- color page --}}
    <div class="row  justify-content-center">
        {{-- Content --}}
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Deleted Class<small>Info</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                {{-- x_content --}}
                <div class="x_content">
                    <br />
                    {{-- form --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Group Name</th>
                                <th scope="col">Group Days</th>
                                <th scope="col">Group Time</th>
                                <th scope="col">Group Trainer</th>
                                <th scope="col">Trainer Specialization</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Classes as $item)
                                <tr>
                                    <th scope="row">{{ $item->group_name }}</th>
                                    <td>{{ $item->group_days }}</td>
                                    <td>{{ $item->group_time }}</td>
                                    <td>{{ $item->group_trainer }}</td>
                                    <td>{{ $item->group_trainer_type}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('setting.classes.restore', ['id' => $item->id]) }}"><i class="fa fa-repeat"></i></a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-danger" href="{{ route('setting.classes.hdelete', ['id' => $item->id]) }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (session()->has('restoreClass'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{session()->get('restoreClass')}}
                             </div>
                        </div>
                        @elseif(session()->has('deleteClass'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{session()->get('deleteClass')}}
                             </div>
                        </div>
                    @endif
                        <div class="text-center"><a href="{{route('setting')}}" class="btn btn-warning"><i class="fa fa-home"></i> Home</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="right_col" role="main" style="background-color:#faf4ff">
    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        No Deleted Classes
    </div>
    <div class="text-center"><a href="{{route('setting')}}" class="btn btn-warning"><i class="fa fa-home"></i> Home</a></div>
</div>
@endif
@endsection
