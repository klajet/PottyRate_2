var map, infobox;

function GetMap() 
{
    map = new Microsoft.Maps.Map('#myMap', {});

    //Create an infobox at the center of the map but don't show it.
    infobox = new Microsoft.Maps.Infobox(map.getCenter(), {
        visible: false
    });

    //Assign the infobox to a map instance.
    infobox.setMap(map);

    //Create random locations in the map bounds.
    // var randomLocations = Microsoft.Maps.TestDataGenerator.getLocations(5, map.getBounds());
    
    for (var i = 0; i < pins.length; i++) 
    {
        var loc = new Microsoft.Maps.Location( String(pins[i]['latitude']), String(pins[i]['longitude']) )
        var pin = new Microsoft.Maps.Pushpin(loc);

        //Store some metadata with the pushpin.
        pin.metadata = {
            title: pins[i]['name'],
            description:  pins[i]['score'] + '/5'
        };

        //Add a click event handler to the pushpin.
        Microsoft.Maps.Events.addHandler(pin, 'click', pushpinClicked);

        //Add pushpin to the map.
        res = map.entities.push(pin);
    }
}

function pushpinClicked(e) {
    //Make sure the infobox has metadata to display.
    if (e.target.metadata) {
        //Set the infobox options with the metadata of the pushpin.
        infobox.setOptions({
            location: e.target.getLocation(),
            title: e.target.metadata.title,
            description: e.target.metadata.description,
            visible: true
        });
    }
}

(async () => {
    let script = document.createElement("script");
    script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AiiFw2qccbhYzvZ-tAPzPFi01K0uQO9YPhguFPF43zplQRv4F8CNg0HVB8eF3koQ`);
    document.body.appendChild(script);
})();