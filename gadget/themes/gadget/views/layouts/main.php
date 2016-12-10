<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Smart Gadget</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

       
		<?php require_once Yii::app()->theme->basePath . '/include/css.php'; ?>
		<?php require_once Yii::app()->theme->basePath . '/include/script.php'; ?>
		
		
	</head>
    <body class="homeBody">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="homePage  colZero col24">
            <header class="header colZero col24">
                <div class="centerContLarge">
                    <a href="<?php echo Yii::app()->createUrl('site/index')?>" class="logo FL">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/smart-gadget-icon.png" alt="Smart Gadget" title="Smart Gadget" />
					</a>
                    <a class="menuIcon FR mobMenuIcon" href="javascript:void(0);">
                        <span class="one"></span>
                        <span class="two"></span>
                        <span class="three"></span>
                    </a>
                   
                    <div class="siteLinks">
                        <ul class="anchorAnimate oranceAnchorAnimt">
                            <!--<li class="searchLink showSearchForm">
                                <a href="javascript:void(0);">Search</a>
                                <div id="morphsearch" class="morphsearch">
                                    <form class="morphsearch-form">
                                        <input type="search" placeholder="Search..." class="morphsearch-input">
                                        <div class="colZero col24 ">

                                        </div>
                                        <button type="submit" class="morphsearch-submit">Search</button>
                                    </form>
                                </div>
                            </li>-->
                            <li><a href="<?php echo Yii::app()->createUrl('deals/index')?>">Deals</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('brands/index')?>">Brands</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('reviews/index')?>">Reviews</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('news/index')?>">Latest News</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('compare/index')?>">Compare</a></li>
                        </ul>
                        
                        <div class="rightSideLinks FR anchorAnimate oranceAnchorAnimt">
                            <a href="javascript:void(0);" class="showLoginModal gotologInTab">Login</a>
                            <span>|</span>
                            <a href="javascript:void(0);" class="showLoginModal gotoSignUpTab">Signup</a>
                        </div>
                    </div>
                </div>
            </header>
            <section class="homeWrapper displayTable">
                <div class="tableCell">
                    <div class="centerContLarge">
                        <div class="captions text-center">
                            <h1>Sell your used gadgets...</h1>
                            <h3>Mobiles, Tablets, Laptops, Camera...</h3>
                            <div class="actionRow">
                                <a href="<?php echo Yii::app()->createUrl('postadd/index')?>" class="btn btn-border">Post your ad</a>
                                <a href="javascript:void(0);" class="btn btn-border showHomeSearch">Search Best deal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer colZero col24">
                <div class="centerContLarge">
                    <div class="siteInfo colZero col24">
                        <div class="colZero col12 rights">All right are reserved by Smartgadget.in</div>
                        <div class="colZero col12 siteBy text-right">Website by Avec Studio</div>
                    </div>
                </div>
            </footer>
            <div class="ui-modal animated modalSignIn" style="display: none;">
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="javascript:void(0);" class="closeModal hideModal icon-cross FR">&times;</a>
                    </div>
                    <div class="modal-body">
                        <div id="formTabs" class="loginForm colZero col24">
                            <ul class="uiTabsNav colZero col24">
                                <li><a href="#login" class="logInTab">Login</a></li>
                                <li> | </li>
                                <li><a href="#signUp" class="signUpTab">Sign Up</a></li>
                            </ul>
                            <div id="login" class="uiTabsContent signInForm colZero col24">
                                <form id="loginForm" class="noBorderForm colZero col24">
                                    <div class="row row1 colZero col24">
                                        <input type="text" placeholder="Email Id" />
                                    </div>
                                    <div class="row row2 colZero col24">
                                        <input type="password" placeholder="Your Unique Password" />
                                    </div>
                                    <div class="formActionRow colZero col24">
                                        <div class="forgotPwdRow colZero col12">
                                            <a class="showForgotPwd FL forgotLink smallText" href="javascript:void(0);"><u>Forgot Password?</u></a>
                                            <div class="colZero col24 smallText notAC">
                                                Don't have an account? 
                                                <a class="showSignup smallText gotoSignUpTab" href="javascript:void(0);">
                                                    <u>Sign Up</u>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="btnWrap FR">
                                            <input type="button" value="Login" onclick="" name="loginBtn" class="btn" id="signUpTab">
                                        </div>
                                    </div>
                                    <div class="colZero col24 socialRow">
                                        <h3>Login using:</h3>
                                        <ul class="social2">
                                            <li class=""><a class="fb sprite" href="javascript:void(0);"></a></li>
                                            <li class=""><a class="gplus sprite" href="javascript:void(0);"></a></li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div id="signUp" class="uiTabsContent signUpForm colZero col24">
                                <form id="signupForm" class="noBorderForm colZero col24">
                                    <div class="row row1 colZero col24">
                                        <div class="colZero col12 col left">
                                            <input type="text" placeholder="First Name" class="colZero col22" />
                                        </div>
                                        <div class="colZero col12 col right">
                                            <input type="text" placeholder="Last Name" class="colZero col22" />
                                        </div>
                                    </div>
                                    <div class="row row2 colZero col24">
                                        <div class="colZero col12 col left">
                                            <input type="text" placeholder="Email Id" class="colZero col22" />
                                        </div>
                                        <div class="colZero col12 col right">
                                            <input type="password" placeholder="Password" class="colZero col22" />
                                        </div>
                                    </div>
                                    <div class="formActionRow colZero col24">
                                        <div class="termsRow colZero col12">
                                            <div class="terms sgCheckbox">
                                                <input type="checkbox" id="terms" class="checkbox">
                                                <label for="terms">I Agree T&C</label>
                                            </div>
                                            <div class="colZero col24 smallText notAC">
                                                Already have an accout? 
                                                <a class="gotologInTab showSignin smallText" href="javascript:void(0);"><u>Login</u></a>
                                            </div>
                                        </div>
                                        <div class="btnWrap FR">
                                            <input type="button" value="SignUp" onclick="" name="signUpBtn" class="btn" id="signUpBtn">
                                        </div>
                                    </div>
                                    <div class="colZero col24 socialRow">
                                        <h3>Login using:</h3>
                                        <ul class="social2">
                                            <li class=""><a class="fb sprite" href="javascript:void(0);"></a></li>
                                            <li class=""><a class="gplus sprite" href="javascript:void(0);"></a></li>
                                        </ul>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div>
            <div class="modalhomeSearch" style="display: none;">
                <div class="colZero col24 modal-header">
                    <a href="javascript:void(0);" class="closeModal hideModal icon-cross FR">&times;</a>
                </div>
                <div class="colZero col18 divCenter modal-body">
                    <form class="colZero col24 homeSearchForm noBorderForm">
                        <div class="colZero col24">
                            <input type="text" value="" name="" placeholder="Search form your favourite gadget" />
                        </div>
                        <div class="colZero col24 actionRow text-center">
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="overlay" style="display: none; "></div>
        </div>
       
        <script>
            new AnimOnScroll(document.getElementById('grid'), {
                minDuration: 0.4,
                maxDuration: 0.7,
                viewportFactor: 0.2
            });
        </script>
    </body>
</html>
