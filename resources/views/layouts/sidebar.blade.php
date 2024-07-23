<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
      <div class="logo-wrapper"><a href="{{ route('/')}}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
      </div>
      <div class="logo-icon-wrapper"><a href="{{ route('/')}}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
      <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
          <ul class="sidebar-links" id="simple-bar">
            <li class="back-btn">
              <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
            </li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('index')}}" target="_blank">
                <svg class="stroke-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                </svg><span>Dashboard</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="https://pixelstrap.freshdesk.com/support/home" target="_blank">
                <svg class="stroke-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-social') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#fill-social') }}"></use>
                </svg><span>Raise Support</span></a></li>
            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="https://docs.pixelstrap.com/cuba/laravel/document/" target="_blank">
                <svg class="stroke-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                </svg><span>Documentation </span></a></li>
          </ul>
        </div>
<<<<<<< Updated upstream
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </nav>
=======
        <div class="logo-icon-wrapper"><a href="{{ route('/') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo1.png') }}" alt=""
                    style="height:35px; width:auto;"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" wire:navigate
                            href="{{ route('index') }}" target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Home</span></a></li>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" wire:navigate
                            href="{{ route('travel') }}" target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-form') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-form') }}"></use>
                            </svg><span>Request</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('expenses') }}"
                            target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-file') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-file') }}"></use>
                            </svg><span>Expenses</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('Ai') }}"
                            target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-chat') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-chat') }}"></use>
                            </svg><span>Ask AI</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('currency') }}"
                            target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-ui-kits') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-ui-kits') }}"></use>
                            </svg><span>Curency Converter</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('policy') }}"
                            target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-to-do') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-to-do') }}"></use>
                            </svg><span>Policy</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('events') }}"
                            target="_self">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-calendar') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-calendar') }}"></use>
                            </svg><span>Calendar</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://helpdesk.rkiveadmin.com" target="_blank">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-task') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-task') }}"></use>
                            </svg><span>Help Desk</span></a></li>

                    {{-- <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://pixelstrap.freshdesk.com/support/home" target="_blank">
                            <i class="icon-help"></i><span>Submit Tickets</span></a></li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://docs.pixelstrap.com/cuba/laravel/document/" target="_self">
                            <i class="icon-folder"></i><span>Documentation </span></a></li> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
>>>>>>> Stashed changes
    </div>
  </div>