let arr = [document.querySelector('.one'), document.querySelector('.two')];
document.querySelector('#login-btn').addEventListener('click', () => fun(0));
document.querySelector('#register-btn').addEventListener('click', () => fun(1));

function fun(x) {
    arr.forEach((el) => {
        el.style.display = 'none';
    });
    arr[x].style.display = 'block';
}

const errorEl = document.querySelector('#error')
errorEl.value = "Zarejestrowano" ? errorEl.style.color = 'green' : errorEl.style.color = 'red'