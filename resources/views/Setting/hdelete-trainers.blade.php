@extends('layouts.app')
@section('content')
@if ($trainer->count() > 0)
<div class="right_col" role="main" style="background-color:#faf4ff">

    <div class="x_title"
        style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
        Trainers Trached</div>
    <br />
    {{-- color page --}}
    <div class="row  justify-content-center">
        {{-- Content --}}
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Deleted Trainers<small>Info</small></h2>
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
                                <th scope="col">Trainer Name</th>
                                <th scope="col">Trainer Specialization</th>
                                <th scope="col">Certificates</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainer as $item)
                                <tr>
                                    <th scope="row">{{ $item->trainer_name }}</th>
                                    <td>{{ $item->trainer_type }}</td>
                                    <td>{{ $item->certificates }}</td>
                                    <td>
                                        <a  class="btn btn-info " href="{{ route('setting.trainers.restore', ['id' => $item->id]) }}"><i class="fa fa-repeat"></i></a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-danger" href="{{ route('setting.trainers.hdelete', ['id' => $item->id]) }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        No Deleted Trainers
    </div>
    <div class="text-center"><a href="{{route('setting')}}" class="btn btn-warning"><i class="fa fa-home"></i> Home</a></div>
    @if (session()->has('deletetrainer'))
                    <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{session()->get('deletetrainer')}}
                            </div>
                    </div>
            @elseif(session()->has('restoretrainer'))
                <div class="row justify-content-center">
                        <div class="alert alert-success">
                            {{session()->get('restoretrainer')}}
                        </div>
                </div>
    @endif
</div>
@endif

@endsection
