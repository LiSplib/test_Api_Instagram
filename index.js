const $postList = document.getElementById('postsList');

function updateView(){
    fetch("https://graph.instagram.com/me/media?fields=caption,media_url&access_token=IGQVJWTkYzdTRaTlhhSW1ZAaVdRSi1VNmNNNnkxLTVjTENleFpraC1JbVFsVE02WmRDTURHSS1BVUJaZA3JOM0p6WVlfOW1jVkg2Ykg2N3Y0M3dlTjF5S1g0c3dCblVnZAV9IX3RPUC1B", {
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

