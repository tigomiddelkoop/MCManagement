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
            <li><a href="{{ route('networkmanagerPlayersIndex') }}"><i class="fa fa-users"></i><span>Players</span></a>
            </li>
            {{--<li><a href="#"><i class="fa fa-user-times"></i> <span>Punishments [NETWORKMANAGER]</span></a></li>--}}
            @if($settings['litebans_integration'] == 1)
                @can('litebans.access')
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user-times"></i><span>Punishments [LITEBANS]</span>
                            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('litebans.overview')
                                <li><a href="{{ route('litebansIndex') }}">Overview</a></li>
                            @endcan
                            @can('litebans.bans')
                                <li><a href="{{ route('litebansShow', ['type' => 'bans']) }}">Bans</a></li>
                            @endcan
                            @can('litebans.kicks')
                                <li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Kicks</a></li>
                            @endcan
                            @can('litebans.mutes')
                                <li><a href="{{ route('litebansShow', ['type' => 'mutes']) }}">Mutes</a></li>
                            @endcan
                            @can('litebans.warnings')
                                <li><a href="{{ route('litebansShow', ['type' => 'warnings']) }}">Warnings</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
            @endif
            <li><a href=""><i
                            class="fa fa-server"></i><span>Server Status</span></a></li>
        </ul>
        {{-- NETWORKMANAGER (MINECRAFT)--}}
        @can('networkmanager.access')
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">NetworkManager (Minecraft)</li>
                @can('networkmanager.settings.access')
                    <li><a href="{{ route('networkmanagerSettingsIndex') }}"><i class="fa fa-cogs"></i><span>NetworkManager Settings</span></a>
                    </li>
                @endcan
                <li><a href=""><i class="fa fa-language"></i><span>Language</span></a></li>
                @if($settingsNetworkManager['motd_enabled'])
                    <li><a href="{{ route('networkmanagerMOTDIndex') }}"><i class="fa fa-clock-o"></i><span>Message Of The Day</span></a></li>
                @endif
                @if($settingsNetworkManager['module_permissions_bungee'] || $settingsNetworkManager['module_permissions_spigot'])
                    <li><a href=""><i class="fa fa-th-list"></i><span>Permissions</span></a></li>
                @endif
                @if($settingsNetworkManager['module_servermanager'])
                    <li><a href="{{ route('networkmanagerServerIndex') }}"><i class="fa fa-server"></i><span>Server Manager</span></a>
                    </li>
                @endif
                @if($settingsNetworkManager['module_tags'])
                    <li><a href=""><i class="fa fa-tags"></i><span>Tags</span></a></li>
                @endif
                @if($settingsNetworkManager['module_filter'])
                    <li><a href=""><i class="fa fa-filter"></i><span>Filter</span></a></li>
                @endif
                @if($settingsNetworkManager['module_commandblocker'])
                    <li><a href=""><i class="fa fa-ban"></i><span>Command Blocker</span></a></li>
                @endif
                @if($settingsNetworkManager['module_announcements'])
                    <li><a href="{{ route('networkmanagerAnnouncementsIndex') }}"><i class="fa fa-bullhorn"></i><span>Announcements</span></a>
                    </li>
                @endif

            </ul>
        @endcan
        {{-- NAMELESS (NAMELESSMC)--}}
        @if($settings['nameless_integration'])
            @can('nameless.access')
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Nameless (Forum)</li>
                    <li><a href=""><i class="fa fa-users"></i><span>Users</span></a></li>
                    <li><a href=""><i class="fa fa-user-times"></i><span>Banned Users</span></a>
                    </li>
                </ul>
            @endcan
        @endif
        {{-- FEEDBACK MODULE --}}
        {{--<ul class="sidebar-menu" data-widget="tree">--}}
        {{--<li class="header">Modules</li>--}}
        {{--<li class="treeview">--}}
        {{--<a href="#"><i class="fa fa-user-times"></i> <span>Feedback</span>--}}
        {{--<span class="pull-right-container">--}}
        {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
        {{--<li><a href="{{ route('litebansShow', ['type' => 'bans']) }}">Responses</a></li>--}}
        {{--<li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Form Questions</a></li>--}}
        {{--<li><a href="{{ route('litebansShow', ['type' => 'kicks']) }}">Servers for form</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{-- PANEL SETTINGS --}}
        @can('mcmanagement.access.settings')
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Panel</li>
                @can('mcmanagement.access.settings.users')
                    <li><a href="{{ route('panelSettingsUserIndex') }}"><i class="fa fa-users"></i>
                            <span>Users</span></a></li>
                @endcan
                <li class="treeview">
                    <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('panelSettingsGeneralIndex') }}">General</a></li>
                        @can('mcmanagement.access.settings.language')
                            <li><a href="{{ route('panelSettingsLanguageIndex') }}">Language</a></li>
                        @endcan
                        @can('mcmanagement.access.settings.roles')
                            <li><a href="{{ route('panelSettingsRoleIndex') }}">Roles</a></li>
                        @endcan
                    </ul>
                </li>
            </ul>
    @endcan
    <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>