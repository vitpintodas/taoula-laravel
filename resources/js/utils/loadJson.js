const BASE_URL = "http://localhost:8000/";

function loadJson(url) {
    return fetch(url).then((response) => response.json())
  }

  function getArtists(nb) {
    return loadJson(`${BASE_URL}/api/artistes/${nb}`)   
  }

  function getUser(nb) {
    return loadJson(`${BASE_URL}/api/users/${nb}`)
  }

  function getTitles(nb) {
    return loadJson(`${BASE_URL}/api/titres/${nb}`)
  }

  function getPlaylists(nb) {
    return loadJson(`${BASE_URL}/api/playlists/${nb}`)
  }

function getResponse(nb) {
    return loadJson(`${BASE_URL}/api/reponses/${nb}`)
}

function getSondageDefisConcourss(nb) {
    return loadJson(`${BASE_URL}/api/sondageDefisConcours/${nb}`)
}
