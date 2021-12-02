$(document).ready(function () {

    function refresh(){
        document.querySelector('#total').innerHTML = localStorage.getItem('cart');
        requestAnimationFrame(refresh);
    }
    requestAnimationFrame(refresh);

    var reg_link = location.href.split('/')[5];
    var reg_1 = /shop?name=(.+)/ig;
    var reg_2 = /product?id=(.+)/ig;

    if (reg_link.match(reg_1) || reg_link.match(reg_2)){
        document.querySelector('#srch').style.display = 'block';
    }

    document.querySelector('.imag').addEventListener('click', function () {
        if (document.querySelector('.stat_point').getAttribute('id') === 'online'){
            document.querySelector('#myDropdown').style.display = "block";
        }else{
            window.open('login', '_parent');
        }
    });

    window.onclick = function (e) {
        if (!e.target.matches('.imag')){
            document.querySelector('#myDropdown').style.display = "none";
        }
    }






});