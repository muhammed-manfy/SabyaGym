@extends('layouts.app')

@section('content')
    <div class="right_col" role="main" style="background-color:#faf4ff">
        <div class="x_title"
            style="background-color: white;text-align: center;font-size:x-large;color: black ;font-family:'Segoe UI'">
            Supervisor Create </div>
        <br />
        {{-- color page --}}
        <div class="row  justify-content-center">
            {{-- Content --}}
            <div class="col-md-9">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Supervisor Info<small>Data Register </small></h2>
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
                        <!--the errors-->
                        @if (count($errors) > 0)
                            <ul class="navbar-nav mr-auto">
                                @foreach ($errors->all() as $error)
                                    <li class="nav-item active">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif



                        <form action=" {{ route('admin.store') }} " method="POST" enctype="multipart/form-data"
                            class="form-horizontal form-label-left">
                            <!--enctype="multipart/form-data for image -->
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="full_name">Full Name
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="full_name" placeholder="Enter full_name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="phone">Phone
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="phone" placeholder="Enter phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="birthday">Birthday
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="date" class="form-control"
                                        name="birthday" placeholder="Enter birthday">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'" for="salary">Salary
                                </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="number" class="form-control"
                                        name="salary" placeholder="Enter salary">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="certificate">Certificate </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input style="border-color: black;border-radius:15px" type="text" class="form-control"
                                        name="certificate" placeholder="Enter certificate">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'"
                                    for="user_id">User</label>
                                <div class="col-md-7 col-sm-9 ">
                                    <select style="border-color: black;border-radius:15px" class="form-control"
                                        name="user_id" id="user_id" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="control-label col-md-5 col-sm-3 "
                                    style="font-size:large;color: #0f0f0f;font-family: 'Segoe UI'">Image </label>
                                <div class="col-md-7 col-sm-9 ">
                                    <input type="file" class="form-control-file" name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-5 col-sm-9">
                                    <button type="submit" class="btn btn-dark">Data Save</button>
                                </div>
                            </div>

                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
