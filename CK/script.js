// JavaScript to toggle sidebar open and close
const openSidebar = document.getElementById('open-sidebar');
const closeSidebar = document.getElementById('close-sidebar');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

openSidebar.addEventListener('click', () => {
    sidebar.style.left = '0';
    overlay.style.display = 'block';
});

closeSidebar.addEventListener('click', () => {
    sidebar.style.left = '-260px';
    overlay.style.display = 'none';
});
//js for dynamic introduction
const texts = ["My name is Coach Catherine", "I am a Senior Certified Professional Coach with Coach Transformative Academy (Dubai)", 
  "an Associate Certified Coach (ACC) with the International Coaching Federation (ICF)","a Certified Professional Mentor with the International Mentoring Centre,"
  ,"and a Professional Counsellor with the Kenya Psychologists and Counsellors Association (KPCA).","THRIVING PRESENCE"];
const typingSpeed = { fast: 100, slow: 200 };
const deletingSpeed = { fast: 50, slow: 100 };
const pause = 2000;

let textIndex = 0;
let charIndex = 0;
let currentText = '';
let isDeleting = false;
const typingElement = document.getElementById('typing');

function type() {
  const fullText = texts[textIndex];
  let speed = fullText.length > 20 ? typingSpeed.fast : typingSpeed.slow;

  if (isDeleting) {
    currentText = fullText.substring(0, charIndex--);
    speed = fullText.length > 20 ? deletingSpeed.fast : deletingSpeed.slow;
  } else {
    currentText = fullText.substring(0, charIndex++);
  }

  typingElement.innerHTML = currentText;

  if (!isDeleting && charIndex === fullText.length) {
    setTimeout(() => isDeleting = true, pause);
  } else if (isDeleting && charIndex === 0) {
    isDeleting = false;
    textIndex = (textIndex + 1) % texts.length;
  }

  setTimeout(type, speed);
}

document.addEventListener('DOMContentLoaded', () => {
  type();
});
document.querySelectorAll('.title').forEach(title => {
  title.addEventListener('click', () => {
    const details = title.nextElementSibling;
    const icon = title.querySelector('.icon');
    
    details.style.display = details.style.display === 'block' ? 'none' : 'block';
    icon.style.transform = details.style.display === 'block' ? 'rotate(180deg)' : 'rotate(0deg)';
  });
});
///get intouch form
document.getElementById('openFormBtn').addEventListener('click', function() {
    document.getElementById('contactFormPopup').style.display = 'flex';
});

document.getElementById('closeFormBtn').addEventListener('click', function() {
    document.getElementById('contactFormPopup').style.display = 'none';
});

//forms document.getElementById('newform').addEventListener('click', function() {

document.getElementById('appform').addEventListener('click', function() {
    document.querySelector('.bookingfrom').style.marginRight = '0px';
    document.querySelector('.container').style.marginLeft = '-1000px';
});
document.getElementById('newform"').addEventListener('click', function() {
    document.querySelector('.bookingfrom').style.marginRight = '-1000px';
    document.querySelector('.container').style.marginLeft = '0px';
});
