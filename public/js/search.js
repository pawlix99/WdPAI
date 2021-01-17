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
    const input5 = clone.querySelector("input[class='input5']");
    input5.id = "5"+book.id;
    input5.name = book.id;
    const label5 = clone.querySelector("label[class='label5']");
    label5.htmlFor = "5"+book.id;
    const input4 = clone.querySelector("input[class='input4']");
    input4.id = "4"+book.id;
    input4.name = book.id;
    const label4 = clone.querySelector("label[class='label4']");
    label4.htmlFor = "4"+book.id;
    const input3 = clone.querySelector("input[class='input3']");
    input3.id = "3"+book.id;
    input3.name = book.id;
    const label3 = clone.querySelector("label[class='label3']");
    label3.htmlFor = "3"+book.id;
    const input2 = clone.querySelector("input[class='input2']");
    input2.id = "2"+book.id;
    input2.name = book.id;
    const label2 = clone.querySelector("label[class='label2']");
    label2.htmlFor = "2"+book.id;
    const input1 = clone.querySelector("input[class='input1']");
    input1.id = "1"+book.id;
    input1.name = book.id;
    const label1 = clone.querySelector("label[class='label1']");
    label1.htmlFor = "1"+book.id;
    const input = clone.querySelector("input[type='hidden']");
    input.className = book.total_votes;
    input.value = book.total_value;
    const average = clone.querySelector("h5[name='average']");
    average.innerHTML = "(" + Math.round(((book.total_value/book.total_votes) + Number.EPSILON) * 100) / 100 + ")";
    const votes = clone.querySelector("h5[name='votes']");
    votes.innerHTML = "(" + book.total_votes + ")";

    bookContainer.appendChild(clone);
}
