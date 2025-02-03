 <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color:rgba(255, 196, 133, 0.9);">

                <!-- <div class="login-div">
                    <select name="" id="">
                        <option value="">
                        <i class="fa-solid fa-user-large"></i></option>
                        <option value=""></option>
                        <option value=""></option>            
                    </select>
                </div> -->

                <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <i class="fa-solid fa-user-large"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start ">
                    <!-- php  -->
                    <?php
                        if(isset($_POST['Logout'])){    
                            session_unset();
                            session_destroy();
                            // header("Location:login.php");
                            // exit();
                        }
                    ?>
                    <li>
                    <form action="../index.php" method="POST">
                    <button class="dropdown-item" type="submit" name="Logout">Logout</button>
                    </form>    
                    </li>
                </ul>
                </div>
                    <!-- Topbar Navbar -->
                </nav>
       