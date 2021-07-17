//Search box
class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML();
    this.typingArea = document.querySelector("input , textarea");
    this.focus = document.querySelector("focus");
    this.results = document.getElementById("search-overlay__result");
    this.openButton = document.querySelector(".js-search-trigger");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.scrollDisable= document.querySelector("body");
    this.keyBinds = document.querySelector("body");
    
    this.findWord = document.getElementById("search-term");
    this.typingTimer;
    this.isSpinnerSpinning = false;
    this.isOpen = false;
    this.previousValue;
    this.events();
  }

  // 2. events
  events() {
    this.openButton.addEventListener("click", this.openOverlay.bind(this));
    this.closeButton.addEventListener("click", this.closeOverlay.bind(this));
    this.keyBinds.addEventListener("keydown",this.keyPress.bind(this));
    this.findWord.addEventListener("keyup",this.searchWordLogic.bind(this));
  }
  

  // 3. methods (function, action...)
  searchWordLogic(){ 
    if(this.findWord.value != this.previousValue){
      clearTimeout(this.typingTimer);
      if(this.findWord.value){
        if(!this.isSpinnerSpinning){
          this.results.innerHTML='<div class = "spinner-loader"></div>';
          this.isSpinnerSpinning = true;
        }
        
        this.typingTimer = setTimeout(this.getResults.bind(this), 200);
      }else{
        this.results.innerHTML = " ";
        this.isSpinnerSpinning = false;
      }
    }
    this.previousValue= this.findWord.value;  
    }
 
  // getting results after u type
    getResults(method,url){
      
      var subMenu= this.results; 

      // use fetch nxt time 
      var sendHTTP = (method,url) => {
          var request = new XMLHttpRequest();
// open sends the request 
      request.open(method, Data.root_url + url + this.findWord.value,true);
      request.responseType ='json';
// onload gets the data 
      request.onload = function () {
        if (this.status >= 200 && this.status < 400) {
            var data = this.response;
            subMenu.innerHTML = `
            <h2 class="search-overlay__section-title">General Info</h2>
            ${data.length ?'<ul class="link-list min-list">' : '<p> No general info matches that search.</p>'}
            ${data.map(item => `<li><a href ="${item["link"]}">${item['title']['rendered']}</a></li>`).join('')}
            ${data.length ? '</ul>' : ''}
            `;
            this.isSpinnerSpinning = false;
        }
        if (this.status == 404 ){
          console.log(alert("Error 404 , Server returned an error"));
        }
      }
      request.onerror = function() { console.log(alert("failed"));}
          
      request.send();  
    }
    sendHTTP('GET','/wp-json/wp/v2/pages?search=');
    sendHTTP('GET','/wp-json/wp/v2/posts?search=');
   

    }
   
// keybinds like s and esc
  keyPress(e) {
    // reslove this later
       if(e.keyCode == 83 && !this.isOpen       /* && !this.typingArea ===':focus' */){
        this.openOverlay();
      }
      if(e.keyCode == 27 && this.isOpen){
        this.closeOverlay();
    }
     
  }
  //To open search bar and disable scroll
  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active");
    this.scrollDisable.classList.add("body-no-scroll");
    this.findWord.value= null;
    //new way of creating a function (dont nee {} if its one line ).)
    setTimeout(() => this.findWord.focus() , 201);
    this.isOpen = true;
  }
  //to close search bar and anable scroll
  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    this.scrollDisable.classList.remove("body-no-scroll");
    this.isOpen=false;

    
  }
  addSearchHTML(){
    var createNode = document.createElement('div');
    createNode.innerHTML += ' ' + `
    <div class="search-overlay">
    <div class = "search-overlay__top ">
    <div class = "container">
              <i class = "fa fa-search search-overlay__icon" aria-hidden="true"></i>
              <input type="text" class="search-term" placeholder="What are you looking for ?"
               id ="search-term">
               <i class = "fa fa-window-close search-overlay__close" aria-hidden="true"></i>
    </div>
    </div>
    <div class = "container">
              <div id = "search-overlay__result"></div>
    </div>
    </div>
    `;
    document.querySelector('body').appendChild(createNode);

  }
}
//to call class
var find = new Search();
