<?php

namespace App\Bubble\Core;

/**
 * Just help for nice naming
 */
class NameParser
{
		public function cut($string = null) 
		{
				$attributes = explode(' ', $string);		
				return (empty($attributes[1])) ? ucfirst($attributes[0]) : ucfirst($attributes[0]);
		}

		public function fully($string = null) 
		{
				$attributes = explode(' ', $string);		
				return (empty($attributes[1])) ? ucfirst($attributes[0]) : 
								ucfirst($attributes[0]) . ' ' . ucfirst($attributes[1]);
		}

		public function cutNormal($string = null) 
		{
				$attributes = explode(' ', $string);		
				return (empty($attributes[1])) ? ($attributes[0]) : ($attributes[0]);
		}

		public function cutSmall($string = null) 
		{
				$attributes = explode(' ', $string);		
				return (empty($attributes[1])) ? strtolower($attributes[0]) : strtolower($attributes[0]);
		}
}