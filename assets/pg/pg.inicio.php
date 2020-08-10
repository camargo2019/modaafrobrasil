<?php
//Gabriel CMR - Desenvolvimento
//Plagio e Crime

include __DIR__.'/conteudo.menu.php';

?>
<main id="main" class="main main--flat home" aria-live="polite" ap-type="content">
    <div class="parbase q-gnb gnb-feature"></div>
    <div class="top-visual">
        <article class="home-article slick-slider" tabindex="0">
        <?php 
        $info_s = $db->rows('SELECT * FROM logs_slide');
        foreach ($info_s as $info_slide){
        ?>
  <div class="slide_item" style="background-image:url('<?=$info_slide->imagem;?>');">
  <section id="home-makeup" class="home-section home-makeup" style="width: 100%; display: inline-block;">
  <div class="home-frame">
                            <div class="home-product">
                                <a href="<?=$info_slide->url;?>" ap-click-area="Product" ap-click-name="Click - Product Detail Link" ap-click-data="<?=$info_slide->titulo;?>">
                                    <span class="a11y"><?=$info_slide->titulo;?></span>
                                </a>
                            </div>
                            <div class="home-row">
                                <div class="home-cell">
                                    <a href="<?=$info_slide->url;?>" ap-click-area="Product" ap-click-name="Click - Product Detail Link" ap-click-data="<?=$info_slide->titulo;?>" >
                                        <div class="home-info">
                                            <span class="h-en"></span>
                                            <h2 class="h"><?=$info_slide->titulo;?></h2>
                                            <p class="p"><?=$info_slide->descricao;?></p>
                                            <div class="home-func">
                                                <span class="btn btn--invert">
                                                    <span class="a11y"><?=$info_slide->titulo;?></span>
                                                    <span class="btn-text">Ver</span>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
        </section>
  </div>

        <?php } ?>
        </article>

        <div class="custom-control play">
        <button class="control-button play" aria-label="Slide Play">Play</button>
        <button class="control-button pause"  type="button" aria-label="Slide Stop">Stop</button>

    </div>
        
        <script type="text/javascript">
            //$('.slick-slider').slick();


			
	$(function () 
		{
		
			var $mainSlide = $('.home-article');
		
			var $mainSlideControl = $mainSlide.siblings('.custom-control');
		
			var startIndex = 0;
		
		
			$mainSlide.slick(
			{
			
					dots: true,
					infinite: true,
					slidesToShow: startIndex + 1, 
					speed: 500,
					autoplaySpeed: 5000,
					fade: true,
					autoplay: true,
					cssEase: 'ease-in-out',
					prevArrow: '<button class="slick-prev" aria-label="Previous button" type="button">Previous</button>',
					nextArrow: '<button class="slick-next" aria-label="Next button" type="button">Next</button>',
					dotsClass: 'custom-dots',
					appendDots: $mainSlideControl,
					customPaging: function (slider, i) 
				{
				
							var slideNumber = (i + 1),
								totalSlides = slider.slideCount;
				
							return '<a class="dot" href="javascript:void(0)" role="tab" aria-label="' + slideNumber + '/' + totalSlides + '">'+ slideNumber +'</a>';
				
						
			}
			,
					responsive: [
				{
				
							breakpoint: 768,
							settings: 
					{
					
									arrows: false
								
				}
				
						
			}
			]
				
		}
		)
			var themeInvert = function(currentIndex)
			{
			
					var $currentSlide = $mainSlide.find('[data-slick-index='+ currentIndex +']');
			
					if($currentSlide.find('.home-section').hasClass('theme--invert'))
				{
				
							$mainSlide.addClass('control--invert');
				
							$mainSlideControl.addClass('control--invert');
				
						
			}
			else
				{
				
							$mainSlide.removeClass('control--invert');
				
							$mainSlideControl.removeClass('control--invert');
				
						
			}
			
				
		}
			var mainSlideVideo = function(currentIndex, state)
			{
			
					var $currentSlide = $mainSlide.find('[data-slick-index='+ currentIndex +']');
			
					var $videoSection = $currentSlide.find('.home-section');
			
					var $videoWrap = $videoSection.find('.home-cover');
			
					var $video = $videoSection.find('video');
			
					videoPlay($videoSection, $videoWrap, $video, state);
			
				
		}
		
		
			themeInvert(startIndex);
		
			mainSlideVideo(startIndex, 'play');
		
		
			$mainSlide.find('.slick-slide').removeAttr('role');
		
            $mainSlideControl.find('.custom-dots li').attr('aria-selected', 'false').eq(startIndex).attr('aria-selected', 'true');
            
			$mainSlide.on('beforeChange', function (event, slick, currentSlide, nextSlide) 
			{
			
					themeInvert(nextSlide);
			
					mainSlideVideo(currentSlide, 'pause');
			
					mainSlideVideo(nextSlide, 'play');
			
			
					$mainSlideControl.find('.custom-dots li').attr('aria-selected', 'false').eq(nextSlide).attr('aria-selected', 'true');
			
				
		}
		);
			$mainSlideControl.find('.control-button.play').on('click', function () 
			{
			
					$mainSlide.slick('slickPlay');
			
					$mainSlideControl.removeClass('pause').addClass('play');
			
				
		}
		);
			$mainSlideControl.find('.control-button.pause').on('click', function () 
			{
			
					$mainSlide.slick('slickPause');
			
					$mainSlideControl.removeClass('play').addClass('pause');
			
				
		}
		);
			$(window).resize(function () 
			{
			
					if (window.changeMode == true && $mainSlideControl.hasClass('pause')) 
				{
				
							setTimeout(function() 
					{
					
									$mainSlide.slick('slickPause');
					
								
				}
				, 1000);
				
						
			}
			
				
		}
		);
		
		
	}
	);
	

        </script>
        

    </div>
</main>

<?php

include __DIR__.'/conteudo.footer.php';