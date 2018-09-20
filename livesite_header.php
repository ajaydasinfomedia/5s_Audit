<?php
error_reporting(0);
if(isset($_SESSION['uid']) && isset($_SESSION['dname']) && isset($_SESSION['uname']) || 
	(strpos($_SERVER['REQUEST_URI'],$_SESSION['dname']) || strpos($_SERVER['REQUEST_URI'],$_SESSION['uname'])))
{
	header("location:http://".$_SERVER['HTTP_HOST']."/".$_SESSION['dname']."/".$_SESSION['uname']."/dashboard");    
}
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="http://www.niftysol.com/xmlrpc.php">

<link rel="icon" type="image/x-icon" href="http://niftysol.com/wp-content/uploads/2018/06/nifty.png">
<title>HOME - Niftysol</title>

<!-- This site is optimized with the Yoast SEO plugin v7.7.1 - https://yoast.com/wordpress/plugins/seo/ -->
<!-- Admin only notice: this page does not show a meta description because it does not have one, either write it for this page specifically or go into the [SEO - Search Appearance] menu and set up a template. -->
<link rel="canonical" href="http://www.niftysol.com/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="HOME - Niftysol" />
<meta property="og:url" content="http://www.niftysol.com/" />
<meta property="og:site_name" content="Niftysol" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="HOME - Niftysol" />
<meta name="twitter:site" content="@Niftysol" />
<meta name="twitter:creator" content="@Niftysol" />
<script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"WebSite","@id":"#website","url":"http:\/\/www.niftysol.com\/","name":"Niftysol","potentialAction":{"@type":"SearchAction","target":"http:\/\/www.niftysol.com\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
<script type='application/ld+json'>{"@context":"https:\/\/schema.org","@type":"Organization","url":"http:\/\/www.niftysol.com\/","sameAs":["https:\/\/www.facebook.com\/Niftysol","https:\/\/www.youtube.com\/user\/Niftysol","https:\/\/twitter.com\/Niftysol"],"@id":"http:\/\/www.niftysol.com\/#organization","name":"Dasinfomedia PVT LTD","logo":""}</script>
<!-- / Yoast SEO plugin. -->

<link rel='dns-prefetch' href='//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="Niftysol &raquo; Feed" href="http://www.niftysol.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Niftysol &raquo; Comments Feed" href="http://www.niftysol.com/comments/feed/" />
<link rel='stylesheet' id='dashicons-css'  href='http://www.niftysol.com/wp-includes/css/dashicons.min.css' media='all' />
<link rel='stylesheet' id='admin-bar-css'  href='http://www.niftysol.com/wp-includes/css/admin-bar.min.css' media='all' />
<link rel='stylesheet' id='contact-form-7-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/plugins/contact-form-7/includes/css/styles.css' media='all' />
<link rel='stylesheet' id='woocommerce-layout-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css' media='all' />
<style id='woocommerce-layout-inline-css'>
.infinite-scroll .woocommerce-pagination {
	display: none;
}
</style>
<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='http://www.niftysol.com/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css' media='only screen and (max-width: 768px)' />
<link rel='stylesheet' id='woocommerce-general-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/plugins/woocommerce/assets/css/woocommerce.css' media='all' />
<style id='woocommerce-inline-inline-css'>
.woocommerce form .form-row .required { visibility: visible; }
</style>
<link rel='stylesheet' id='vortex_like_or_dislike-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/plugins/rating-system/assets/css/style.css' media='all' />
<link rel='stylesheet' id='yoast-seo-adminbar-css'  href='http://www.niftysol.com/wp-content/plugins/wordpress-seo/css/dist/adminbar-771.min.css' media='all' />
<link rel='stylesheet' id='press_party-style-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/style.css' media='all' />
<link rel='stylesheet' id='bootstrap.min-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/bootstrap.min.css' media='all' />
<link rel='stylesheet' id='jquery.mCustomScrollbar-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/jquery.mCustomScrollbar.css' media='all' />
<link rel='stylesheet' id='niftysol_responsive-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/niftysol_responsive.css' media='all' />
<link rel='stylesheet' id='font-awesome.min-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/font-awesome.min.css' media='all' />
<link rel='stylesheet' id='owl.carousel-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/owl.carousel.css' media='all' />
<link rel='stylesheet' id='jquery.fancybox-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/jquery.fancybox.css' media='all' />
<link rel='stylesheet' id='animate-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/animate.css' media='all' />
<link rel='stylesheet' id='aos-css'  href='http://www.niftysol.com/wp-content/themes/niftysol/css/aos.css' media='all' />
<link rel='stylesheet' id='niftysol-css'  href='http://www.niftysol.com/wp-content/themes/niftysol/css/niftysol.css' media='all' />
<link rel='stylesheet' id='pushnifty-responsive-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/themes/niftysol/css/pushnifty-responsive.css' media='all' />
<link rel='stylesheet' id='fancybox-css'  href='http://www.niftysol.com/wp-content/plugins/easy-fancybox/fancybox/jquery.fancybox.min.css' media='screen' />

<link rel='stylesheet' id='js_composer_front-css' defer="defer" async="async" href='http://www.niftysol.com/wp-content/plugins/js_composer/assets/css/js_composer.min.css' media='all' />
<script src='http://www.niftysol.com/wp-includes/js/jquery/jquery.js'></script>
<script defer="defer" async="async" src='http://www.niftysol.com/wp-includes/js/jquery/jquery-migrate.min.js'></script>
<script>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/www.niftysol.com\/cart\/","is_cart":"","cart_redirect_after_add":"yes"};
/* ]]> */
</script>
<script defer="defer" async="async" src='http://www.niftysol.com/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js'></script>
<script defer="defer" async="async" src='http://www.niftysol.com/wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart.js'></script>
<script defer="defer" async="async" src='http://www.niftysol.com/wp-content/themes/niftysol/js/bootstrap.min.js'></script>
<script defer="defer" src='http://www.niftysol.com/wp-content/themes/niftysol/js/owl.carousel.min.js'></script>
<script src='http://www.niftysol.com/wp-content/themes/niftysol/js/aos.js'></script>
<script defer="defer" async="async" src='http://www.niftysol.com/wp-content/themes/niftysol/js/custom.js'></script>
<script defer="defer" src='http://www.niftysol.com/wp-content/themes/niftysol/js/masonry.pkgd.min.js'></script>
<script defer="defer" src='http://www.niftysol.com/wp-content/plugins/easy-fancybox/fancybox/jquery.fancybox.min.js'></script>
<link rel='https://api.w.org/' href='http://www.niftysol.com/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.niftysol.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.niftysol.com/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.9.6" />
<meta name="generator" content="WooCommerce 3.4.3" />
<link rel='shortlink' href='http://www.niftysol.com/' />
<link rel="alternate" type="application/json+oembed" href="http://www.niftysol.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.niftysol.com%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://www.niftysol.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fwww.niftysol.com%2F&#038;format=xml" />
<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
<meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress."/>
<!--[if lte IE 9]><link rel="stylesheet" href="http://www.niftysol.com/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]--><style media="print">#wpadminbar { display:none; }</style>
<style media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
	.wrapper .back-img{
		background-size: cover !important;
	}
</style>
<style data-type="vc_shortcodes-custom-css">.vc_custom_1526716247215{margin-bottom: 0px !important;}.vc_custom_1530262658572{background-color: #ffffff !important;}.vc_custom_1530349423492{background-color: #f5f9fc !important;}.vc_custom_1524641851350{background-color: #ffffff !important;}.vc_custom_1526716235921{margin-bottom: 0px !important;}.vc_custom_1536925679715{margin-bottom: 0px !important;}.vc_custom_1526630364511{margin-bottom: 0px !important;}.vc_custom_1527155939406{margin-bottom: 0px !important;}.vc_custom_1528719397621{padding-left: 30px !important;}.vc_custom_1530507241615{padding-left: 30px !important;}.vc_custom_1526705196796{padding-left: 30px !important;}.vc_custom_1526705208644{padding-left: 30px !important;}</style><noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript><style>
html{margin-top:0!important;} 
li.fa-angle-down:before{
	content:'';
}
</style>
</head>

<body class="home page-template-default page page-id-11 logged-in admin-bar no-customize-support woocommerce-no-js single-author wpb-js-composer js-comp-ver-5.5.2 vc_responsive">
<div class="wrapper_boxed wrapper">
<p id="back-top">
	<a href="" style="font-size: 0px;position:fixed;padding:0px;z-index:99999;">Scroll to top</a>
</p>
<div class="back-img">	
		<header class="header_area">
		<div class="main-menu headerContainerWrapper">
			<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="14" style="">			
			<div class="container padding">
				<div class="respons_party">	
					<div class="col-md-12 col-sm-12 col-xs-12 main-menu">
						<div class="logo-block col-md-3 col-sm-3 col-xs-8 padding">
							<figure class="logo">
								<a href="http://www.niftysol.com/">
									<img class="img-responsive" src="http://niftysol.com/wp-content/uploads/2018/05/nifty-logo.png" alt="Niftysol"  width="auto" height="auto"/>						
									<p> Innovative Cloud Solution  </p>	
								</a>
							</figure>
						</div>
						
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar top-bar"></span>
								<span class="icon-bar middle-bar"></span>
								<span class="icon-bar bottom-bar"></span>                        
							</button>
						</div>
						
						<div class="col-md-9 col-sm-9 col-xs-12">
							<div class="collapse navbar-collapse pull-right navigation" id="myNavbar" style="height: 100% !important;">
								<div class="menu-homepage-menu-container"><ul id="menu-homepage-menu" class="nav navbar-nav text-left navbar-left-menu int-collapse-menu"><li id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-11 current_page_item menu-item-71"><a class="scroll" href="http://www.niftysol.com/">Home</a></li>
<li id="menu-item-73" class="fa fa-angle-down menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-73"><a class="scroll" href="#">Products <i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="sub-menu">
	<li id="menu-item-893" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-893"><a class="scroll" href="http://www.niftysol.com/niftyhrm/">NiftyHRM</a></li>
	<li id="menu-item-894" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-894"><a class="scroll" href="http://www.niftysol.com/niftysis/">NiftySIS</a></li>
	<li id="menu-item-1323" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-1323"><a class="scroll" href="http://www.niftysol.com/niftyhms/">NiftyHMS</a></li>
	<li id="menu-item-1322" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-1322"><a class="scroll" href="http://www.niftysol.com/niftyiso-iso-audit-management-software/">NiftyISO</a></li>
	<li id="menu-item-84" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-84"><a class="scroll" href="http://www.niftysol.com/nifty5s-5s-audit-management-software/">Nifty5S</a></li>
	<li id="menu-item-804" class="subcategory menu-item menu-item-type-post_type menu-item-object-page menu-item-804"><a class="scroll" href="http://www.niftysol.com/niftygym/">NiftyGym</a></li>
</ul>
</li>
<li id="menu-item-70" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-70"><a class="scroll" href="http://www.niftysol.com/blog/">Blog</a></li>
<li id="menu-item-95" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-95"><a class="scroll" href="http://www.niftysol.com/support-login/">Support</a></li>
<li id="menu-item-1515" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1515"><a class="scroll" href="https://accounts.niftysol.com/login">Client Login</a></li>
</ul></div>							</div>
					</div>
				</div>
			</div>
		</div>
		</nav>
	</div>
	<input type="hidden" name="custom" value="">
</header>
</div>