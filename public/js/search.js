const search = document.querySelector('input[placeholder="search post"]');
const postContainer = document.querySelector(".blogs");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (posts) {
            postContainer.innerHTML = "";
            loadPosts(posts)
        });
    }
});

function loadPosts(posts){
    posts.forEach(post => {
        console.log(post);
        createPost(post);
    });
}

function createPost(post){
    const template = document.querySelector("#post-template");
    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${post.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = post.title;
    const description = clone.querySelector("p");
    description.innerHTML = post.description;
    const like = clone.querySelector(".fa-heart");
    like.innerText = post.like;
    const dislike = clone.querySelector(".fa-minus-square");
    dislike.innerText = post.dislike;

    postContainer.appendChild(clone);
}