@extends('layouts.app')

@section('content')
    @if ($courses->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Groups </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Groups Info<small>Data </small></h2>
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
                                                    <th scope="col">Sport Type</th>
                                                    <th scope="col">Subscribe Type</th>
                                                    <th scope="col">Subscribe Cost</th>
                                                    <th scope="col">Published At </th>
                                                    <th scope="col">Ended At</th>
                                                    <th scope="col">Count Subscriber </th>
                                                    <th scope="col">Coach Name </th>
                                                    <th scope="col">Show </th>
                                                    <th scope="col">Edit </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courses as $course)
                                                    <tr>
                                                        <th scope="row">{{ $course->id }}</th>
                                                        <td>
                                                            <img src="{{ $course->image }}"
                                                                alt="{{ $course->sport_type }}" class="img-thumbnail"
                                                                height="50px" width="50px">
                                                        </td>
                                                        <td>{{ $course->sport_type }}</td>
                                                        <td>{{ $course->subscribe_type }}</td>
                                                        <td>{{ $course->subscribe_cost }}</td>
                                                        <td>{{ $course->published_at }}</td>
                                                        <td>{{ $course->ended_at }}</td>
                                                        <td>{{ $course->trainees->count() }}</td>
                                                        @foreach ($coachs as $coach)
                                                            @if ($coach->id == $course->coach_id)
                                                                <td>{{ $coach->full_name }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('course.show', ['id' => $course->id]) }}"><i
                                                                    class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('course.edit', ['id' => $course->id]) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('course.delete', ['id' => $course->id]) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            {{-- THE BUTTONS --}}
                            <div class="row justify-content-center">
                                <div>
                                    <a class="btn btn-dark" href="{{ route('course.create') }}" role="button"><i
                                            class="fa fa-plus"></i> Course
                                        Add
                                    </a>
                                </div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('course.trashed') }}" role="button"><i
                                            class="fa fa-trash"></i> Deleted
                                        Courses
                                    </a>
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
                No Groups
            </div>
            <div class="row justify-content-center">
                <div>
                    <a class="btn btn-dark" href="{{ route('course.create') }}" role="button">
                        <i class="fa fa-plus"></i> Course Add
                    </a>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('course.trashed') }}" role="button"><i
                            class="fa fa-trash"></i> Deleted
                        Courses
                    </a>
                </div>
            </div>
        </div>
    @endif



@endsection
