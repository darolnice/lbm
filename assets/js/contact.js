$(document).ready(function () {

    let link_ = 'contact';

    if (location.href.split('/')[5] === link_){
        window.addEventListener('scroll', ()=> {
            const nav = document.querySelector('.nav-bar');
            const navas = document.querySelectorAll('.nav-bar ul li a');
            const ul_sub_nav = document.querySelector('#ul_1');
            const ul_ul_sub_nav = document.querySelector('#ul_2');
            const drw_cnt = document.querySelector('#myDropdown');
            const scr = window.scrollY;
            if (scr){
                nav.setAttribute('id', "nav_bar_id_no_top");
                nav.style.boxShadow = "5px 1px 12px rgba(73, 73, 72, 0.33)";

                navas.forEach((nava) =>{
                    nava.className = 'a_nav';
                });
                ul_ul_sub_nav.className = 'dyn__';
                ul_sub_nav.className = 'dyn__';
                drw_cnt.setAttribute('class', 'dyn__drop_2');
            }
        });
        window.addEventListener('scroll', ()=> {
            const scr = window.scrollY;
            const nav = document.querySelector('.nav-bar');
            const navas = document.querySelectorAll('.nav-bar ul li a');
            const ul_sub_nav = document.querySelector('#ul_1');
            const ul_ul_sub_nav = document.querySelector('#ul_2');
            const drw_cnt = document.querySelector('#myDropdown');
            if (scr.toFixed(1) < 15){
                nav.setAttribute('id', "");
                nav.style.boxShadow = 'none';
                navas.forEach((nava) =>{
                    nava.className = '';
                });

                ul_ul_sub_nav.className = '';
                ul_sub_nav.className = '';
                drw_cnt.setAttribute('class', 'dyn__drop');
            }
        });
    }



    document.querySelector('.imag').addEventListener('click', function () {
        if (document.querySelector('.stat_point').getAttribute('id') === 'online'){
            $('#myDropdown').toggle(300);
        }else{
            window.open('login', '_parent');
        }
    });
    window.onclick = function (e) {
        if (!e.target.matches('.imag')){
            $('#myDropdown').hide(300);
        }
    }


    function refresh(){
        document.querySelector('#total').innerHTML = localStorage.getItem('cart');
        requestAnimationFrame(refresh);
    }
    requestAnimationFrame(refresh);




});

