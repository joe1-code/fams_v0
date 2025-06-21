<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark bg-gradient-x-black-blue navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>

                {{-- <imgalt="stackadminlogo"src="asset_url()."/nextbyte/img/wcf_big_logo_small.jpg" --" class="brand-logo"> --}}

                    <h2 class="brand-text">WORKERS COMPENSATION FUND..</h2>
                    {{-- <h2 class="brand-text">@lang("labels.general.wcf_brief")</h2></a></li> --}}
                    <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a></li>
      {{--               <li class="dropdown nav-item mega-dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">@lang("labels.backend.mis")</a>
                        <ul class="mega-dropdown-menu dropdown-menu row">
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list-ul"></i> @lang("labels.backend.statement.title") </h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li><a href="{{ route("backend.organization.statement.interest") }}" class="dropdown-item"><i class="fa fa-level-up"></i> @lang("labels.backend.statement.interest.title") </a></li>
                                            <li><a href="{{ route("backend.organization.statement.payment_receipt") }}" class="dropdown-item"><i class="fa fa-money"></i> @lang("labels.backend.statement.payment.title") </a></li>
                                            <li><a href="{{ route("backend.organization.statement.employee_contribution") }}" class="dropdown-item"><i class="fa fa-users"></i> @lang("labels.backend.statement.contribution.title") </a></li>
                                            <li><a href="{{ route("backend.organization.statement.missing_contribution") }}" class="dropdown-item"><i class="fa fa-object-ungroup"></i> @lang("labels.backend.statement.missing.title") </a></li>
                                            <li><a href="{{ route("backend.organization.statement.receipt") }}" class="dropdown-item"><i class="fa fa-newspaper-o"></i> @lang("labels.backend.statement.receipt.title") </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-info"></i> @lang("labels.backend.info") </h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li><a href="#" class="dropdown-item"><i class="fa fa-university"></i> @lang("labels.backend.organization.title") </a></li>
                                            <li><a href="#" class="dropdown-item"><i class="fa fa-connectdevelop"></i> @lang("labels.backend.inspection") </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-book"></i> @lang("labels.backend.documentation.title") </h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li><a href="#" class="dropdown-item"><i class="fa fa-bookmark"></i> @lang("labels.backend.documentation.manual") </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3">
                                <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-question-circle-o"></i> @lang("labels.backend.help.title") </h6>
                                <ul class="drilldown-menu">
                                    <li class="menu-list">
                                        <ul>
                                            <li><a href="#" class="dropdown-item"><i class="fa fa-info-circle"></i> @lang("labels.backend.help.about") </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon ft-maximize"></i></a></li>
                    
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                    
                    <li class="dropdown dropdown-user nav-item">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                            <span class="avatar avatar-online">
                                <img src=" {{ "/app-assets/images/portrait/small/avatar-s-1.png"  }}" alt="avatar">
                                <i></i>
                            </span>
                            {{--  <span class="user-name">{{ access()->user()->name_formatted }}</span> --}}
                            <span class="user-name">

                                @php
                                    $imperson = strtoupper(session()->get('officer_name'));
                                @endphp
                                {{ $imperson ? $imperson." AS ": '' }}

                            <span>&nbsp;</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"><i class="ft-user"></i> @lang("labels.backend.profile.edit") </a>
                            @role('user')
                            <a href="#" class="dropdown-item"><i class="ft-users"></i> @lang("labels.backend.profile.add_user") </a>
                            <a href="#" class="dropdown-item"><i class="ft-eye"></i> @lang("labels.backend.profile.view_added_user") </a>
                            @endrole
                            <a href="#" class="dropdown-item"><i class="fa fa-key"></i> @lang("labels.backend.profile.password.change") </a>
                            <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="ft-power"></i> @lang("labels.general.logout") </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
