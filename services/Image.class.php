<?php

	Class Image
	{
		public $save_path = '';

		public function copy( $params = Array() ) 
		{

		    list( $width , $height ) = getimagesize( $params['file'] );
		    $r = $width / $height;
		    
		    if ( empty( $params['h'] ) && empty( $params['w'] ) ) {

		    	$newheight = $height;
		        $newwidth = $width;

		    } else if ( empty( $params['h'] ) && isset( $params['w'] ) ) {
		    	
		    	$newheight = $params['w'] / $r;
		        $newwidth = $params['w'];

		    } else if ( empty( $params['w'] ) && isset( $params['h'] ) ) {
		    	
		    	$newwidth = $params['h'] * $r;
		        $newheight = $params['h'];

		    } else if ( $params['w'] / $params['h'] > $r ) {
		        
		        $newwidth = $params['h'] * $r;
		        $newheight = $params['h'];

		    } else {
		        
		        $newheight = $params['w'] / $r;
		        $newwidth = $params['w'];

		    }

		    switch( $params['img_type'] ) {
	     		case 'image/jpeg':
	     			return $this->save( $this->resize_imagejpg( $params['file'] , $newwidth , $newheight , $width , $height ) , 'jpg' , $params['save_path'] );
	     			break;
	     		case 'image/png':
	     			return $this->save( $this->resize_imagepng( $params['file'] , $newwidth , $newheight , $width , $height ) , 'png' , $params['save_path'] );
	     			break;
	     		case 'image/gif':
	     			return $this->save( $this->resize_imagegif( $params['file'] , $newwidth , $newheight , $width , $height ) , 'gif' , $params['save_path'] );
	     			break;
	     	}
		}

		//	Image infos as size, dimentions, aperture, camera details, etc.
		public function info( $params = Array() )
		{
			return exif_read_data( $params['file'] , 0 , true );
		}

		// for jpg 
		protected function resize_imagejpg( $file , $newwidth , $newheight , $width , $height ) 
		{
		   $src = imagecreatefromjpeg( $file );
		   $dst = imagecreatetruecolor( $newwidth , $newheight );
		   imagecopyresampled( $dst , $src , 0 , 0 , 0 , 0 , $newwidth , $newheight , $width , $height );
		   return $dst;
		}

		// for png
		protected function resize_imagepng( $file , $newwidth , $newheight , $width , $height ) 
		{
		   $src = imagecreatefrompng( $file );
		   $dst = imagecreatetruecolor( $newwidth , $newheight );
		   imagecopyresampled( $dst , $src , 0 , 0 , 0 , 0 , $newwidth , $newheight , $width , $height );
		   return $dst;
		}

		// for gif
		protected function resize_imagegif( $file , $newwidth , $newheight , $width , $height ) 
		{
		   $src = imagecreatefromgif( $file );
		   $dst = imagecreatetruecolor( $newwidth , $newheight );
		   imagecopyresampled( $dst , $src , 0 , 0 , 0 , 0 , $newwidth , $newheight , $width , $height );
		   return $dst;
		}

		protected function save( $dst , $type , $save_path )
		{
			switch ( $type ) {
				case 'jpg':
					return imagejpeg( $dst , $save_path );
					break;
				case 'png':
					return imagepng( $dst , $save_path );
					break;
				case 'gif':
					return imagegif( $dst , $save_path );
					break;
			}
		}
	}