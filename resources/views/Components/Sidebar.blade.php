<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" >
            <i class="fas fa-tachometer-alt pl-1 pr-4"></i>
           {{ __('Dashboard / Home') }}<span class="badge badge-info"></span></a></li>
    <!-- <li class="c-sidebar-nav-title">" __('') }}</li> -->

    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show" style="padding:0px; margin-bottom:-1px;">
        <a class="c-sidebar-nav-link" href="{{route('category.create')}}">
            <i class="fas fa-people-arrows pl-1 pr-4"></i> {{ __('Add Category') }}
        </a>
    </li>
</ul>