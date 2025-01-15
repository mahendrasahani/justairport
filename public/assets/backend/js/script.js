document.getElementById("profile_btn").addEventListener("click", () => { 
    const profileDropdown = document.getElementById("profile_dropdown");
    const computedStyle = window.getComputedStyle(profileDropdown);   
    if(computedStyle.display=="none"){
        profileDropdown.style.display = "block";
    } 
    else
    profileDropdown.style.display = "none";
});


document.addEventListener("DOMContentLoaded",()=>{
    const activeJob=document.getElementById(`jobs`);  
    if(window.sessionStorage.getItem("id") && !window.sessionStorage.getItem("login")){
        const id=window.sessionStorage.getItem("id");
        const activebtn=document.getElementById(`${id}`);
        activebtn.classList.add("active");
    }
      
 const url =window.location.href; 
   const arr=url.split("/"); 
   const id=window.sessionStorage.getItem("id");
   const activebtn=document.getElementById(`${id}`);
   if(arr[arr.length-1]=="admin"|| id=="jobs"){ 
    activeJob.classList.add("active")
    window.sessionStorage.removeItem("login")
    if(id!="jobs"){
        activebtn.classList.remove("active");
    } 
   } 
   else{
    activeJob.classList.remove("active")
   } 
}) 

function toggleSubMenu(id) {
    const activebtn = document.getElementById(`${id}`);
    window.sessionStorage.setItem("id",id)
}

