$(document).ready(function() 
{
	$(document).on("click","#njbsOverlay",
		function()
		{
			njbsPostCloseImage()
		}
	);
	
	$(document).on("mouseover","#njbsImgContainer",
		function() 
		{ 
			$(this).children('DIV.close').fadeIn(250);
		}
	);
	$(document).on("mouseleave","#njbsImgContainer",
		function() 
		{ 
			$(this).children('DIV.close').fadeOut(250);
		}
	);
});


$(window).resize(function() 
{
	if($('#njbsImgContainer').length > 0)
	{
		$src = $('#njbsImgContainer > DIV.img > IMG').attr('src');
		
		njbsPostHandleImage($src, true);
	}
});


function njbsPostHandleImage($src, $resize = false)
{
	if($('#njbsImgContainer').length > 0)
	{
		var distance = 60;
		
		var image = new Image();
		image.src = $src;
		
		var window = njbsGeneralGetWindowDimension();

		var checkDim = njbsPostImageCheckDimension(window, image, distance);
		
		if(checkDim)
		{
			$('#njbsImgContainer')
				.css('left', ( window['width'] - (parseInt(image.width)+(distance/2)) ) / 2)
				.css('top', ( window['height'] - (parseInt(image.height)+(distance/2)) ) / 2)
				.css('width', parseInt(image.width) )
				.css('height', parseInt(image.height) )
				.css('padding', distance/4);
			
			$('#njbsImgContainer > DIV.img > IMG')
				.css('width', parseInt(image.width) )
				.css('height', parseInt(image.height) );
		}
		else
		{
			var imageDimNew = new Array();
			var ratio = 1;

			var available = new Array();
			available['width'] = window['width'] - distance;
			available['height'] = window['height'] - distance;
			
			if(parseInt(image.width) > available['width'])
			{
				imageDimNew['width'] = available['width'];
				ratio = parseInt(image.width) / available['width'];
				
				imageDimNew['height'] = parseInt(image.height) / ratio;
			}
			
			if(parseInt(imageDimNew['height']) > available['height'])
			{
				imageDimNew['height'] = available['height'];
				ratio = parseInt(image.height) / imageDimNew['height'];
				imageDimNew['width'] = parseInt(image.width) / ratio;
			}
			
			$('#njbsImgContainer')
				.css('left', ( parseInt(window['width']) - ( imageDimNew['width'] + (distance/2) ) ) / 2)
				.css('top', ( parseInt(window['height']) - ( imageDimNew['height'] + (distance/2) ) ) / 2)
				.css('width', imageDimNew['width'] )
				.css('height', imageDimNew['height'] )
				.css('padding', distance/4 );
		
			$('#njbsImgContainer > DIV.img > IMG')
				.css('width', imageDimNew['width'] )
				.css('height', imageDimNew['height'] );
	
		} //end of else(checkDim)
	}
} //end of function njbsPostHandleImage($src, $resize = false)



/**
 * @param $imageId
 */
function njbsPostShowImage($imageId)
{
	njbsGeneralOverlayShow();

	$('body').append('<div id="njbsImgContainer">'
		+ '<div class="img"><img src="'+$($imageId).attr('src')+'" /></div>'
		+ '<div class="close" onClick="njbsPostCloseImage();"></div>'
		+ '</div>'
	);
	
	$src = $($imageId).attr('src');
	
	njbsPostHandleImage($src, false);
	
} //end of function njbsPostShowImage($imageId)


function njbsPostCloseImage()
{
	$('#njbsImgContainer').remove();
	njbsGeneralOverlayHide();
}

function njbsPostImageCheckDimension($window, $image, $distance)
{ 

	var available = new Array();
	available['width'] = $window['width'] - $distance;
	available['height'] = $window['height'] - $distance;
	
	var checkDim = true;
	
	if( parseInt($image.width) > available['width'] ) checkDim = false;
	if( parseInt($image.height) > available['height'] ) checkDim = false;
	
	return checkDim;
}


function njbsGeneralOverlayShow()
{
	$('body').addClass('noscroll');
	$('body').append('<div id="njbsOverlay"></div>');
	$('#njbsOverlay').fadeIn(250);
}

function njbsGeneralOverlayHide()
{
	$('#njbsOverlay').fadeOut(250);
	$('body').removeClass('noscroll');
	$('#njbsOverlay').remove();
}

function njbsGeneralGetWindowDimension()
{
	var dim = new Array();
	dim['width'] = parseInt($(window).width());
	dim['height'] = parseInt($(window).height());
	
	return dim;
}

function njbsSetImageDimension($imageId)
{
	var image = new Image();
	image.src = $($imageId).attr('src');
}