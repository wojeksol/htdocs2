let arr = [document.querySelector('.one'), document.querySelector('.two')];
document.querySelector('#btn-1').addEventListener("click", () => fun(1));
document.querySelector('#btn-2').addEventListener("click", () => fun(0));
function fun(x){
    arr.forEach((el) => {
        el.style.display = 'none';
    });
    arr[x].style.display = 'block';
}