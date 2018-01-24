    @extends('layouts.front')
    @section('title','The law app')
    @section('content')
        <div class="container inner_content">
            <div class="row">

                <!-- Left Dashboard Area-->
                <div class="col-md-2 bashboard_left">
                    <div class="profile_image">
                        {{ Html::image('assets/front/img/profile.png') }}
                    </div>
                    <div class="dashboard-links">
                        <ul>
                            <li><a href="cases.html">Browse Cases</a></li>
                            <li><a href="payment-history.html">Payments History</a></li>
                            <li><a href="payment-methods.html">Payment Methods</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="skills.html">Skills</a></li>
                            <li><a href="verification.html">Verifications</a></li>

                        </ul>
                    </div>

                </div>

                <!-- Right Dashboard Area-->
                <div class="col-md-10">
                    <div class="dashboard-right">

                        <div class="dash-title">
                            <h2>Profile</h2>
                        </div>
                        <div class="progress profile-progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>

                        <!-- Right Area-->
                        <div class="profile-container">

                            <form role="form" data-toggle="validator">
                                <div class="upload-photo form-group">
                                    <p>Upload Photo</p>
                                    {{ Html::image('assets/front/img/avatar.png') }}
                                    <label for="picp" class="button_portfolio">Select Profile image</label>
                                    <input type="file" id="picp" name="pofile_pic" accept="image/*" style="display:none">
                                    <span>
                                        <span style="display:none" id="profile-image-upload" class="button-cta button-lrg center ">Upload Profile</span>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label " for="f-name">First name</label>
                                    <input class="form-control" id="name" name="name" type="text" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="l-name">Last name</label>
                                    <input class="form-control" id="name" name="name" type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="location-name" required>Location</label>
                                    <input class="form-control" id="name" name="name" type="text" />
                                </div>
                                <div class="form-group">
                                    <!-- Email field -->
                                    <label class="control-label requiredField" for="email">Email<span class="asteriskField">*</span></label>
                                    <input class="form-control" id="email" name="email" type="text" required/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="location-name" required>Date of Birth</label>
                                    <input class="form-control" type="text" id="datepicker">
                                </div>

                                <div class="form-group">
                                    <!-- Subject field -->
                                    <label class="control-label " for="subject">Australian Business Number</label>
                                    <input class="form-control" id="subject" name="subject" type="text" />
                                </div>

                                <div class="form-group">
                                    <!-- Message field -->
                                    <label class="control-label " for="message">Description</label>
                                    <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
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