  @if(Auth::user()->type=='client')
  
    <div class="list vertical-scroll" style="position:relative;top:0;width:363px;height:35.6em;">
              <div class="group">
                    <div class="list-splitter">Clients</div>

                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
   
    @foreach($cases as $case)
            <div class="list-item contact-list  lawyer_{{$case->assigned_to}}  @if($requestid==$case->assigned_to) div-active @endif " id="users_{{$case->id}}"   data-client="{{$case->user_id}}" data-sendto="{{$case->assigned_to}}">
                    <div class="task-list-item">
                                    <div class="loaderific-not-loading"></div>

                                 @if(empty($case->asignee->profile_image))   
                                    <div class="image-icon">
                                            <img  class="profile_pic" style="width:15px" src="{{url('userpanel/images/image-icon.png')}}">
                                    </div>
                                 @else
                                 <div class="image-icon">
                                            <img  class="profile_pic" style="width:15px" src="{{url('../profile_images')}}/{{$case->asignee->profile_image}}">
                                    </div>
                                @endif
                                 
                        <div class="details"><a href="javascript:;" class="lawyer-name" data-id="{{$case->assigned_to}}" >{{$case->asignee->fname}} {{$case->asignee->lname}}</a>
                        </div>
        <span class="newmessage"></span>
                    </div><!--task item-->
        </div>
            @endforeach
       
     </div><!--group-->
  </div><!--vertical-scroll-->
    
        @else
    
  <div class="list vertical-scroll  " style="position:relative;top:0;width:363px;height:35.6em;">
              <div class="group">
                    <div class="list-splitter">Lawyer</div>

                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">  
       
      @foreach($cases as $case)
        <div class="list-item contact-list  client_{{$case->user_id}} @if($requestid==$case->user_id) div-active @endif" id="users_{{$case->id}}" data-sendto="{{$case->user_id}}" data-assineeid="{{$case->assigned_to}}">
		 <div class="task-list-item">
		                <div class="loaderific-not-loading"></div>

		                @if(empty($case->user->profile_image))
		                  <div class="image-icon">
		                  	<img  class="profile_pic" style="width:15px" src="{{url('userpanel/images/image-icon.png')}}">
		                  </div>
                                @else
                                 <div class="image-icon">
		                  	<img  class="profile_pic" style="width:15px" src="{{url('../profile_images')}}/{{$case->user->profile_image}}">
		                  </div>
                                @endif
		             
		                

		      <div class="details">
                                <a href="javascript:;" class="client-name"  data-id="{{$case->user_id}}">{{$case->user->fname}}</a>
                            
                   </div>
<span class="newmessage"></span>
                </div><!--task item-->
       </div>
        @endforeach
        
         </div><!--group-->
  </div><!--vertical-scroll-->
        @endif