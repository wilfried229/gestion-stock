<div class="header app-bg-primary">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<!--img src="{{asset('admin/vendors/images/photo1.jpg')}}" alt=""-->
                            <i class="fa text-dark fa-user"></i>
						</span>
                    <span class="user-name">{{auth()->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{route("profile.index")}}"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('formLogOut').submit()">
                        <form id="formLogOut" action="{{route('logout')}}" method="post">
                            @csrf
                        </form>
                        <i class="dw dw-logout"></i> Déconnecter
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
