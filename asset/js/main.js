const chooseColors = document.querySelectorAll('input[name="color-choice"]');
const plus = document.querySelector('#plus'),
    amount = document.querySelector('#amount'),
    minus = document.querySelector('#minus');
let amountBuy = 1;
amountBuy = amount.dataset.max;
chooseColors.forEach((item) => {
    const parent = item.parentElement;
    item.onclick = () => {
        amountBuy = item.value;
        if (Number(amount.innerText) > item.value) amount.innerText = item.value;
        const choice = document.querySelector('.ring-offset-1.ring-2');
        if (choice || parent == choice) {
            choice.classList.remove('ring-offset-1');
            choice.classList.remove('ring-2');
            if (parent == choice) return;
        }
        parent.classList.add('ring-offset-1');
        parent.classList.add('ring-2');
    };
});

const stars = document.querySelectorAll('#star');
const cancelReview = document.querySelector('button[name="cancel-review"]');
const inputStar = document.querySelector('input[name="stars"]');
const review = document.querySelector('#review');
const messageError = document.querySelector('#message-error');
stars.forEach((item, index) => {
    item.onclick = () => {
        inputStar.value = index + 1;
        stars.forEach((item) => item.classList.remove('text-orange-500'));
        messageError.innerText = '';
        for (let i = 0; i < index + 1; i++) {
            stars[i].classList.add('text-orange-500');
        }
    };
});

cancelReview.onclick = () => {
    stars.forEach((item) => item.classList.remove('text-orange-500'));
    inputStar.value = 0;
};

review.onclick = (e) => {
    if (!inputStar.value) {
        e.preventDefault();
        messageError.innerText = 'Vui lòng chọn sao';
    }
};

plus.onclick = () => {
    if (Number(amount.innerText) >= amountBuy) return;
    amount.innerText = Number(amount.innerText) + 1;
};

minus.onclick = () => {
    if (Number(amount.innerText) <= 1) return;
    amount.innerText = Number(amount.innerText) - 1;
};
