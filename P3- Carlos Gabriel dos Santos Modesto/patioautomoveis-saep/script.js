var bodyElement;
var clickCount = 0;

function alterarClasseBody() {
  if (!bodyElement) {
    bodyElement = document.getElementsByTagName("body")[0];
  }

  if (clickCount % 2 === 0) {
    bodyElement.classList.remove("bg-light");
    bodyElement.classList.add("bg-secondary");
  } else {
    bodyElement.classList.remove("bg-secondary");
    bodyElement.classList.add("bg-light");
  }

  clickCount++;
}