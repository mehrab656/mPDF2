<?php

namespace Classes;
class PDFBase {
	protected $title;
	protected $marginTop;
	protected $author;
	protected $creator;
	protected $displayMode;
	protected $headerText;
	protected $footerText;

	function __construct( $author, $title, $marginTop, $creator, $displayMode, $headerText, $footerText ) {
		$this->author      = $author;
		$this->title       = $title;
		$this->marginTop   = $marginTop;
		$this->creator     = $creator;
		$this->displayMode = $displayMode;
		$this->headerText  = $headerText;
		$this->footerText  = $footerText;
	}

}