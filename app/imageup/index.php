<?php

	Class ImageUp extends Main
	{
		public function __construct( $config ){
			
			//	Service instance for internal class use
			parent::__construct(
				$config,
				Array(
					'image' => 'Image'
				)
			);
		}

		public function copy()
		{
			
			$path = 'https://static.pexels.com/photos/35646/pexels-photo.jpg';
			$image = $this->services->image->copy( 
				Array(
					'file' 		=> $path, 
					'img_type' 	=> 'image/jpeg', 
					'save_path' => '/TEMP/image_name.jpg'
				)
			);

			return Array(
				'image' => $path,
				'status' => $image
			);
		}

		public function copy500x500()
		{
			
			$path = 'https://static.pexels.com/photos/35646/pexels-photo.jpg';
			$image = $this->services->image->copy( 
				Array(
					'file' 		=> $path, 
					'w'			=> 500,
					'img_type' 	=> 'image/jpeg', 
					'save_path' => '/TEMP/image_name.jpg'
				)
			);

			return Array(
				'image' => $path,
				'status' => $image
			);
		}

		//	Image infos
		public function info()
		{
			
			$path = 'https://static.pexels.com/photos/35646/pexels-photo.jpg';
			$image = $this->services->image->info( 
				Array(
					'file' => $path
				)
			);

			return Array(
				'image' => $path,
				'infos' => $image
			);
		}

	}