const $postList = document.getElementById('postsList');

function updateView(){
    fetch("https://graph.instagram.com/me/media?fields=caption,media_url&access_token=IGQVJVZAUlPdUlGeTYybjRZAMXp1U3VMNmREa2hVQ0x3TGltWUNBYkFrN2lKWk9GSnc3SVBiVFgwZA29HYVlBbDNtTnZA1NHhLRl81T0tnenk4Vkt4WmlRV2QxZA2l5OFI1a19BbzNLTVhR", {
        "method": "GET"
        })
    .then(res => res.json())
    .then(data => readData(data))
    .catch(err => handleError(err));
}

function handleError(err){
    console.error(err);
} 

function readData(data){
    let html = "";
    const mp4 = '.mp4';
    data.data.forEach(element => {
        if (element.media_url.indexOf(mp4) !== -1){
            return html +=`
            <div class="post">
                <video controls>
                    <source src="${element.media_url}">
                </video>
                <p>${element.caption ? element.caption : ''} </p>
            </div>
            `;  
        }
        return html +=`
        <div class="post">
            <img src="${element.media_url}">
            <p>${element.caption ? element.caption : ''} </p>
        </div>
        `;
    });
    $postList.innerHTML = html;
}

updateView();

