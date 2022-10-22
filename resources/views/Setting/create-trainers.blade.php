@extends('layouts.app')
@section('content')
<div class="right_col" role="main" style="background-color:#faf4ff">
    <div class="row  justify-content-center">
        <div class="col-md-9">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Trainers Info<small>Data Register </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                        @if (session()->has('createtrainer'))
                        <div class="row justify-content-center">
                            <div class="alert alert-success">
                                {{session()->get('createtrainer')}}
                            </div>
                        </div>
                        @endif

                        <form  action="{{route('setting.trainers.store')}}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                              <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Name</label>
                              <input type="text" class="form-control" name="trainer_name" style="border-color: darkcyan;border-radius:12px" placeholder="Enter trainer name">
                            @error('trainer_name')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Specialization</label>
                                <input type="text" class="form-control" name="trainer_type" style="border-color: darkcyan;border-radius:12px" placeholder="Enter trainer specialization">
                              @error('trainer_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Certificates</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Enter Inforamtions Here plaese...!!!!" name="certificates" class="@error('certificates') is-invalid @enderror"
                                style="border-color: darkcyan;border-radius:12px"></textarea>
                                @error('trainer_photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                                <br>
                                <label style="
                                  font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Photo</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="trainer_photo" style=" color: #0f0f0f;font-family: 'Times New Roman'" class="@error('trainer_photo') is-invalid @enderror">
                                    <label class="custom-file-label" for="validatedCustomFile" style="
                                    color: #0f0f0f;font-family: 'Times New Roman'">Choose file ...</label>
                                    @error('trainer_photo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                  <br>
                                  <div class="row justify-content-center">
                                    <a href="{{route('setting')}}" class="btn btn-outline-warning"><i class="fa fa-home"></i> Home</a>
                                    <button type="submit" class="btn btn-outline-success">Data Save</button>
                                </div>
                          </form>
            </div>
        </div>

    </div>
</div>


@endsection


