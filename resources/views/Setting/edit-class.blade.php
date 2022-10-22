@extends('layouts.app')
@section('content')
<div class="right_col" role="main" style="background-color:#faf4ff">
    <div class="row  justify-content-center">
        <div class="col-md-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Classes Info<small>Data Edit </small></h2>
                    <div class="clearfix"></div>
                </div>
                @if (session()->has('updatedClass'))
           <div class="row justify-content-center">
               <div class="alert alert-success">
                   {{session()->get('updatedClass')}}
                </div>
           </div>
       @endif
       <form  action="{{route('setting.classes.update',['id'=>$class->id])}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
        <div class="form-group">
          <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Group Name</label>
          <input type="text" class="form-control" name="group_name"  style="border-color: darkcyan;border-radius:12px"
          class="@error('group_name') is-invalid @enderror" value="{{$class->group_name}}">
        @error('group_name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group">
            <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Group Days</label>
            <input type="text" class="form-control" name="group_days" style="border-color: darkcyan;border-radius:12px"
            class="@error('group_days') is-invalid @enderror" value="{{$class->group_days}}">
          @error('group_days')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>

          <div class="form-group">
             <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Group Time</label>
            <input type="text" class="form-control" name="group_time" style="border-color: darkcyan;border-radius:12px" value="{{$class->group_time}}"
            class="@error('group_time') is-invalid @enderror">
          @error('group_time')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>

          <div class="form-group">
            <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Group Trainer</label>
           <input type="text" class="form-control" name="group_trainer" style="border-color: darkcyan;border-radius:12px" value="{{$class->group_trainer}}"
           class="@error('group_trainer') is-invalid @enderror">
         @error('group_trainer')
           <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>


         <div class="form-control-plaintext">
            <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Specialization</label>
           <input type="text" class="form-control" name="group_trainer_type" style="border-color: darkcyan;border-radius:12px"
           value="{{$class->group_trainer_type}}" class="@error('group_trainer_type') is-invalid @enderror">
         @error('group_trainer_type')
           <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         </div>

         <label style="font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Group Photo</label>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="validatedCustomFile" name="group_photo" style=" color: #0f0f0f;font-family: 'Times New Roman'" class="@error('group_photo') is-invalid @enderror">
            <label class="custom-file-label" for="validatedCustomFile" style="
            color: #0f0f0f;font-family: 'Times New Roman'">{{$class->group_photo}}</label>
            @error('group_photo')
            <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
            <br>
            <label style="
              font-size:large;color: #0f0f0f;font-family: 'Times New Roman'">Trainer Photo</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="validatedCustomFile" name="trainer_photo" style=" color: #0f0f0f;font-family: 'Times New Roman'" class="@error('trainer_photo') is-invalid @enderror">
                <label class="custom-file-label" for="validatedCustomFile" style="
                color: #0f0f0f;font-family: 'Times New Roman'">{{$class->trainer_photo}}</label>
                @error('trainer_photo')
                <div class="alert alert-danger invalid-feedback">{{ $message }}</div>
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
