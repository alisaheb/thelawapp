<!-- <link href="{{asset('userpanel/js/vue.js')}}" rel="stylesheet" />
	<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>-->
<div class="page-footer">
    <div class="content">
        <div class="menu-hierarchy row">
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Discover</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('public/assets/userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('public/assets/userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a href="http://laww.com.au/info/about-the-law-app/" class="button">About The Law App</a>
                    <a href="http://laww.com.au/info/how-it-works-for-clients/" class="button">How It Works for clients</a>
                    <a href="http://laww.com.au/info/how-it-works-for-lawyers/" class="button">How It Works for lawyers</a>
                    <a href="http://laww.com.au/info/trust-and-quality/" class="button">Trust and Quality</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Company</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a href="http://laww.com.au/blog/" class="button">Press</a>
                    <a href="http://laww.com.au/info/marketplace-rules/" class="button">Marketplace Rules</a>
                    <a href="http://laww.com.au/info/the-law-app-privacy-policy/" class="button">The Law App Privacy Policy</a>
                    <a href="http://laww.com.au/info/the-law-app-terms-and-conditions/" class="button">The Law App Terms and Conditions</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Existing Members</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a href="http://support.laww.com.au/" class="button">Support Center</a>
                    <a href="http://community.laww.com.au/" class="button">Community</a>
                    <a href="http://laww.com.au/info/disclaimer/" class="button">Disclaimer</a>
                    <a href="http://laww.com.au/info/vision-and-mission/" class="button">Vision And Mission</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Categories</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a class="button" href="http://laww.com.au/">Property Law</a>
                    <a class="button" href="http://laww.com.au/">Real Estate Law</a>
                    <a class="button" href="http://laww.com.au/">Financial Law</a>
                    <a class="button" href="http://laww.com.au/">Criminal Law</a>
                    <a class="button" href="http://laww.com.au/">Family Law</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-links small">
        <div class="content">
            <div class="app-stores">
                <a target="_blank" href="#">{!! Html::image('assets/userpanel/images/google-play.png','Google play') !!} </a>
                <a target="_blank" href="#">{!! Html::image('assets/userpanel/images/apple-store.png','Apple store') !!} </a>
            </div>
            <div class="social">
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="facebook-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#facebook-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="twitter-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#twitter-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="google-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#google-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="youtube-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#youtube-circle')}}"/>
                    </svg>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="footer-pty-ltd center">
        <!-- <svg width="19" height="19" viewBox="0 0 19 19" version="1.1" class="lawyer-logo-small">
            <use x='0' y='0' width='19' height='19' xlink:href='images/icons/icon_definitions.svg#AirtaskerLogoSmall' />
            </svg> -->
        <!--<img src="{{asset('userpanel/images/footer-logo.png')}}">-->
        <span class="lawyer-company-details">Lawyer Pty. Ltd 2011-2016©, All rights reserved</span>
    </div>
</div>