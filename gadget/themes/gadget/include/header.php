  <header id="header" class="header headerSticky colZero col24">
  <nav class="colZero col24 top">
        <div class="centerContLarge">
            <!--<span class="slogan">smart needs, smart solutions</span>-->
            <ul class="right FR">
                <li class="login">
                    <div class="cityName FR">Mumbai</div>
                    <div class="rightSideLinks FR anchorAnimate">
                        <a href="javascript:void(0);">Login</a> <span>|</span> <a href="javascript:void(0);">Signup</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="main colZero col24 headerMain relative">
        <div class="centerContLarge relative">
            <a href="<?php echo Yii::app()->createUrl('site/index')?>" class="logo FL">
                <img class="desktopLogo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/smart-gadget-logo.png" alt="Smart Gadget" title="Smart Gadget" />
                <img class="deviceLogo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/smart-gadget-icon.png" alt="Smart Gadget" title="Smart Gadget" />
            </a>
            <a class="menuIcon FR mobMenuIcon" href="javascript:void(0);">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </a>
            <div class="searchWrap FR">
                <div class="search noAnchorAnimate FL"><a href="javascript:void(0);" class="btSearch showSearchForm">a</a></div>
                <div class="postAdd noAnchorAnimate FL"><a href="<?php echo Yii::app()->createUrl('postadd/index')?>" class="btn btn-primary postBtn">Post ad</a></div>
                <div class="searchForm">
                    <a href="javascript:void(0);" class="closeModal showSearchForm icon-cross FR">&times;</a>
                    <form id="search_form" class=" colZero col24">
                        <div class="row colZero col24">
                            <div class="textField">
                                <input type="text" class="" placeholder="Search for your favorite deals">
                            </div>
                            <div class="searchFormRight FR">
                                <div class="search FR">
                                    <button type="button" class="btn colZero col24 btSearch showSearchForm">Search</button>
                                </div>
                                <div class="customDropdownWrap">
                                    <div class="customDropdown ">
                                        <select class="customDropdown_select">
                                            <option>Select Category</option>
                                            <option>Mobile</option>
                                            <option>Tablet</option>
                                            <option>Laptop</option>
                                            <option>Computer</option>
                                            <option>Camera</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="siteLinks text-center">
                <ul class="menu anchorAnimate ">
                    <li class="searchLink"><a href="search.html">Search</a></li>
                    <li class="firstLink"><a href="<?php echo Yii::app()->createUrl('deals/index')?>" class="active">Deals</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('brands/index')?>">Brands</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('reviews/index')?>">Reviews</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('news/index')?>">Latest News</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('compare/index')?>">Compare</a></li>
                </ul>
            </div>
        </div>
    </nav>
		</header>