<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Portal do Fornecedor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <li class="nav-item">
        <a class="nav-link" href="#">
            {{-- <a class="nav-link" href="{{ route('suporte') }}"> --}}
            <i class="fas fa-fw fa-envelope"></i>
            <span>Suporte</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/empenhos-emitidos">
            <i class="fas fa-fw fa-file-invoice-dollar"></i>
            <span>Empenhos Emitidos</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Prestação de Contas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Consultas:</h6>
                <a class="collapse-item" href="/exportador-contabil">Exportar</a>
                <a class="collapse-item"  href="/orcamentario">Orçamentario</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}


    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<style>
    .bg-gradient-primary {
        background-color: #035c87 !important;
        background-image: unset;
    }
</style>
