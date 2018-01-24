<div class="md-modal md-effect-3 common-form" id="makeOfferDiv">
	<div class="md-content on-registration">
		<button class="md-close">x</button>
		<h2 class="popup-heading">Enter offer price with description</h2>
		<form id="makeOfferForm" class="drp-lst" action="make-offer" method='post'>
			<div id="general-ajax-load" class="signipopup" style="display:none">
				{!! Html::image('assets/userpanel/images/loading.gif') !!}
			</div>
			<div class="common-inner-form">

				<input type='hidden' name="_token" value="{{csrf_token()}}" />
				<input type="hidden" id="bidtaskid" value="{{ $slugcase->id }}" name="task_id">

				<div class="form-group price-div" style="padding: 20px">
					<label for="offerprice">Enter the Offer Price</label>
					<input id="offerprice" name="offer_price" value="" type="number" >
					<span class="help-block">
                    	<strong id="offerprice-error"></strong>
                    </span>
				</div>

				<div class="form-group description-div"  style="padding: 20px">
					<label for="description">Enter description</label>
					<textarea id="description" name="description" rows="4" cols="73"></textarea>
					<span class="help-block">
                    	<strong id="description-error"></strong>
                    </span>
				</div>

				<span>
					<button id="makeOfferButton" class="button-cta button-lrg center">Continue</button>
				</span>

			</div>
		</form>
	</div>
</div>