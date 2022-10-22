@extends('layouts.app')

@section('content')
    @if ($devices->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Machines </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Machines Info<small>Data </small></h2>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Num Of Devices</th>
                                                    <th scope="col">Course Type</th>
                                                    <th scope="col">Edit </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($devices as $device)
                                                    <tr>
                                                        <th scope="row">{{ $device->id }}</th>
                                                        <td>
                                                            <!--url(‘storage/’.$device->image)-->
                                                            <img src="{{ $device->image }}" alt="{{ $device->id }}"
                                                                class="img-thumbnail" height="75px" width="75px">
                                                        </td>
                                                        <td>{{ $device->num_of_devices }}</td>
                                                        @foreach ($courses as $course)
                                                            @if ($course->id == $device->course_id)
                                                                <td>{{ $course->sport_type }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('device.edit', ['id' => $device->id]) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('device.delete', ['id' => $device->id]) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- THE BUTTONS --}}
                            <div class="row justify-content-center">
                                <div>
                                    <a class="btn btn-dark" href="{{ route('device.create') }}" role="button"><i
                                            class="fa fa-plus"></i> Machine
                                        Add</a>
                                </div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('device.trashed') }}" role="button"><i
                                            class="fa fa-trash"></i> Deleted
                                        Machines</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    @else

        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                No Machines
            </div>
            <div class="row justify-content-center">
                <div>
                    <a class="btn btn-dark" href="{{ route('device.create') }}" role="button"><i class="fa fa-plus"></i>
                        Machine Add</a>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('device.trashed') }}" role="button"><i
                            class="fa fa-trash"></i> Deleted Machines</a>
                </div>
            </div>
        </div>
    @endif

@endsection
