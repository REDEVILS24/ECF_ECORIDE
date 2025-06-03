export default class Route {
  constructor(url, title, pathHtml, authorize, pathJS = "") {
    this.url = url;
    this.title = title;
    this.pathHtml = pathHtml;
    this.pathJS = pathJS;
    this.authorize = authorize;
  }
}

/*
[] -> tout le monde peux y acceder
[disconnected] -> reserver aux utilisateurx déconnecté
["client"] -> Réserver aux utilisateurs avec le role client
["admin"] -> Réserver aux utilisateurs avec le role admin 
["admin, "client"] -> Réserver aux utilisateurs avec le  role client ou admin 
*/
