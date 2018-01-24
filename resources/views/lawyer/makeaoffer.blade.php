<div class="md-modal md-effect-3 common-form" id="makeAOffer">
    <div class="md-content on-registration">
        <button class="md-close">x</button>
        <form id="myForm" class="drp-lst" action="" method='post'>
            <div class="post-task-heading">Proposs your best offer </div>
            <div class="common-inner-form">
					<span>
					<input id="token_one" type="hidden" name="_token" value="{{ csrf_token() }}">
						<label>Case Title</label>
						<input id="case-title" name="title" value="" type="text" required>
						<span class="error title-error">Enter Title of  Case</span>
					</span>
					<span>
						<label>Date of Incident</label>
						<input id="datepick" class="date-picker" name="date_of_incedent" value="" type="text" required>
                                            <span class="error datepick-error">Enter Title of  Date of Incedent</span>
					</span>
					<span>
						<label>Describe your case in more detail</label>
						<textarea id="description-task" name="description"></textarea>
						<span class="error description-error">Please Enter the Description</span>
						<p class="need-help">Need Help ?</p>
					</span>
					<span>
						<button id="postjob-sign-up-button-first"
                                class="button-cta button-lrg center task-continue-one">Continue
                        </button>
					</span>
            </div>
        </form>
    </div>
</div>