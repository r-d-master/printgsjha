<?php
	$options[] = array( "name" => "Homepage",
	                    "sicon" => "user-home.png",
	                    "type" => "heading");
					
	$options[] = array( "name" => "Display Blurb on Homepage",
						"id" => $shortname."_blurbhome",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Blurb Content",
                        "id" => $shortname."_blurb",
                        "std" => "Welcome to SimplenBright. We are an ideas driven digital agency. We help brands be more effective online by creating beautiful, useful and clever things.",
						"class" => "sectionlast",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Display Contents on Homepage",
						"id" => $shortname."_homecontent",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Content Left Title",
                        "id" => $shortname."_homecontent1title",
                        "std" => "STRATEGY",
                        "type" => "text");
						
	$options[] = array( "name" => "Content Left",
                        "id" => $shortname."_homecontent1",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Left Image",
                        "desc" => "Click to 'Upload Image' button and upload content left image.",
                        "id" => $shortname."_homecontent1img",
                        "std" => "$blogpath/library/images/sampleimages/ico_strategy.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Left URL",
                        "id" => $shortname."_homecontent1url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
					
	$options[] = array( "name" => "Content Center Title",
                        "id" => $shortname."_homecontent2title",
                        "std" => "CREATIVE",
                        "type" => "text");

	$options[] = array( "name" => "Content Center",
                        "id" => $shortname."_homecontent2",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Center Image",
                        "desc" => "Click to 'Upload Image' button and upload content center image.",
                        "id" => $shortname."_homecontent2img",
                        "std" => "$blogpath/library/images/sampleimages/ico_creative.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Center URL",
                        "id" => $shortname."_homecontent2url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");	

	$options[] = array( "name" => "Content Right Title",
                        "id" => $shortname."_homecontent3title",
                        "std" => "TECHNICAL",
                        "type" => "text");
	
	$options[] = array( "name" => "Content Right",
                        "id" => $shortname."_homecontent3",
                        "std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.",
                        "type" => "textarea");
						
	$options[] = array( "name" => "Content Right Image",
                        "desc" => "Click to 'Upload Image' button and upload content right image.",
                        "id" => $shortname."_homecontent3img",
                        "std" => "$blogpath/library/images/sampleimages/ico_technical.png",
                        "type" => "upload");
						
	$options[] = array( "name" => "Content Right URL",
                        "id" => $shortname."_homecontent3url",
                        "std" => "#",
						"class" => "sectionlast",
                        "type" => "text");
						
	$options[] = array( "name" => "Display Portfolio on Homepage",
						"desc" => "do you want to display portfolio section on homepage ?",
						"id" => $shortname."_portfoliohome",
						"std" => "1",
						"type" => "checkbox");
	
	$options[] = array( "name" => "Portfolio section title",
                        "id" => $shortname."_portfoliohometitle",
                        "std" => "SOME OF OUR FEATURED PROJECTS",
                        "type" => "text");
						
	$options[] = array( "name" => "Portfolio section button title",
                        "id" => $shortname."_portfoliohomebuttontitle",
                        "std" => "view full portfolio",
                        "type" => "text");
	
	$options[] = array( "name" => "Portfolio section button URL",
                        "id" => $shortname."_portfoliohomebuttonurl",
                        "std" => "#",
                        "type" => "text");
						

?>