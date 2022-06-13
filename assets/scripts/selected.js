import { closestOnCircle } from "ol/coordinate";

let icons = [...document.getElementsByClassName("around-logo")];

document.getElementById('filter').addEventListener('click', async (e) => {

    /* console.log(e.target.dataset.establishmentType); */
    let response = await fetch('./etablissements/'+e.target.dataset.establishmentType)
    .then(response => response.json());
    let responseData = JSON.parse(response);
    /* console.log(responseData); */
    icons.forEach(element => {
        element.id === e.target.id ? element.classList.add('active') : element.classList.remove('active');
    });
    for(let object of responseData){
        const card = document.createElement("article");
        card.className = "place";
        console.log(object);
        /* card picture */
        let img = document.createElement("img");
        img.src = "/build/pictures/"+object.picture;
        img.className = "place-picture";
        
         /* site's name */
        let h4 = document.createElement("h4");
        h4.innerHTML = object.name;
        
        /* div geoloc init */
        let geoloc = document.createElement("div");
        geoloc.className = "geoloc";
        /* site's marker icon */
        let imglogo = document.createElement("img");
        imglogo.src = "{{ asset('build/pictures/geoloc.png') }}";
        imglogo.className = "geoloc-icon"
        
        /* site's distance */
        let p = document.createElement("p");
        p.innerHTML = object.distance;
        console.log(p.innerHTML);
        card.appendChild(img);
        card.appendChild(h4);
        card.appendChild(geoloc);
        geoloc.appendChild(imglogo);
        geoloc.appendChild(p);
        
    }
           
    
});
