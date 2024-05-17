$(document).ready(function () {




    let chatBody = $('.chat-body').height();
    $('.chat-body').scrollTop(chatBody + 150);

    // $('.chat-body').scroll(function () {
    //     console.log()
    // });







    $('#images').click(function () {
        $('.setting').css('display', 'none');
        $('.images').css('display', 'block');
        $('#images').addClass('active');
        $('#setting').removeClass('active');
    })
    $('#setting').click(function () {
        $('.images').css('display', 'none')
        $('.setting').css('display', 'block')
        $('#images').removeClass('active');
        $('#setting').addClass('active');
    })

    $('#female').click(function () {
        $('#male').removeClass('active');
        $('#female').addClass('active');
        $('#gender').val('female');
        $('#status').html(`

        <option value="0">كل الحالات</option>
        <option value="1">آنسة</option>
        <option value="2">مطلقة</option>
        <option value="3">ارملة</option>

        `)
    })
    $('#male').click(function () {
        $('#female').removeClass('active');
        $('#male').addClass('active');
        $('#gender').val('male');
        $('#status').html(`

        <option value="0">كل الحالات</option>
        <option value="4">عازب</option>
        <option value="5">مطلق</option>
        <option value="6">ارمل</option>
        <option value="7">متزوج</option>

        `)
    })

});

//  Range Slider
/** Default config */
const rangeSlider_min = 18;
const rangeSlider_max = 55;

document.querySelector('#RangeSlider .range-slider-val-left').style.width = `${rangeSlider_min + (100 - rangeSlider_max)}%`;
document.querySelector('#RangeSlider .range-slider-val-right').style.width = `${rangeSlider_min + (100 - rangeSlider_max)}%`;

document.querySelector('#RangeSlider .range-slider-val-range').style.left = `${rangeSlider_min}%`;
document.querySelector('#RangeSlider .range-slider-val-range').style.right = `${(100 - rangeSlider_max)}%`;

document.querySelector('#RangeSlider .range-slider-handle-left').style.left = `${rangeSlider_min}%`;
document.querySelector('#RangeSlider .range-slider-handle-right').style.left = `${rangeSlider_max}%`;

document.querySelector('#RangeSlider .range-slider-tooltip-left').style.left = `${rangeSlider_min}%`;
document.querySelector('#RangeSlider .range-slider-tooltip-right').style.left = `${rangeSlider_max}%`;

document.querySelector('#RangeSlider .range-slider-tooltip-left .range-slider-tooltip-text').innerText = rangeSlider_min;
document.querySelector('#RangeSlider .range-slider-tooltip-right .range-slider-tooltip-text').innerText = rangeSlider_max;

document.querySelector('#RangeSlider .range-slider-input-left').value = rangeSlider_min;
document.querySelector('#RangeSlider .range-slider-input-left').addEventListener('input', e => {
    e.target.value = Math.min(e.target.value, e.target.parentNode.childNodes[5].value - 1);
    var value = (100 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.value) - (100 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.min);

    var children = e.target.parentNode.childNodes[1].childNodes;
    children[1].style.width = `${value}%`;
    children[5].style.left = `${value}%`;
    children[7].style.left = `${value}%`;
    children[11].style.left = `${value}%`;

    children[11].childNodes[1].innerHTML = e.target.value;
});

document.querySelector('#RangeSlider .range-slider-input-right').value = rangeSlider_max;
document.querySelector('#RangeSlider .range-slider-input-right').addEventListener('input', e => {
    e.target.value = Math.max(e.target.value, e.target.parentNode.childNodes[3].value - (-1));
    var value = (100 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.value) - (100 / (parseInt(e.target.max) - parseInt(e.target.min))) * parseInt(e.target.min);

    var children = e.target.parentNode.childNodes[1].childNodes;
    children[3].style.width = `${100 - value}%`;
    children[5].style.right = `${100 - value}%`;
    children[9].style.left = `${value}%`;
    children[13].style.left = `${value}%`;

    children[13].childNodes[1].innerHTML = e.target.value;
});
//  Range Slider


let models = document.querySelector(".models");
let loginBnt = document.getElementById("login-btn");
let registerBnt = document.getElementById("register-btn");
let companyBnt = document.getElementById("company-btn");
let registerModel = document.querySelector(".models .register");
let companyModel = document.querySelector(".models .company");
let loginModel = document.querySelector(".models .login");
let closeModel = document.querySelectorAll(".models .close-model");

loginBnt.addEventListener("click", () => {
    loginModel.classList.add("show");
    models.classList.add("show");
});

registerBnt.addEventListener("click", () => {
    registerModel.classList.add("show");
    models.classList.add("show");
});
companyBnt.addEventListener("click", () => {
    companyModel.classList.add("show");
    models.classList.add("show");
});

closeModel.forEach((e) => {
    e.addEventListener("click", () => {
        loginModel.classList.remove("show");
        registerModel.classList.remove("show");
        companyModel.classList.remove("show");
        models.classList.remove("show");
    });
});

