var map
function GetMap()
{
    map = new Microsoft.Maps.Map('#myMap');

    //Add a click event to the map.
    Microsoft.Maps.Events.addHandler(map, 'click', mapClicked);
}

function mapClicked(e) 
{

    if (!(typeof currentPushpin === 'undefined'))
    {
        map.entities.remove(currentPushpin)
    }

    //Create a pushpin.
    currentPushpin = new Microsoft.Maps.Pushpin(e.location);

    loc = currentPushpin.getLocation()
    
    lat = loc['latitude']
    lon = loc['longitude']

    // console.log(lat)
    // console.log(lon)

    document.getElementById("latitude").value = String(lat)
    document.getElementById("longitude").value = String(lon)

    // //Add the pushpin to the map.
    map.entities.push(currentPushpin);
}

// function saveData() {
//     //Get the data from form and add it to the pushpin
//     currentPushpin.metadata = {
//         title: document.getElementById('titleTbx').value,
//         description: document.getElementById('descriptionTbx').value
//     };

//     //Optionally save this data somewhere (like a database or local storage).
    
//     //Clear the fields in the form and then hide the form.
//     document.getElementById('titleTbx').value = '';
//     document.getElementById('descriptionTbx').value = '';
//     document.getElementById('inputForm').style.display = 'none';
// }

(async () => {
    let script = document.createElement("script");
    script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiiFw2qccbhYzvZ-tAPzPFi01K0uQO9YPhguFPF43zplQRv4F8CNg0HVB8eF3koQ`);
    document.body.appendChild(script);
})();