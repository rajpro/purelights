jQuery(document).ready(function(){(function(){var $mainNav=$('#navigation').children('ul');$mainNav.on('mouseenter','li',function(){var $this=$(this),$subMenu=$this.children('ul');if($subMenu.length)$this.addClass('hover');$subMenu.hide().stop(true,true).fadeIn(250);}).on('mouseleave','li',function(){$(this).removeClass('hover').children('ul').stop(true,true).fadeOut(50);});})();domready(function(){selectnav('nav',{label:'Menu',nested:true,indent:'-'});});var pxShow=300;var fadeInTime=400;var fadeOutTime=400;var scrollSpeed=400;jQuery(window).scroll(function(){if(jQuery(window).scrollTop()>=pxShow){jQuery("#backtotop").fadeIn(fadeInTime);}else{jQuery("#backtotop").fadeOut(fadeOutTime);}});jQuery('#backtotop a').click(function(){jQuery('html, body').animate({scrollTop:0},scrollSpeed);return false;});jQuery("#layerslider").layerSlider({responsive:false,responsiveUnder:1280,layersContainer:1280,skin:'noskin',hoverPrevNext:false,skinsPath:'',autoPlayVideos:false});$(window).load(function(){$('.flexslider').flexslider();});jQuery(document).ready(function()
{jQuery(document.body).pixusNotifications({speed:300,animation:'fadeAndSlide',hideBoxes:false});});(function()
{$.fn.pixusNotifications=function(options)
{var defaults={speed:200,animation:'fade',hideBoxes:false};var options=$.extend({},defaults,options);return this.each(function()
{var wrapper=$(this),notification=wrapper.find('.notification'),content=notification.find('p'),title=content.find('strong'),closeBtn=$('<a class="close" href="#"></a>');$(document.body).find('.notification').each(function(i)
{var i=i+1;$(this).attr('id','notification_'+i);});notification.filter('.closeable').append(closeBtn);closeButton=notification.find('> .close');closeButton.click(function()
{hideIt($(this).parent());return false;});function hideIt(object)
{switch(options.animation)
{case 'fade':fadeIt(object);break;case 'slide':slideIt(object);break;case 'box':boxAnimIt(object);break;case 'fadeAndSlide':fadeItSlideIt(object);break;default:fadeItSlideIt(object);}};function fadeIt(object)
{object.fadeOut(options.speed);}
function slideIt(object)
{object.slideUp(options.speed);}
function fadeItSlideIt(object)
{object.fadeTo(options.speed,0,function(){slideIt(object)});}
function boxAnimIt(object)
{object.hide(options.speed);}
if(options.hideBoxes){}
else if(!options.hideBoxes)
{notification.css({'display':'block','visiblity':'visible'});}});};})();(function(){var $container=$('.acc-container'),$trigger=$('.acc-trigger');$container.hide();$trigger.first().addClass('active').next().show();var fullWidth=$container.outerWidth(true);$trigger.css('width',fullWidth);$container.css('width',fullWidth);$trigger.on('click',function(e){if($(this).next().is(':hidden')){$trigger.removeClass('active').next().slideUp(300);$(this).toggleClass('active').next().slideDown(300);}
e.preventDefault();});$(window).on('resize',function(){fullWidth=$container.outerWidth(true)
$trigger.css('width',$trigger.parent().width());$container.css('width',$container.parent().width());});})();(function(){var $tabsNav=$('.tabs-nav'),$tabsNavLis=$tabsNav.children('li'),$tabContent=$('.tab-content');$tabsNav.each(function(){var $this=$(this);$this.next().children('.tab-content').stop(true,true).hide().first().show();$this.children('li').first().addClass('active').stop(true,true).show();});$tabsNavLis.on('click',function(e){var $this=$(this);$this.siblings().removeClass('active').end().addClass('active');$this.parent().next().children('.tab-content').stop(true,true).hide().siblings($this.find('a').attr('href')).fadeIn();e.preventDefault();});})();(function(){var animateSpeed=1000;var emailReg=/^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;function validateName(name)
{if(name.val()=='*')
{name.addClass('validation-error',animateSpeed);return false;}
else
{name.removeClass('validation-error',animateSpeed);return true;}}
function validateEmail(email,regex)
{if(!regex.test(email.val()))
{email.addClass('validation-error',animateSpeed);return false;}
else
{email.removeClass('validation-error',animateSpeed);return true;}}
function validateMessage(message)
{if(message.val()=='')
{message.addClass('validation-error',animateSpeed);return false;}
else
{message.removeClass('validation-error',animateSpeed);return true;}}
$('#send').click(function()
{var result=true;var name=$('input[name=name]');var email=$('input[name=email]');var message=$('textarea[name=message]');if(!validateName(name))result=false;if(!validateEmail(email,emailReg))result=false;if(!validateMessage(message))result=false;if(result==false)return false;var data='name='+name.val()+'&email='+email.val()+'&message='+encodeURIComponent(message.val());$('.text').attr('disabled','true');$('.loading').fadeIn('slow');$.ajax({url:"contact.php",type:"GET",data:data,cache:false,success:function(html){if(html==1){$('.loading').fadeOut('slow');$('.success-message').slideDown('slow');$('#send').attr('disabled',true);}else
{$('.loading').fadeOut('slow')
alert('Sorry, unexpected error. Please try again.');}}});return false;});$('input[name=name]').blur(function(){validateName($(this));});$('input[name=email]').blur(function(){validateEmail($(this),emailReg);});$('textarea[name=message]').blur(function(){validateMessage($(this));});})();$(window).load(function(){$('#portfolio-wrapper').isotope({itemSelector:'.portfolio-item',layoutMode:'fitRows'});$('#filters a.selected').trigger("click");});$('#filters a').click(function(e){e.preventDefault();var selector=$(this).attr('data-option-value');$('#portfolio-wrapper').isotope({filter:selector});$(this).parents('ul').find('a').removeClass('selected');$(this).addClass('selected');});});