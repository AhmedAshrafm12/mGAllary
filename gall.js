var x=document.querySelector('main');
str="welcome to my gallary";
let m=0;
write=setInterval(function(){
    if(m==str.length-1){
        clearInterval(write)
    }
    x.innerHTML+=str[m];
    m++;
},200);

$('.dep li').click(function(){
    $(this).addClass("acti");
    $(this).siblings().removeClass("acti");
    $('#'+$(this).data("par")).siblings().fadeOut()
    $('#'+$(this).data("par")).delay(400).fadeIn();
})
$('img').click(function(){
    window.location.href=$(this).attr('src');
})
var up=document.getElementById('up');
window.onscroll=function(){
    if(window.scrollY<=400)
        up.style.display="block";}

up.onclick=function(){
   window.scrollTo(0,0);}
   

let mood=document.getElementById('mood');
let nav=document.getElementById('nav');
$ii=Array.from(document.querySelectorAll('.uul li a i'));
mood.onclick=function(e){
    document.body.classList.toggle('mood');
    nav.classList.toggle('mood');  
    $ii.forEach(e => {
        e.classList.toggle('mood')
    });
    document.getElementById('brand').classList.toggle('mood');
}

