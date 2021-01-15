const search = document.querySelector('input[placeholder="search book/author"]');
const bookContainer = document.querySelector(".books");

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
        }).then(function (books) {
            bookContainer.innerHTML = "";
            loadBooks(books)
        });
    }
});

function loadBooks(books) {
    books.forEach(book => {
        console.log(book);
        createBook(book);
    });
}

function createBook(book) {
    const template = document.querySelector("#book-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = book.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${book.image}`;
    const title = clone.querySelector("h3");
    title.innerHTML = book.title;
    const author = clone.querySelector("p");
    author.innerHTML = book.author;
    const total_value = clone.querySelector(".fa-star");
    total_value.innerText = book.total_value;

    bookContainer.appendChild(clone);
}
