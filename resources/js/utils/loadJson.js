const BASE_URL = "http://localhost:8000/api/";

function loadJson(url) {
    return fetch(url).then((response) => response.json())
  }

  function getArtists(nb) {
    return loadJson(`${BASE_URL}artistes/${nb}`)   
  }

  function getUser(nb) {
    return loadJson(`${BASE_URL}users/${nb}`)
  }

  function getTitles(nb) {
    return loadJson(`${BASE_URL}titres/${nb}`)
  }

  function getPlaylists(nb) {
    return loadJson(`${BASE_URL}playlists/${nb}`)
  }

function getResponse(nb) {
    return loadJson(`${BASE_URL}reponses/${nb}`)
}

function getSondages(nb) {
    return loadJson(`${BASE_URL}sondages/${nb}`)
}

function getSondages2(){
    return loadJson(`${BASE_URL}sondages`)
}

export { getArtists, getUser, getTitles, getPlaylists, getResponse, getSondages, getSondages2 }