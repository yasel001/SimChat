let xhr = null;

function getXHR() {
  if (!isCompatible()) {
    alert("Navigateur incompatible");
  } else {
    if (window.ActiveXObject) {
      try {
        xhr = new XMLHttpRequest("Msxml12.XMLHTTP");
      } catch {
        xhr = new XMLHttpRequest("Microsoft.XMLHTTP");
      }
    } else {
      xhr = new XMLHttpRequest();
    }
  }

  return xhr;
}

function isCompatible() {
  return window.XMLHttpRequest || window.ActiveXObject;
}

function sendRequest(httpMethod, url, params, callback, errorCallback) {
  // Verifie si la requête est déjà envoyée
  if (xhr && xhr.readyState !== 4) {
    return;
  }

  xhr = getXHR();

  // Traitement quand le status de la requête change
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200 && callback) {
        // Traitement requête réussie
        callback(xhr.responseText);
      } else if (errorCallback) {
        // Erreur
        errorCallback(xhr.responseText);
      }
    }
  };

  if (httpMethod.toUpperCase() === "POST") {
    xhr.open(httpMethod, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(params);
  } else {
    url += "?" + params;
    xhr.open(httpMethod, url, true);
    xhr.send(null);
  }
}
