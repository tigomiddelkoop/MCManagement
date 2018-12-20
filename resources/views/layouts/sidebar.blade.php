<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        {{-- General Stuff --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Analytics</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{ route('analytics') }}"><i class="fa fa-bar-chart"></i> <span>Analytics</span></a></li>
        </ul>
        {{-- Player Information--}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Minecraft</li>
            <li><a href="{{ route('networkmanagerPlayersIndex') }}"><i class="fa fa-users"></i><span>Players</span></a></li>
            {{--<li><a href="#"><i class="fa fa-user-times"></i> <span>Punishments [NETWORKMANAGER]</span></a></li>--}}
            @if($settings['litebans_integration'] == 1)
                <li class="treeview">
                    <a href="#"><i class="fa fa-user-times"></i><span>Punishments [LITEBANS]</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('litebansIndex') }}">Overview</a></li>
                        <li><a href="{{ route('litebansShow', ['type' => 'bans']) }}">Bans</a></li>
                        <li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Kicks</a></li>
                        <li><a href="{{ route('litebansShow', ['type' => 'mutes']) }}">Mutes</a></li>
                        <li><a href="{{ route('litebansShow', ['type' => 'warnings']) }}">Warnings</a></li>
                    </ul>
                </li>
            @endif
            <li><a href="index.php?page=minecraft_serverstatus"><i
                            class="fa fa-server"></i><span>Server Status</span></a></li>
        </ul>
        {{-- NETWORKMANAGER (MINECRAFT)--}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NetworkManager (Minecraft)</li>
            <li><a href=""><i class="fa fa-server"></i><span>NetworkManager Settings</span></a></li>
            <li><a href=""><i class="fa fa-language"></i><span>Language</span></a>
            {{--<li><a href="{{ route('networkmanagerMOTD') }}"><i class="fa fa-calendar"></i><span>MOTD</span></a>--}}
            {{--<li><a href="{{ route('networkmanagerServers') }}"><i class="fa fa-server"></i><span>Servers</span></a></li>--}}
            <li><a href="{{ route('networkmanagerAnnouncementsIndex') }}"><i class="fa fa-comment"></i><span>Announcements</span></a>


            </li>
        </ul>
        {{-- NAMELESS (NAMELESSMC)--}}
        @if($settings['nameless_integration'] == 1)
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Nameless (Forum)</li>
            <li><a href=""><i class="fa fa-users"></i><span>Users</span></a></li>
            <li><a href=""><i class="fa fa-user-times"></i><span>Banned Users</span></a>
            </li>
        </ul>
        @endif
        {{-- FEEDBACK MODULE --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Modules</li>
            <li class="treeview">
                <a href="#"><i class="fa fa-user-times"></i> <span>Feedback</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('litebansShow', ['type' => 'bans']) }}">Responses</a></li>
                    <li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Form Questions</a></li>
                    <li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Servers for form</a></li>
                </ul>
            </li>
        </ul>
        {{-- PANEL SETTINGS --}}
        @hasrole('owner')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Panel</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ route('panelUserDashboard') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('panelSettingsGeneralIndex') }}">General</a></li>
                    <li><a href="{{ route('panelSettingsLanguageIndex') }}">Language</a></li>
                </ul>
            </li>
        </ul>
        @endhasrole
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>