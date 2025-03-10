const toggle = document.querySelector('.tggle-btn');
toggle.addEventListener('click', function(){
     const sidebar = document.querySelector('.sidebar');
     sidebar.classList.toggle('active');
})


const userBtn = document.querySelector('#user-btn');
userBtn.addEventListener('click' function(){
    const userBox = document.querySelector('.profile-detail');
    userBox.classList.toggle('active');
})



