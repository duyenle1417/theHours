<div class="menu">
        <nav>
            <ul id="main-menu">
                <li><a href="<?php echo BASE_URL ?>"><i class="fas fa-home"></i> Home</a></li>
            <?php
                $parent_topics = getParentTopics();
                foreach ($parent_topics as $parent_topic) {
                    $sub_topics = getSubTopics($parent_topic['id']); ?>
                    <li>
                        <a href="category.php?id=<?php echo $parent_topic['id']; ?>">
                            <?php echo $parent_topic['name'] ?>
                            <?php
                            // if the parent topic has subtopic => arrow
                            // and list all subtopic
                            if (count($sub_topics)>0) { ?>
                            <span><i class="fas fa-sort-down"></i></span>
                        </a>

                        <div class="sub-menu">
                            <ul>
                            <?php
                            foreach ($sub_topics as $sub_topic) { ?>
                                <li>
                                    <a href="category.php?id=<?php echo $sub_topic['id']; ?>">
                                        <?php echo $sub_topic['name']; ?>
                                    </a>
                                </li>
                            <?php }; ?>
                            </ul>
                        </div>
                            <?php
                        } //else close tag </a> => end
                        else {?>
                        </a>
                        <?php } ?>
                    </li>
                    <?php
                };

                // if LOGGED IN
                //login btn OR profile menu
                if (isset($_SESSION['user_id'])) {?>
                    <li><a href="<?php echo BASE_URL . "profile.php?id=" . $_SESSION['user_id'] ?>" style="text-transform: none;"><span><i class="fas fa-portrait"></i></span> <?php echo $_SESSION['user_username'] ?> <span><i class="fas fa-sort-down"></i></span></a>
                    <div class="sub-menu">
                        <ul> 
                        <?php
                        // if role =  admin or = author => show dashboard
                        if ($_SESSION['user_role_id'] !== 3) { ?>
                            <li>
                                <a href="<?php echo BASE_URL . "admin/dashboard.php" ?>">
                                    Dashborad
                                </a>
                            </li>
                        <?php }?>
                            <li>
                                <a href="<?php echo BASE_URL . "profile.php?id=" . $_SESSION['user_id'] ?>">
                                My Profile
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL . "change-password.php?id=" . $_SESSION['user_id'] ?>">
                                Change password
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL . "logout.php" ?>">
                                <span><i class="fas fa-sign-out-alt"></i></span>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                    </li>
                    <?php
                } else {?>
                    <li>
                        <a href="<?php echo BASE_URL . "login.php" ?>" style="text-transform: none;"><span><i class="fas fa-sign-in-alt"></i></span> Login <span><i class="fas fa-sort-down"></i></span></a>
                        <div class="sub-menu">
                            <ul> 
                                <li>
                                    <a href="<?php echo BASE_URL . "signup.php" ?>">
                                    <span><i class="fas fa-user-plus"></i></span> Signup
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>