<?php
$userId = $_SESSION['staffId'];
$query = mysqli_query($con,"select * from users where user_id='$userId'");
$row = mysqli_fetch_array($query);
$staffFullName = $row['fname'].' '.$row['lname'];
?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li class="menu-title"><?php echo $staffFullName;?></li>
                <li class="<?php if($page=='dashboard'){ echo 'active'; }?>">
                    <a href="index"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
            <li class="menu-title">Projects</li>
                <li class="menu-item-has-children dropdown <?php if($page=='faculty'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Choose</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="dshCreateProject">Create Project</a></li>
                        <li><i class="fa fa-eye"></i> <a href="dshShowProjects"> Projects</a></li>
                    </ul>
                </li>
                <li class="menu-title">Progress</li>
                <li class="menu-item-has-children dropdown <?php if($page=='student'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Choose</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="dshShowProjectsForTask">Record Task</a></li>
                        <li><i class="fa fa-plus"></i> <a href="dshShowProjectsForMilestone">Record Milestone</a></li>
                    </ul>
                </li>
                <li class="menu-title">Discussions</li>
                <li class="menu-item-has-children dropdown <?php if($page=='faculty'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Choose</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="dshShowProjectsForDiscussion">Join Discussion</a></li>
                        <li><i class="fa fa-eye"></i> <a href="dshShowProjectsForDiscussed">Discussed</a></li>
                    </ul>
                </li>
            
                <li class="menu-title">Resource Sharing</li>
                    <li class="menu-item-has-children dropdown <?php if($page=='result'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Choose</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus"></i> <a href="dshShowProjectsResources">Explore Resources</a></li>
                    </ul>
                </li>

                <li class="menu-title">Account</li>
                <li class="menu-item-has-children dropdown <?php if($page=='profile'){ echo 'active'; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Profile</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-key"></i> <a href="changePassword">Change Password</a></li>
                        </li>
                    </ul>
                        <li>
                    <a href="logout"> <i class="menu-icon fa fa-power-off"></i>Logout </a>
                </li>
                </li>
            </ul>
        </div>
    </nav>
</aside>