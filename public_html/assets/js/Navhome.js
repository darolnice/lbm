$(document).ready(function () {
    function refresh(){
    document.querySelector('#total').innerHTML = localStorage.getItem('cart');
        requestAnimationFrame(refresh);
    }
    requestAnimationFrame(refresh);

    window.addEventListener('scroll', ()=> {
        const nav = document.querySelector('.nav-bar');
        const navas = document.querySelectorAll('.nav-bar ul li a');
        const ul_ul_sub_nav = document.querySelectorAll('.sub-menu-2 ul li');
        const drw_cnt = document.querySelector('#myDropdown');
        const scr = window.scrollY;
        if (scr){
            nav.setAttribute('id', "nav_bar_id_no_top");
            document.querySelector('#total').setAttribute('style', 'color:black!important');
            navas.forEach((nava) =>{
                nava.className = 'a_nav';
            });
            ul_ul_sub_nav.forEach(sub2 =>{
                sub2.classList.add('dyn__');
            });
            drw_cnt.setAttribute('class', 'dyn__drop_2');
        }
    });
    window.addEventListener('scroll', ()=> {
        const scr = window.scrollY;
        const nav = document.querySelector('.nav-bar');
        const navas = document.querySelectorAll('.nav-bar ul li a');
        const ul_ul_sub_nav = document.querySelectorAll('.sub-menu-2 ul li');

        const drw_cnt = document.querySelector('#myDropdown');
        if (scr === 0){
            $("._dpp").fadeOut();
            nav.setAttribute('id', "");
            nav.style.boxShadow = 'none';

            document.querySelector('#total').setAttribute('style', 'color:white!important');
            navas.forEach((nava) =>{
                nava.className = '';
            });
            ul_ul_sub_nav.forEach(sub2 =>{
                sub2.className = '';
            });
            drw_cnt.setAttribute('class', 'dyn__drop');
        }
    });
    window.addEventListener('scroll', ()=> {
        const scr = window.scrollY;
        const nav = document.querySelector('.nav-bar');
        if (scr.toFixed(1) >= 350){
            nav.style.boxShadow = "5px 1px 12px rgba(73, 73, 72, 0.33)";
            $("._dpp").fadeIn(600);
        }
    });

    document.querySelector('#persn').addEventListener('click', function () {
        if (document.querySelector('.stat_point').getAttribute('id') === 'online'){
            $('#myDropdown').show(300);
        }else{
            window.open('login', '_parent');
        }
    });
    window.onclick = function (e) {
        if (!e.target.matches('#persn')){
            $('#myDropdown').hide(300);
        }
    }

    let srh = $("#home_srch");
    let _srch = document.querySelector('#_srch');
    srh.on('input', function () {
        let r = srh.val();

        if (r === ''){
            _srch.innerHTML = '';
            _srch.style.display = 'none';
        }else {
            $.get("jxSearchApi?Sp="+r).done(function (data) {
                _srch.innerHTML = '';
                let i = 0;
                for (j=0; j<data.length; j++){
                    while (i < data[j].length){
                        let el = document.createElement('a');
                        el.setAttribute('href', '?sp='+data[j][i]['prod_name']);
                        el.innerHTML = data[j][i]['prod_name'];
                        _srch.appendChild(el);
                        i++
                        $('#_srch').fadeIn(300);
                    }
                }
            });
        }
    });

    document.querySelectorAll('#--nav ul li').forEach(item =>{
        item.classList.contains('active') ? item.classList.remove('cool') : null
    });


});
