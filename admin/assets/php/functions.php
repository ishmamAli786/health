<?php
//encrypting and decrypting password

// SALT must be 16 or 32 bits
define('SALT', 'whateveryouwant1'); 

function encrypt($text) 
{ 
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 

function decrypt($text) 
{ 
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
}


// resize image function
function resize_img($width,$height,$input_name){
	$target_filename = $_FILES[$input_name]['tmp_name'];
	$fn = $_FILES[$input_name]['tmp_name'];
	$size = getimagesize( $fn );
	$width =$width;
	$height = $height;
	$src = imagecreatefromstring( file_get_contents( $fn ) );
	$dst = imagecreatetruecolor( $width, $height );
	imagealphablending($dst, false);
	imagesavealpha($dst,true);
	$transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
	imagefilledrectangle($dst, 0, 0, $width, $height, $transparent);
	imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
	imagedestroy( $src );
	 // adjust format as needed
	switch ($_FILES[$input_name]['type']) {
		case 'image/jpeg':
		  imagejpeg( $dst, $target_filename );
		  break;
		case 'image/png':
		  imagepng( $dst, $target_filename );
		  break;
		case 'image/gif':
		  imagegif( $dst, $target_filename );
		  break;
		default:
		  exit;
		  break;
	  }
	imagedestroy( $dst );
}
?>