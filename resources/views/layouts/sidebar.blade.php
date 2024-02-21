<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="{{ route('/') }}"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/rkive.png') }}" style="height:40px; width:auto;" alt=""><img
                    class="img-fluid for-dark" src="{{ asset('assets/images/logo/rkive.png') }}" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
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
                            <i class="icon-home"></i>
                            <span>Home</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" wire:navigate
                            href="{{ route('request.show') }}" target="_self">
                            <i class="icon-envelope"></i>
                            <span>Request</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('ExpenseView') }}"
                            target="_self">
                            <i class="icon-money"></i>
                            <span>Expenses</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('Ai') }}"
                            target="_self">
                            <i class="icon-headphone-alt"></i><span>Assistant</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://pixelstrap.freshdesk.com/support/home" target="_blank">
                            <i class="icon-agenda"></i><span>Guide</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('policy') }}"
                            target="_self">
                            <i class="icon-stamp"></i><span>Policy</span></a></li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://pixelstrap.freshdesk.com/support/home" target="_blank">
                            <i class="icon-help"></i><span>Raise Support</span></a></li>

                    <li class="sidebar-list"><a class="sidebar-link sidebar-title"
                            href="https://docs.pixelstrap.com/cuba/laravel/document/" target="_self">
                            <i class="icon-folder"></i><span>Documentation </span></a></li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
