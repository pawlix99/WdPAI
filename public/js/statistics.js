const starButtons = document.querySelectorAll("input[type='radio']");

function giveRate() {
    const stars = this;
    const container = stars.parentElement.parentElement.parentElement;
    const id = container.getAttribute('id');
    const rate = stars.getAttribute('value');
    const value = container.querySelector("input[type='hidden']").getAttribute('value');
    const votes = container.querySelector("input[type='hidden']").getAttribute('class');
    const votesOutput = container.querySelector("h5[name='votes']");
    const averageOutput = container.querySelector("h5[name='average']");

    fetch(`/vote/${id}`)
        .then(function () {
            votesOutput.innerHTML = "("+(parseInt(votes) + 1)+")";
            container.querySelector("input[type='hidden']").setAttribute('class', parseInt(votes) + 1);
        });
    fetch(`/addRate/${id}/${rate}`)
        .then(function () {
            container.querySelector("input[type='hidden']").setAttribute('value', parseInt(value) + parseInt(rate));
        });

    fetch(`/averageRate/${id}/${rate}`)
        .then(function () {
            averageOutput.innerHTML = "("+Math.round((((parseFloat(value) + parseFloat(rate))/(parseFloat(votes) + 1)) + Number.EPSILON) * 100 )/100+")";
        });

}

starButtons.forEach(button => button.addEventListener("click", giveRate));
