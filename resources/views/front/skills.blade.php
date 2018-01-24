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
                            <h2>Skills</h2>
                            <hr>
                        </div>

                        <!-- Right Area-->
                        <div class="profile-container skills-container">
                            <p>These are your skills. Keep them updated with any new skills you learn so other Law App can know what you can offer.</p>

                            <form role="form" data-toggle="validator">
                                <div class="main-area skills">
                                    <!--div class="row">
                                    <?php if(isset($skills->specialities)){$spst = explode(';',$skills->specialities);} ?>
                                    @foreach($categories as $category)
                                        <div class="col-md-6">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-success">
                                                    <input type="checkbox" autocomplete="off" name="specialities[]" value="{{ $category->name}}">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                </label>
                                                <span class="title">{{ $category->name}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div-->

                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="name">My Transportationtransportation</label>
                                    <input class="form-control" id="name" name="transportation" type="text" required="" value="{{$skills->transportation}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="name">My Specialities</label>
                                    <input class="form-control" id="name" name="name" type="text" required="" value="{{$skills->specialities}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="name">Languages</label>
                                    <input class="form-control" id="name" name="languages" type="text" value="{{$skills->languages}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="name" required="">Education</label>
                                    <input class="form-control" id="name" name="education" type="text" value="{{$skills->education}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label " for="name" required="">Work</label>
                                    <input class="form-control" id="name" name="work" type="text" value="{{$skills->work}}">
                                </div>

                                <div class="form-group">
                                    <button class="pro-save btn btn-primary " name="submit" type="submit">Save Skills</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endsection