        <div class="nav-container wow bounceIn" data-wow-delay="1.5s">
        <div class="nav-utility wordColor "  >

                    <div class="module right">
                         <a href="contact.php">
                            <i class="ti-location-arrow">&nbsp;</i>
                            <span class="sub"> <?php echo $Web["WebAddress"]?></span>
                        </a>
                    </div>

                    <div class="module right">
                        <a href="contact.php">
                            <i class="ti-email">&nbsp;</i>
                            <span class="sub"><?php echo $Web["ManagerEmail"]?></span>
                        </a>
                    </div>
                    <div class="module left">
                      
                    </div>
                </div>
            <nav>
                <div class="nav-bar">
                    <div class="module left">
                        <a href="index.php">
                            <img class="logo logo-light" alt="heryi" src="img/logo-light.png" />
                            <img class="logo logo-dark" alt="heryi" src="img/logo-dark.png" />
                        </a>
                    </div>
                    <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                        <i class="ti-menu"></i>
                    </div>
                    <div class="module-group right">
                        <div class="module left">
                            <ul class="menu">
                                <li>
                                  
                                     <a href="about.php"><span class="label label-success">About Us</span></a>
                                    
                                </li>
                                <!--  -->
                                <li class="has-dropdown">
                                    <a href="#">
                                                <span class="label label-success">Products</span>
                                    </a>
                                         <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li>
                                                     <a href="productCategories.php">
                                                        Measuring
                                                     </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Garden Accessories
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Outdoor & Indoor Clocks
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Soil Test Kits
                                                    </a>
                                                   
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Thermometers
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Gardening Ties
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Plant Labels
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        Plant Supports
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        </ul> 
                                <!--  -->
                                <li>
                                    <a href="news.php">
                                                <span class="label label-success">News </span>
                                    </a>
                                </li>          
                                <li>
                                    <a href="contact.php">
                                                 <span class="label label-success">Contact Us </span>
                                    </a>
                                </li> 


                            </ul>
                        </div>
                        <!--end of menu module-->
                        <div class="module widget-handle search-widget-handle left">
                            <div class="search wordColor">
                                <i class="ti-search"></i>
                                <span class="title">Search the product</span>
                            </div>
                            <div class="function ">
                                <form class="search-form ">
                                    <input type="text" placeholder="Search the product" />
                                </form>
                            </div>
                        </div>
                        <div class="module widget-handle cart-widget-handle left">
                            <div class="cart wordColor">
                                <i class="ti-bag"></i>
                                <span id="cartListnum" class="label number">2</span>
                                <span class="title">Shopping Cart</span>
                            </div>
                            <div class="function">
                                <div class="widget">
                                    <h6 class="title">Shopping Cart</h6>
                                    <hr>
                                    <ul class="cart-overview" id="cartList">
  
                                    </ul>
                                    <hr>
                                    <div class="cart-controls">
                                        <a class="btn btn-sm btn-filled" href="cart.php">Inquiry List</a>
                                        <div class="list-inline pull-right">
                                       
                                        </div>
                                    </div>
                                </div>
                                <!--end of widget-->
                            </div>
                        </div>
                       
                    </div>
                    <!--end of module group-->
                </div>
            </nav>
        </div>
<!--end nav  -->