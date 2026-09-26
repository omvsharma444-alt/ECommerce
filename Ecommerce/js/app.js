// Small progressive enhancements shared across pages.
$(window).on('load',()=>$('#loader').fadeOut(250)); AOS.init({once:true,duration:600});
$('.theme-toggle').on('click',function(){let h=$('html');h.attr('data-bs-theme',h.attr('data-bs-theme')==='dark'?'light':'dark');localStorage.theme=h.attr('data-bs-theme');}); if(localStorage.theme)$('html').attr('data-bs-theme',localStorage.theme);
$(window).on('scroll',()=>$('#backTop').toggle($(window).scrollTop()>350)); $('#backTop').on('click',()=>$('html,body').animate({scrollTop:0},400));
$('#liveSearch').on('input',function(){let q=$(this).val().toLowerCase();$('.product-col').each(function(){$(this).toggle($(this).text().toLowerCase().includes(q));});});
$('.qty-btn').on('click',function(){let i=$(this).siblings('input'),n=Math.max(1,(+i.val()||1)+(+$(this).data('step')));i.val(n);});
