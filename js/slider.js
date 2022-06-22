//Slider btn show
var sliderBtns = document.querySelectorAll('.sliderbtn');

var sliderDivs = document.querySelectorAll('.slider-form')

for(i=0; i < sliderBtns.length; i++){
    sliderBtns[i].addEventListener('click',function(){
        //console.log(this.id)
     let currentBtn = document.querySelectorAll('.active-btn')
     currentBtn[0].className = currentBtn[0].className.replace('active-btn','');
     this.className += ' active-btn';
     const id = this.id;
     if(id){
         sliderBtns.forEach((btn)=>{
             btn.classList.remove('active')
         })

         this.classList.add('active')

         sliderDivs.forEach((section)=>{
            section.classList.remove('active');
        })


         const concatid = `.${id}`;
                       
            
const element = document.querySelector(concatid);
            element.classList.add('active');
     }
    })
}