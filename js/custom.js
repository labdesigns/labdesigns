

  ////////////////// product image gallery   //////////////////
   
 const product_imgs_array = document.querySelectorAll('.prod-img');
 const gallery_modal = document.querySelector('.prod-img_modal');
 const gallery_img = document.querySelector('.prod-img_gall');
 const btn_next =  document.querySelector('.btn-next');
 const btn_prev =  document.querySelector('.btn-prev');
 
 
 if(product_imgs_array && gallery_modal){
     product_imgs_array.forEach((item, index )=>{
         item.addEventListener('click', (e)=>{
             const img_src = e.target;
             gallery_modal.classList.add('show');
             gallery_img.src = img_src.src;
             console.log(index);
 
 
             // btn_next.addEventListener('click', ()=>{
             //     gallery_img.src = product_imgs_array[index++].src;
             //     console.log(index);
 
             // })
 
 
             // btn_prev.addEventListener('click', ()=>{
             //     gallery_img.src = product_imgs_array[index--].src;
             //     console.log(index);
 
             // })
         })
     });
 
     gallery_modal.addEventListener('click', (e)=>{
 
         if(e.target !== e.currentTarget){return}
             gallery_modal.classList.remove('show');
     
     })
 
 }
 
 
 //////////////////Hamburger Menu//////////////////////
 
 const menuContainer = document.querySelector('header.hero .menu-menu-1-container');
 const hamburger = document.querySelector('.burger');
 const burgerbars = document.querySelector('#burger-bars');
 const bar1 =  document.querySelector('.burger-path-1');
 const bar2 =  document.querySelector('.burger-path-2');
 const bar3 =  document.querySelector('.burger-path-3');
 const menuUl = document.querySelector('#primary-menu')
 
 
 const menuFunc = ()=>{
 
   menuContainer.classList.toggle('menu-toggle');
   hamburger.classList.toggle('burger-toggle');
   bar1.classList.toggle('bar-1-toggle');
   bar2.classList.toggle('bar-2-toggle');
   bar3.classList.toggle('bar-3-toggle');
   
 
   
   
   }
 
 hamburger.addEventListener('click' , menuFunc);
 
 
 document.addEventListener('click', (e)=>{
   let target = e.target;
 
   if (menuContainer.classList.contains('menu-toggle')) {
     
     if( target !== menuContainer 
       && target !== hamburger 
       && target !== bar1 
       && target !== bar2 
       && target !== bar3 
       && target !== burgerbars
       && target !== menuUl 
       ){
         menuFunc();
     }
   }
 
 })
 
 
  // GLIDE Slider


  new Glide('.glide', {
    type: 'carousel',
    startAt: 0,
    perView: 4,
    autoplay: 4000,
    hoverpause: true,
    breakpoints: {
      1300: {
        perView: 3
      },
      949: {
        perView: 2
      },
      625: {
        perView: 1
      }
    }

  }).mount();


