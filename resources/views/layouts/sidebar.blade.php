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
            <li><a href="{{ route('minecraftPlayers') }}"><i class="fa fa-users"></i><span>Players</span></a></li>
            {{--<li><a href="#"><i class="fa fa-user-times"></i> <span>Punishments [NETWORKMANAGER]</span></a></li>--}}
                <li class="treeview">
                <a href="#"><i class="fa fa-user-times"></i> <span>Punishments [LITEBANS]</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('minecraftPunishmentsList', ['type' => 'bans']) }}">Bans</a></li>
                    <li><a href="{{ route('minecraftPunishmentsList', ['type' => 'kicks']) }}">Kicks</a></li>
                    <li><a href="{{ route('minecraftPunishmentsList', ['type' => 'mutes']) }}">Mutes</a></li>
                    <li><a href="{{ route('minecraftPunishmentsList', ['type' => 'warnings']) }}">Warnings</a></li>
                </ul>
            </li>
            </li>
            <li><a href="index.php?page=minecraft_serverstatus"><i class="fa fa-server"></i><span>Server Status</span></a></li>
        </ul>
        {{-- NETWORKMANAGER (MINECRAFT)--}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NetworkManager (Minecraft)</li>
            <li><a href="index.php?page=forum_users"><i class="fa fa-server"></i><span>NetworkManager Settings</span></a></li>
            <li><a href="index.php?page=forum_punishments"><i class="fa fa-language"></i><span>Language</span></a>
            {{--<li><a href="{{ route('networkmanagerMOTD') }}"><i class="fa fa-calendar"></i><span>MOTD</span></a>--}}
            {{--<li><a href="{{ route('networkmanagerServers') }}"><i class="fa fa-server"></i><span>Servers</span></a></li>--}}
            <li><a href="{{ route('networkmanagerAnnouncements') }}"><i class="fa fa-comment"></i><span>Announcements</span></a>


            </li>
        </ul>
        {{-- NAMELESS (NAMELESSMC)--}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Nameless (Forum)</li>
            <li><a href="index.php?page=forum_users"><i class="fa fa-users"></i><span>Users</span></a></li>
            <li><a href="index.php?page=forum_punishments"><i class="fa fa-user-times"></i><span>Banned Users</span></a>
            </li>
        </ul>
        {{-- FEEDBACK MODULE --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Feedback</li>
            <li><a href="index.php?page=feedback_responses"><i class="fa fa-comments"></i><span>Responses</span></a></li>
            <li><a href="index.php?page=feedback_servers"><i class="fa fa-server"></i><span>Servers for feedback</span></a></li>        </ul>
        {{-- PANEL SETTINGS --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Panel</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="index.php?page=panel_users"><i class="fa fa-users"></i> <span>Users</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>Settings</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?page=panel_settings">Settings</a></li>
                    <li><a href="index.php?page=panel_language">Language</a></li>
                    <li><a href="index.php?page=panel_servers">Servers to ping</a></li>
                </ul>-
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>