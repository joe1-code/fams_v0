{{-- <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow "> --}}
<style>
.blink {
  animation: animate 1.5s linear infinite;
  border: 1px solid rgb(251, 21, 21);
  padding: 4px;
  border-radius: 50%;
  font-weight: bold;
}
@keyframes animate{
   0%{
     opacity: 0;
   }
   50%{
     opacity: 0.7;
   }
   100%{
     opacity: 0;
   }
 }
/* .border_info{
    border: 1px solid rgb(232, 102, 102);
    padding: 4px;
    border-radius: 50%;
} */
</style>

<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow ">
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
    <li class=" navigation-header mt-1 ml-3 pt-3 pb-3 hidden-md-down " style="width: 60%; height: 60%; background: white; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;box-shadow: 0px 0px 5px #AAAAAA">
                <span>
                    {{-- @lang("labels.general.menu.title") --}}
                    <img alt="Logo" src="{{ "/nextbyte/img/wcf_big_logo_no_background.png" }}" class="brand-logo " style="width: 100px;">
                </span>
                <i data-toggle="tooltip" data-placement="right" data-original-title="Menu" class=" ft-minus"></i>
            </li>
    <li class=" navigation-header"><span>@lang("labels.general.menu.title")</span><i data-toggle="tooltip" data-placement="right" data-original-title="Menu" class=" ft-minus"></i>
      </li>
      @role('user')

      <li data-menu="dropdown" class="dropdown nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-home"></i><span>@lang("labels.backend.dashboard")</span>
        </a>
    </li>

    <li data-menu="dropdown" class="dropdown nav-item">
      <a href="#" class="nav-link">
        <i class="fa fa-mail-reply-all"></i><span>Reversed Issues</span>
        <span class="badge notification blink">checks.</span>
      </a>
    </li>


</div>
