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
    data.data.forEach(element => {
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