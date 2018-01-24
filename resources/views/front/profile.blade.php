    @extends('layouts.front')
    @section('title','The law app')
    @section('content')
        <div class="container inner_content">
            <div class="row">
                <!-- Left Dashboard Area-->
                <div class="col-md-2 bashboard_left">
                    @include('front.partials.sidebar')
                </div>

                <!-- Right Dashboard Area-->
                <div class="col-md-10">
                    <div class="dashboard-right">

                        <div class="dash-title">
                            <h2>Profile</h2>
                        </div>
                        <div class="progress profile-progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $user->profile_completion }}" aria-valuemin="0" aria-valuemax="100" 
                            style="width: {{ $user->profile_completion }}%">
                                <span class="sr-only">{{ $user->profile_completion }}% Complete (success)</span>
                            </div>
                        </div>

                        <!-- Right Area-->
                        <div class="profile-container">
                            <form role="form" action="{{url('saveprofile')}}" method="post" data-toggle="validator" enctype="multipart/form-data">
                             {{csrf_field()}}
                                <div class="upload-photo form-group">
                                    <p>Upload Photo</p>
                                    @if(!empty(Auth::user()->profile_image))
                                        <img class="img-rounded" style="width:50px; height:50px"
                                            src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                    @else
                                        {{ Html::image('assets/front/img/avatar.png') }}
                                    @endif
                                    <label for="picp" class="button_portfolio">Select Profile image</label>
                                    <input type="file" id="picp" name="pofile_pic" accept="image/*" style="display:none">
                                    <span>
                                        <span style="display:none" id="profile-image-upload" class="button-cta button-lrg center ">Upload Profile</span>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label " for="fname">First name</label>
                                    <input class="form-control" id="fname" name="fname" type="text" required value ="{{ $user->fname }}"  />
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="lname">Last name</label>
                                    <input class="form-control" id="lname" name="lname" type="text" value ="{{ $user->lname }}" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="address" required>Location</label>
                                    <input class="form-control" id="address" name="address" type="text" value ="{{ $user->address }}" />
                                </div>
                                <div class="form-group">
                                    <!-- Email field -->
                                    <label class="control-label requiredField" for="email">Email<span class="asteriskField">*</span></label>
                                    <input class="form-control" id="email" name="email" type="email" required value ="{{ $user->email}}" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="datepicker" >Date of Birth</label>
                                    <input class="form-control" name="dob" type="text" required id="datepicker" value ="{{ $user->dob}}"/>
                                </div>

                                <div class="form-group">
                                    <!-- Subject field -->
                                    <label class="control-label " for="abn">Australian Business Number</label>
                                    <input class="form-control" id="abn" name="abn" type="text" value ="{{ $user->abn }}" />
                                </div>

                                <div class="form-group">
                                    <!-- Message field -->
                                    <label class="control-label " for="description">Description</label>
                                    <textarea class="form-control" cols="40" id="description" name="description" rows="10">{{ $user->description}} </textarea>
                                </div>

                                <div class="form-group">
                                    <button class="pro-save btn btn-primary " name="submit" type="submit">Save Profile</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    @endsection