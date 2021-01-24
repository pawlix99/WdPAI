const starButtons = document.querySelectorAll("input[type='radio']");

function giveRate() {
    const stars = this;
    const container = stars.parentElement.parentElement.parentElement;
    const id = container.getAttribute('id');
    const rate = stars.getAttribute('value');
    const value = container.querySelector("input[id='6']").getAttribute('value');
    const votes = container.querySelector("input[id='6']").getAttribute('class');
    const votesOutput = container.querySelector("h5[name='votes']");
    const averageOutput = container.querySelector("h5[name='average']");

    fetch(`/vote/${id}`)
        .then(function () {
            votesOutput.innerHTML = "("+(parseInt(votes) + 1)+")";
            container.querySelector("input[id='6']").setAttribute('class', parseInt(votes) + 1);
        });
    fetch(`/addRate/${id}/${rate}`)
        .then(function () {
            container.querySelector("input[id='6']").setAttribute('value', parseInt(value) + parseInt(rate));
        });

    averageOutput.innerHTML = "("+Math.round((((parseFloat(value) + parseFloat(rate))/(parseFloat(votes) + 1)) + Number.EPSILON) * 100 )/100+")";

    stars.parentElement.disabled = true;
    $name = stars.parentElement.getAttribute('id');
    $value = rate;
    document.cookie = $name + "=" + $value;
}

starButtons.forEach(button => button.addEventListener("click", giveRate));
