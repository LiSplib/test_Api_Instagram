const $postList = document.getElementById('postsList');

function updateView(){
    fetch("https://graph.instagram.com/me/media?fields=caption,media_url&access_token=IGQVJVNmJ4RVFyX3VZAanU1TUpiYWQzS3JjaHdvMjhnOFI2V3JJdDRTcG10eEszVG9XaUt0WW5qdHJ1d2RibXZAPS2psbTNsSG5iLUZAEZAFJ5cV9Qdm1jSXF3dFgyWlFlQlhieHVtU1lB", {
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
                <video controls width="250">
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