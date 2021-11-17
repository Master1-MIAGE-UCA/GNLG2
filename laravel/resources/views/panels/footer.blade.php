<!-- BEGIN: Footer-->
<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; {{ \Carbon\Carbon::now()->format('Y')}} <a href=""
          target="_blank">{{ __('locale.arkan') }}</a> {{__('locale.all_rights_reserved') }}.
      </span>
      <span class="right hide-on-small-only">
      {{__('locale.by') }} <a href="https://arkanitservices.com/ar/" target="_blank">{{ __('locale.arkan') }}</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->