<div class="left-side-bar app-bg-black">
    <div class="brand-logo">
        <a href="{{url('')}}" target="_blank" class="text-center justify-content-center">
            <img class="img-fluid" src="{{asset('img/RadioZ7.png')}}" alt="">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <!-- ACCUEIL -->
                <li>
                    <a href="{{route('home')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Accueil</span>
                    </a>
                </li>

                @if (in_array(Auth::user()->role,['ADMIN','PROMOTEUR']))
                <!-- STATIONS -->

                <li class="dropdown @if(isRouteActivatedIn(["produit.index", "produit.create"])) show @endif">
                    <a href="javascript:;" class="dropdown-toggle"
                       @if(isRouteActivatedIn(["produit.index", "produit.create"])) data-option="on" @endif>
                        <span class="micon fa fa-podcast"></span><span class="mtext">Produits</span>
                    </a>
                    <ul class="submenu" @if(isRouteActivatedIn(["produit.index", "produit.create"])) style="display: block" @endif>
                        <li><a href="{{route('produit.index')}}">Liste</a></li>
                @if (in_array(Auth::user()->role,['ADMIN']))

                        <li><a href="{{route('produit.create')}}">Ajout</a></li>
                @endif

                    </ul>
                </li>
                @endif



                @if (in_array(Auth::user()->role,['ADMIN']))
   <!-- COMMENTAIRE -->
                <!-- ABONNES -->
                <li class="@if(isRouteActivatedIn(["commande.index", "commande.index"])) active @endif">
                    <a href="{{route('commande.index')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-message"></span><span class="mtext">Commande</span>
                    </a>
                </li>


                <!-- CENTRE D'INTERET -->
                <li class="dropdown @if(isRouteActivatedIn(["categorie.index", "categorie.create", "categorie.edit"])) show @endif">
                    <a href="javascript:;" class="dropdown-toggle"
                       @if(isRouteActivatedIn(["categorie.index", "categorie.create", "categorie.edit"])) data-option="on" @endif>
                        <span class="micon fa fa-shower"></span><span class="mtext">Categories</span>
                    </a>
                    <ul class="submenu" @if(isRouteActivatedIn(["categorie.index", "categorie.create", "categorie.edit"])) style="display: block" @endif>
                        <li><a href="{{route('categorie.index')}}">Liste</a></li>
                        <li><a href="{{route('categorie.create')}}">Ajout</a></li>
                    </ul>
                </li>

                <!-- ABONNES -->
                <li class="@if(isRouteActivatedIn(["users.listAbonnes"])) active @endif">
                    <a href="{{route('users.listAbonnes')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user-3"></span><span class="mtext">Abonnés</span>
                    </a>
                </li>


                <!-- UTILISATEURS -->
                <li class="dropdown @if(isRouteActivatedIn(["users.index", "users.create"])) show @endif">
                    <a href="javascript:;" class="dropdown-toggle"
                       @if(isRouteActivatedIn(["users.index", "users.create"])) data-option="on" @endif>
                        <span class="micon fa fa-users"></span><span class="mtext">Utilisateurs</span>
                    </a>
                    <ul class="submenu" @if(isRouteActivatedIn(["users.index", "users.create"])) style="display: block" @endif>
                        <li><a href="{{route('users.index')}}">Liste</a></li>
                        <li><a href="{{route('users.create')}}">Ajout</a></li>
                    </ul>
                </li>
                @endif


            </ul>
        </div>
    </div>
</div>
