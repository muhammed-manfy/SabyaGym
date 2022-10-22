@extends('layouts.app')
@section('content')
<div class="right_col" role="main" style="background-color:#faf4ff">
    <div class="row  justify-content-center">
        <div class="col-md-7">
            <div class="x_panel">
                @if (session()->has('Updatedtrainer'))
                    <div class="row justify-content-center">
                        <div class="alert alert-success">
                            {{session()->get('Updatedtrainer')}}
                            </div>
                    </div>
                @endif
                <div class="x_title">
                    <h2>Trainers Info<small>Data Edit </small></h2>
                    <div class="clearfix"></div>
                </div>

                <form  action="{{route('setting.trainers.update',['id'=>$t->id])}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Name</label>
                      <input type="text" class="form-control" name="trainer_name"
                      class="@error('trainer_name') is-invalid @enderror" style="border-color: darkcyan;border-radius:12px" value="{{$t->trainer_name}}">
                    @error('trainer_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Specialization</label>
                        <input type="text" class="form-control" name="trainer_type"
                        class="@error('trainer_type') is-invalid @enderror" style="border-color: darkcyan;border-radius:12px" value="{{$t->trainer_type}}">
                      @error('trainer_type')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>

                    <div class="form-group">
                        <label  style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Certificates</label>
                        <textarea class="form-control"  rows="3"
                        value="Enter Inforamtions Here plaese...!!!!" name="certificates" class="@error('certificates') is-invalid @enderror"
                        style="border-color: darkcyan;border-radius:12px">{{$t->certificates}}</textarea>
                        @error('certificates')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        <br>
                         <label style="
                          font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Photo</label>
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="trainer_photo" class="@error('trainer_photo') is-invalid @enderror"style=" color: #0f0f0f;font-family: 'Times New Roman'" class="@error('trainer_photo') is-invalid @enderror">
                            <label class="custom-file-label"   style="
                            color: #0f0f0f;font-family: 'Times New Roman'">{{$t->trainer_photo}}</label>
                            @error('trainer_photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                          <br>
                          <div class="row justify-content-center">
                            <a href="{{route('setting')}}" class="btn btn-outline-warning"><i class="fa fa-home"></i> Home</a>
                            <button type="submit" class="btn btn-outline-success">Data Update</button>
                     </div>
                  </form>
            </div>
        </div>
    </div>
</div>


@endsection
