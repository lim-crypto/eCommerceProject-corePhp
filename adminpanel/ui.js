// const addbutton= document.getElementById('addbutton');
const addbutton= document.querySelector('.addbutton');
const cancelbutton= document.querySelector('.cancelbutton');
const modal= document.querySelector('.modal');
 
 
addbutton.onclick = function() {
    modal.style.display = "block";
  }
   
cancelbutton.onclick = function() {
    modal.style.display = "none";
  }
  
window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    } else if(event.target == aside){
      menu.classList.toggle("change"); 
      aside.classList.toggle("left"); 
    }
  }

  const menu = document.querySelector('.menu'); 
  const aside = document.querySelector('.aside');  
  
  menu.addEventListener('click', ()=> {
      menu.classList.toggle("change"); 
      aside.classList.toggle("left");   
      
  });

  