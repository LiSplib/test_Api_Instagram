const $postList = document.getElementById('postsList');

function updateView(){
    fetch("https://graph.instagram.com/me/media?fields=media_url&access_token=IGQVJVV3ptU2kyY0N4VkNnS3hfMXV5WUM4MV9oY3czNXZAKUi00ZAWpsOGpRWF9id3JqY1p3d3FVRDdFWUl3c2g0SW9Rd3hyWjFUaE5OMkdvb204X0Jvb1FMVXhxYjkzTmtJczhzelNza3ZAtU1IzbU9VYU9udWt5SGpyYmxv", {
        "method": "GET"
        })
    .then(res => res.json())
    .then(data => readData(data))
    .catch(err => handleError(err));
    console.log(err);
}

function handleError(err){
    console.error(err);
} 

function readData(data){
    for (let i = 0; i < data['number']; i++){
        let html = "";
        return post.map(imgs => {
            return html +=`
                <p>Post n° ${data[imgs].id} </p>
                <img src="${data[imgs].media_url}">
                `;
        });
    }
    $postList.innerHTML = html;
}

updateView();