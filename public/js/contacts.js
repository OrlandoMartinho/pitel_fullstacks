let notification = document.querySelector('.notification-icon')
let notificationContent = document.querySelector('.notification')
let notificationClose = document.querySelector('.notification-close')

//open modal
notification.addEventListener('click',()=>{
    notificationContent.classList.add('on')
})

//close modal
notificationClose.addEventListener('click',()=>{
    notificationContent.classList.remove('on')
})