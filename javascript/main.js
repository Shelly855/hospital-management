let myButtons = document.getElementsByClassName("top-button");

for (let i = 0; i < myButtons.length; i++) {
    myButtons[i].addEventListener('click', topFunction);
}

window.onscroll = function() {
  if (window.innerWidth > 600) {
    scrollFunction();
  }
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    for (let i = 0; i < myButtons.length; i++) {
      myButtons[i].style.display = "block";
    }
  } else {
    for (let i = 0; i < myButtons.length; i++) {
      myButtons[i].style.display = "none";
    }
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



