class tama{
  constructor(){
    this.width=0;
    this.height=0;
  }
}
function tamVentana() {
  var tam = new tama();
  if (typeof window.innerWidth != 'undefined')
  {
    tam.width = window.innerWidth
    tam.height = window.innerHeight;
  }
  else if (typeof document.documentElement != 'undefined'
      && typeof document.documentElement.clientWidth !=
      'undefined' && document.documentElement.clientWidth != 0)
  {
    tam.width = document.documentElement.clientWidth;
    tam.height = document.documentElement.clientHeight;
  }
  else   {
    tam.width = document.getElementsByTagName('body')[0].clientWidth;
    tam.height = document.getElementsByTagName('body')[0].clientHeight;
  }
  return tam;
}

if (tamVentana().width<700) {
  document.getElementById("show").innerHTML = "";
}

