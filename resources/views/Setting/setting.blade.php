@extends('layouts.app')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs md-tabs justify-content-center" id="myTabMD" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab"
                            aria-controls="home-md" aria-selected="true"
                            style="font-size: 18px;font-family: 'Times New Roman'"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="site-info-tab-md" data-toggle="tab" href="#site-info-md" role="tab"
                            aria-controls="site-info-md" aria-selected="true"
                            style="font-size: 18px;font-family: 'Times New Roman'"><i class="fa fa-info-circle"></i> Site
                            Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Classes-tab-md" data-toggle="tab" href="#Classes-md" role="tab"
                            aria-controls="Classes-md" aria-selected="false"
                            style="font-size: 18px;font-family: 'Times New Roman'"><i class="fa fa-child"></i> Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="Trainers-tab-md" data-toggle="tab" href="#Trainers-md" role="tab"
                            aria-controls="Trainers-md" aria-selected="false"
                            style="font-size: 18px;font-family: 'Times New Roman'"><i class="fa fa-user"></i> Trainers</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content card pt-5" id="myTabContentMD" style="padding-bottom: 0px">
                <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
                    <h1><strong style="font-family: 'Times New Roman'">Welcome in Home !!</strong></h1>

                    @if (session()->has('softdelteClass'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{ session()->get('softdelteClass') }}
                            </div>
                        </div>
                    @elseif(session()->has('updatedsite'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{ session()->get('updatedsite') }}
                            </div>
                        </div>
                    @elseif(session()->has('trachedtrainer'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{ session()->get('trachedtrainer') }}
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-lg-4" style="margin: 20px">
                            <div class="card" style="margin: 20px;border-color:darkblue;">
                                <div class="card-header" style="background-color:midnightblue ">
                                    <h4>Classes Info</h4>
                                </div>
                                <div class="card-body" style="padding: 20px">
                                    <a href="{{ route('course.create') }}" class="btn btn-primary"><i
                                            class="fa fa-edit"></i> Create</a>
                                    <p style="font-size: 18px">Create a new class</p>
                                    <a href="{{ route('course.trashed') }}" class="btn btn-danger"><i
                                            class="fa fa-trash-o"></i> Trached Box</a>
                                    <p style="font-size: 18px">Classes Trached</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" style="margin: 20px">
                            <div class="card" style="margin: 20px;border-color:mediumseagreen;">
                                <div class="card-header" style="background-color:mediumaquamarine ">
                                    <h4>Trainers Info</h4>
                                </div>
                                <div class="card-body" style="padding: 20px">
                                    <a href="{{ route('coach.create') }}" class="btn btn-primary"><i class="fa fa-edit"></i>
                                        Create</a>
                                    <p style="font-size: 18px">Create a new trainer</p>
                                    <a href="{{ route('coach.trashed') }}" class="btn btn-danger"><i
                                            class="fa fa-trash-o"></i> Trached Box</a>
                                    <p style="font-size: 18px">Trainers Trached</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="site-info-md" role="tabpanel" aria-labelledby="site-info-tab-md"
                    style="margin-top: 0px;margin-left: 200px">
                    <form class="form-horizontal form-label-left" action="{{ route('setting.update',['id' => $setting->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 "
                                style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Site Name</label>
                            <div class="col-md-4 col-sm-9 ">
                                <input type="text" class="form-control" value="{{ $setting->site_name }}"
                                    style="border-color: black;border-radius:15px" name="site_name">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 "
                                style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman' ">Phone Number</label>
                            <div class="col-md-4 col-sm-9 ">
                                <input type="text" class="form-control" value="{{ $setting->phone_number }}"
                                    style="border-color: black;border-radius:15px" name="phone_number">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " style="
                                    font-size:large;color: #0f0f0f;font-family: 'Times New Roman' ">Email</label>
                            <div class="col-md-4 col-sm-9 ">
                                <input type="text" class="form-control" value="{{ $setting->email }}"
                                    style="border-color: black;border-radius:15px" name="email">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " style="
                                    font-size:large;color: #0f0f0f;font-family: 'Times New Roman' ">Address</label>
                            <div class="col-md-4 col-sm-9 ">
                                <input type="text" class="form-control" value="{{ $setting->address }}"
                                    style="border-color: black;border-radius:15px" name="address">
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 " style="
                                    font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Open Days</label>
                            <div class="col-md-4 col-sm-9 ">
                                <input type="text" class="form-control" value="{{ $setting->open_days }}"
                                    style="border-color: black;border-radius:15px" name="open_days">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-sm-9  offset-md-3">
                                <button type="submit" class="btn btn-dark">Data Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="Classes-md" role="tabpanel" aria-labelledby="Classes-tab-md">
                    @if ($courses->count() > 0)
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <h2 style="margin-top: 0px;font-size: 22px;font-family: 'Times New Roman'">The Classes</h2>
                            <thead>
                                <tr>
                                    <th>#Class Name</th>
                                    <th>#Class Time start</th>
                                    <th>#Class Time end</th>
                                    <th>#Created Date</th>
                                    <th>#Trainer Name</th>
                                    <th>#Edit</th>
                                    <th>#Delete</th>
                                </tr>
                            </thead>
                            @foreach ($courses as $course)
                                <tbody>
                                    <tr>
                                        <td>
                                          <strong>{{ $course->sport_type }}</strong></td>
                                        <td>
                                            <Strong>{{ $course->time_start }}</Strong>
                                        </td>
                                        <td>
                                            <Strong>{{ $course->time_end }}</Strong>
                                        </td>
                                        <td><strong>{{ $course->created_at->toFormattedDateString() }}</strong></td>
                                        <td>
                                            <strong>{{ $course->coach->full_name }}</strong>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.edit', ['id' => $course->id]) }}"
                                                class="btn btn-info "><i class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('course.delete', ['id' => $course->id]) }}"
                                                class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>Not have any Class on the site</h3>
                        <a href="{{ route('setting.classes.create') }}" class="btn btn-primary">Class Add</a>
                    @endif
                </div>
                <div class="tab-pane fade" id="Trainers-md" role="tabpanel" aria-labelledby="Trainers-tab-md">
                    @if ($coachs->count() > 0)
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <h2 style="margin-top: 0px;font-size: 22px;font-family: 'Times New Roman'">The Trainers</h2>
                            <thead>
                                <tr>
                                    <th>#Trainer Name</th>
                                    <th>#Trainer Spicaliztion</th>
                                    <th>#Certificates</th>
                                    <th>#Edit</th>
                                    <th>#Delete</th>
                                </tr>
                            </thead>
                            @foreach ($coachs as $coach)
                                <tbody>
                                    <tr>
                                        <td><strong>{{ $coach->full_name }}</strong></td>
                                        <td>
                                            @foreach ($coach->courses as $course)
                                                <Strong>{{ $course->sport_type }}</Strong>
                                            @endforeach
                                        </td>
                                        <td>
                                            <Strong>{{ $coach->certificate }}</Strong>
                                        </td>
                                        <td>
                                            <a href="{{ route('coach.edit', ['id' => $coach->id]) }}"
                                                class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('coach.delete', ['id' => $coach->id]) }}"
                                                class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3>Not have any Trainer on the Site</h3>
                        <a href="{{ route('coachs.create') }}" class="btn btn-primary">Trainer Add</a>
                    @endif
                </div>
                <div class="tab-pane fade show" id="Members-md" role="tabpanel" aria-labelledby="Members-tab-md">
                    @if ($service->count() > 0)
                        <p>
                        <h2>Members Messages is Here!</h2>
                        </p>
                        <div class="row justify-content-center">
                            @foreach ($service as $item)
                                <div class="col-lg-4" style="font-size: 18px;font-family: 'Times New Roman'">
                                    <div class="card" style="margin:5px">
                                        <div class="card-header">
                                            <h4>Message</h4>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $item->first_name }} {{ $item->last_name }}</h4>
                                            <p class="card-text">{{ $item->message }}</p>
                                            <strong>{{ $item->created_at->toFormattedDateString() }}</strong>
                                        </div>
                                        <code>{{ $item->created_at->diffForHumans() }}</code> {{-- toFormattedDateString() --}}
                                        <div class="card-footer text-muted">
                                            <a href="{{ route('setting.service.delete', ['id' => $item->id]) }}"><i
                                                    class="fa fa-trash-o"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            @else
                <h1>Not found any receive message </h1>
                @endif
            </div>
            <div class="card-footer">
                <h5>The Settings</h5>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

{{-- @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li class="nav-item active">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif --}}
