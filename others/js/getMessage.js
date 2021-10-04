function getDiscussion() {
  sendRequest(
    "GET",
    "index.php",
    "action=listeMsg",
    "",
    callbackRecup,
    fctErrorCallback
  );
}

function callbackRecup(response) {
  let tabMsg = JSON.parse(response);
  const html = tabMsg
    .reverse()
    .map(function (message) {
      return `
        <div class="espace-bas-blanc border border-2 border-secondary rounded-2">
        <span class="author">${message["pseudo"]}: </span>
            ${message["message"]}
        </div>


    `;
    })
    .join("");

  const blocMessages = document.querySelector("#container");
  blocMessages.innerHTML = html;
  // window.scroll(0, 10000);
}

setInterval(() => {
  getDiscussion();
}, 500);
