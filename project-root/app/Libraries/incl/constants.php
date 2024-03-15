<?php
namespace incl;

/**
 * @package mod\solid_classes
 * @author Ryno Van Zyl
 */

if(!defined("SIZE_SMALL")) define("SIZE_SMALL", "small");
if(!defined("SIZE_MEDIUM")) define("SIZE_MEDIUM", "medium");
if(!defined("SIZE_LARGE")) define("SIZE_LARGE", "large");
if(!defined("SIZE_EXTRA_LARGE")) define("SIZE_EXTRA_LARGE", "extra large");
if(!defined("SIZE_EXTRA_EXTRA_LARGE")) define("SIZE_EXTRA_EXTRA_LARGE", "extra extra large");

if(!defined("SIZE_ARR")) define("SIZE_ARR", [
	SIZE_SMALL => "S",
	SIZE_MEDIUM => "M",
	SIZE_LARGE => "L",
	SIZE_EXTRA_LARGE => "XL",
	SIZE_EXTRA_EXTRA_LARGE => "XXL",
]);