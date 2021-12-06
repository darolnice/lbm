$(document).ready(function () {

    let lk = location.href

    let regex = /lebolma\/shop\?/i;
    if (regex.test(lk)){
        if (document.querySelector('.messa__')){
            document.querySelector('.messa__').classList.add('pouce__');
        }
    }

    let reg = /&/ig;
    let shp = function(){
        if (reg.test(lk)){
            return lk.split('/')[5].split('=')[1].split('&')[0];
        }else {
            return lk.split('/')[5].split('=')[1];
        }
    }

    let params = new URLSearchParams(window.location.search);
    let shop_name = params.get('name');

    let srh = $("#other_srch");
    let _srch = document.querySelector('#_srch');
    srh.on('input', function () {
        let r = srh.val();

        if (r === ''){
            _srch.innerHTML = '';
            _srch.style.display = 'none';
        }else {
            $.ajax({
                type: 'GET',
                url: "ajaxSearchApi?name="+shop_name+"&Sp="+r,
                success: function (data) {
                    if (data){
                        _srch.innerHTML = '';
                        let i = 0;
                        while (i<data.length){
                            let el = document.createElement('a');
                            el.setAttribute('href', 'shop?name='+shp()+'&sp='+data[i]['prod_name']);
                            el.innerHTML = data[i]['prod_name'];
                            _srch.appendChild(el);
                            i++
                            $('#_srch').fadeIn(300);
                        }
                    }
                }
            });
        }
    });

    function refresh(){
        document.querySelector('#total').innerHTML = localStorage.getItem('cart');
        requestAnimationFrame(refresh);
    }
    requestAnimationFrame(refresh);

    document.querySelector('#persn').addEventListener('click', function () {
        if (document.querySelector('.stat_point').getAttribute('id') === 'online'){
            $('#myDropdown').toggle(300);
        }else{
            window.open('login', '_parent');
        }
    });
    window.onclick = function (e) {
        if (!e.target.matches('#persn')){
            $('#myDropdown').hide(300);
        }
    }

});
