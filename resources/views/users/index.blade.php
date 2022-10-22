@extends('layouts.app')

@section('content')
    @if ($users->count() > 0)

        <div class="right_col" role="main" style="background-color:#faf4ff">

            <div class="x_title"
                style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
                Users
            </div>
            <br />
            {{-- color page --}}
            <div class="row  justify-content-center">
                {{-- Content --}}
                <div class="col-md-10">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Users Info<small>Account </small></h2>
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
                                                    {{-- <th scope="col">Image</th> --}}
                                                    <th scope="col">name</th>
                                                    <th scope="col">email</th>
                                                    <th scope="col">Make Admin</th>
                                                    <th scope="col">Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <th scope="row">{{ $user->id }}</th>
                                                        {{-- <td><img src="{{ $user->admin->image }}" alt=""></td> --}}
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @if (!$user->admin)
                                                                @foreach ($admins as $admin)
                                                                    @if ($admin->user_id == $user->id)
                                                                        <form method="POST"
                                                                            action="{{ route('user.makeAdmin', $user) }}">
                                                                            @csrf
                                                                            <button type="submit">Make Admin</button>
                                                                        </form>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                Already Admin
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class=""
                                                                href="{{ route('user.delete', ['id' => $user->id]) }}"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- BUTTON --}}
                            <div class="row justify-content-center">
                                <div>
                                    <a class="btn btn-dark" href="{{ route('user.create') }}" role="button">
                                        <i class="fa fa-plus"></i> Account Add
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
                No Users yet
            </div>

        </div>
    @endif

@endsection
