@extends('layouts.app')

@section('content')

    @if ($adverts->count() > 0)
        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Posts </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Post Info<small>Data </small></h2>
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
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Discount Rate</th>
                                                    <th scope="col">Sprot Type</th>
                                                    <th scope="col">Admin Name</th>
                                                    <th scope="col">Show </th>
                                                    <th scope="col">Edit </th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($adverts as $advert)
                                                    <tr>
                                                        <th scope="row">{{ $advert->id }}</th>
                                                        <td>{{ $advert->title }}</td>
                                                        <td>{{ $advert->discount_rate }}</td>
                                                        @foreach ($courses as $course)
                                                            @if ($course->id == $advert->course_id)
                                                                <td>{{ $course->sport_type }}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach ($admins as $admin)
                                                            @if ($admin->id == $advert->admin_id)
                                                                <td>{{ $admin->full_name }}</td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('advert.show', ['id' => $advert->id]) }}"><i
                                                                    class="fa fa-eye"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('advert.edit', ['id' => $advert->id]) }}"><i
                                                                    class="fa fa-edit"></i></a>
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('advert.delete', ['id' => $advert->id]) }}"><i
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
                                    <a class="btn btn-dark" href="{{ route('advert.create') }}" role="button"><i
                                            class="fa fa-plus"></i> Post Add</a>
                                </div>
                                <div>
                                    <a class="btn btn-dark" href="{{ route('advert.trashed') }}" role="button"><i
                                            class="fa fa-trash"></i> Deleted
                                        Posts</a>
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
                No Posts
            </div>
            {{-- THE BUTTONS --}}
            <div class="row justify-content-center">
                <div>
                    <a class="btn btn-dark" href="{{ route('advert.create') }}" role="button"><i class="fa fa-plus"></i>
                        Post Add</a>
                </div>
                <div>
                    <a class="btn btn-dark" href="{{ route('advert.trashed') }}" role="button"><i
                            class="fa fa-trash"></i> Deleted
                        Posts</a>
                </div>
            </div>
        </div>
    @endif

@endsection

{{-- table dynamic --}}
@section('datatables')
    <link href="{{ asset('gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
        rel="stylesheet">

@endsection
