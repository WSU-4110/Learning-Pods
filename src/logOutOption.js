class logOutOtion {
    constructor(){
        if(!logOutOption){
            logOutOtion._instance = this; }

            menuTab.style.display = 'block';

    }

    openMenu() {
        var menuTab = document.getElementById('myAccount');

        if (menuTab.style.display == "block"){
            cacncel.style.display = "none"; 
            logout.style.display = "block";
            menuTab.style.display = "none"; 
        }
        else { 
            cacncel.style.display = "block";
            logout.style.display = "none";
            menuTab.style.display = "block";
        }   
    }

    static getInstance() {
        return this._instance;
    }
}