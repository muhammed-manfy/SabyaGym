@extends('layouts.app')

@section('content')

    @if ($medicals->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Medicals Records </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Deleted Medical Record Info<small>Data </small></h2>
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
                                        <th scope="col">No</th>
                                        <th scope="col">hospital_name</th>
                                        <th scope="col">previous_operation</th>
                                        <th scope="col">disases</th>
                                        <th scope="col">Subscriber</th>
                                        <th scope="col">Restore </th>
                                        <th scope="col">Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medicals as $medical)
                                        <tr>
                                            <th scope="row">{{ $medical->id }}</th>
                                            <td>{{ $medical->hospital_name }}</td>
                                            <td>{{ $medical->previous_operation }}</td>
                                            <td>{{ $medical->disases }}</td>
                                            @foreach ($trainees as $trainee)
                                                @if ($trainee->id == $medical->trainee_id)
                                                    <td>{{ $trainee->id }}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <a class=""
                                                    href="{{ route('medical.restore', ['id' => $medical->id]) }}"><i
                                                        class="fa fa-recycle"></i></a>
                                            </td>
                                            <td>
                                                <a class=""
                                                    href="{{ route('medical.hdelete', ['id' => $medical->id]) }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                No Medical Record </div>

        </div>
    @endif

    </tbody>
    </table>

@endsection
