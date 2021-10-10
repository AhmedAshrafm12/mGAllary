$('.dep li').click(function(){
  $('#'+$(this).data('par')).fadeIn().siblings().fadeOut();
  $(this).siblings().removeClass('acti');
  $(this).addClass('acti');
})