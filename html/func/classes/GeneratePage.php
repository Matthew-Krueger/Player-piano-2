<?php
class GeneratePage{

	private $_database = null,
	$_title = "Untitled",
	$_typeOfPage = 1,
	$_websiteName = "Untitled",
	$_pageContent = "",
	$_navData = array();

	public static function getTemplate(){

			return new GeneratePage();

	}

	public function composePage(){

		$headPage = File::get(Config::get("pageTemplateLocation/headPagePart"));

		$navLinks = "";
		foreach ($this->_navData as $navElement) {
			$navLinks .= "<li><a href=\"{$navElement['link']}\">{$navElement['text']}</a></li>";
		}

		$page = array();


		###################################################
		###################################################
		###################################################

		$page['doctype'] = "<!DOCTYPE html><html>";
		$page['head'] = "
					<head lang=\"en-us\">
						{$headPage}
						<title>{$this->_title} - {$this->_websiteName}</title>
					</head>";


					###################################################
					###################################################
					###################################################
		$page['navPanel'] = <<<NAVPANEL

		<body>
			<!-- Navigation panel -->
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#">{$this->_websiteName}</a>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav">
										{$navLinks}
									</ul>
							</div>
							<!-- /.navbar-collapse -->
					</div>
					<!-- /.container -->
			</nav>

NAVPANEL;

###################################################
###################################################
###################################################

$page['contentOpen'] = <<<CONTENTOPEN
<!-- Page Content -->
<div class="container">

		<div class="row">

				<!-- Blog Entries Column -->
				<div class="col-md-8">

						<h1 class="page-header">
								Page Heading
								<small>Secondary Text</small>
						</h1>

						<!-- Begin Template Differentiation -->
CONTENTOPEN;
###################################################
###################################################
###################################################

# TEMPLATE Differentiation
		if($this->_typeOfPage == Config::get("pageType/homePage")){
				# Make Content Part type homePage
			$page['content'] = "WELCOME HOME";
		}elseif ($this->_typeOfPage == Config::get("pageType/errorPage")) {
			$page['content'] = "<h1>Aww, shucks. We messed up. We cannot find what you are looking for. Maybe try again?</h1>";
		}else{
			# No Content
			$page['content'] = "No Content";
		}


###################################################
###################################################
###################################################

# CSRF Token
$token = Token::generate();

$page['wigets'] = <<<WIGETS
</div>
<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<div class="input-group">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">
					<span class="glyphicon glyphicon-search"></span>
			</button>
			</span>
		</div>
		<!-- /.input-group -->
	</div>

	<!-- Newsletter well -->
	<div class="well">
		<h4>Subscribe to updates from us!</h4>
		<div class="input-group">
			<form action="#" class="emailNews">
			<input type="text"	class="form-control" id="userName" />
			<input type="email" class="form-control" id="userEmail" />
			<input type="hidden" id="CSRFToken" value="{$token}" />
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-envelope"></span> Subscribe</button>
			</span>
			</form>
			<div id="formSRV"></div>
		</div>

		<!-- /.input-group -->
	</div>

	<!-- Blog Categories Well -->
	<div class="well blog-cats">
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-6">
				<ul class="list-unstyled">
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
				</ul>
			</div>
			<!-- /.col-lg-6 -->
			<div class="col-lg-6">
				<ul class="list-unstyled">
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
					<li><a href="#">Category Name</a>
					</li>
				</ul>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>

	<!-- Side Widget Well -->
	<div class="well">
		<h4>Side Widget Well</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
	</div>

</div>
WIGETS;

###################################################
###################################################
###################################################

	$footerText = File::get(Config::get("pageTemplateLocation/footPagePart"));
	$page['footer'] = str_replace("{{WebsiteTitle}}", $this->_websiteName, str_replace("{{Year}}", date("Y"), $footerText));
	unset($footerText);

###################################################
###################################################
###################################################

	$page['JavaScriptLoad'] = <<<JAVASCRIPTCALL
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" async></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" async />
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" async></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" async></script>
	<script src="https://cdn.mkblogging.me/js/javascript.js" async></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	  crossorigin="anonymous" async>

	<!-- Custom CSS -->
	<link href="https://cdn.mkblogging.me/css/blog-home.css" rel="stylesheet" async>
	</div></body></html>
JAVASCRIPTCALL;

		return self::buildPageHTML($page);

	}


	private static function buildPageHTML($pageHTMLArray = null){

		if(!isset($pageHTMLArray)){
			return "<DOCTYPE html><html><head><title>No Content</title></head><body><h1>No Content</h1></body></html>";
		}

		$output = "";
		$output .= $pageHTMLArray['doctype'];;
		$output .= $pageHTMLArray['head'];;
		$output .= $pageHTMLArray['navPanel'];
		$output .= $pageHTMLArray['contentOpen'];
		$output .= $pageHTMLArray['content'];
		$output .= $pageHTMLArray['wigets'];
		$output .= $pageHTMLArray['footer'];
		$output .= $pageHTMLArray['JavaScriptLoad'];
		return $output;

	}


	public function setPageTitle($pageTitle = "Untitled"){
		$this->_title = $pageTitle;
	}

	public function getPageTitle(){
		return $this->_title;
	}

	public function setTypeOfPage($type){

		if(in_array($type, Config::get("pageType"))){
			$this->_typeOfPage = $type;
		}else{
			$this->_typeOfPage = Config::get("pageType/genericPage");
		}

	}

	public function getTypeOfPage(){

		return $this->_typeOfPage;

	}

	public function setWebsiteName($name){

		$this->_websiteName = $name;

	}

	public function getWebsiteName(){

		return $this->_websiteName;

	}

	public function setPageContent($content){

		$this->_pageContent = $content;

	}

	public function getPageContent(){

		return $this->_pageContent;

	}

	public function prependNavLink($value = array("link" => "#", "text" => "Blank Text")){

		array_unshift($this->_navData, $value);

	}

	public function postpendNavLink($value = array("link" => "#", "text" => "Blank Text")){

		array_push($this->_navData, $value);

	}

	public function writeNewNavArray($navArr = array()){

		$this->_navData = $navArr;

	}

	public function getNavArray(){

		return $this->_navData;

	}

}
