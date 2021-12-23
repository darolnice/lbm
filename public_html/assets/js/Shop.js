$(document).ready(function () {
    let params = new URLSearchParams(window.location.search);

    /**
     *
     * @type {NodeListOf<Element>}
     */
    const cont = document.querySelectorAll(".cont");
    for (i=0; i<cont.length; i++){
        let _div = cont[i];
        if (_div.childNodes[1].childElementCount !== 1){
            _div.childNodes[1].childNodes[1].setAttribute("id", 'new_height');
        }
    }

    if (document.querySelector('.messa__')){
        document.querySelector('.messa__').style.marginLeft = '36.5%';
    }

    let tm = document.querySelector('.state_price_');
    let barr = document.querySelector('.barometre_');
    let cmm = new Index();

    if (cmm.getCookie('spl')){
        tm.textContent = 'Price: [1'+cmm.getCookie('curr')+' - '+cmm.getCookie('spl')+cmm.getCookie('curr')+']';
        tm.style.left = '50%';
        tm.style.display = 'block';
    }

    barr.addEventListener('input', function () {
        let value = barr.value;
        let max = this.getAttribute('max');
        tm.style.display = 'block';
        tm.style.left = value/2+'%';
        tm.textContent = 'Price: [1'+cmm.getCookie('curr')+' - '+((value / max)*1000).toFixed(0)+' '+cmm.getCookie('curr')+']';
    });
    barr.addEventListener('change', function () {
        let max = this.getAttribute('max');
        let value = (((barr.value / max)*1000).toFixed(0));
        cmm.jxPostData('jxHomeRange', this, value, "spl");
    });

    let shps = document.querySelector(".blg__ipt_s");
    shps.addEventListener('input', ()=>{
        if (shps.value !== ''){
            cmm.jxHomeShopSearch('#home_ss_div_', shps.value);
        }
        else {
            $('#home_ss_div_').hide();
            $('.srtby').css('visibility', 'visible');
        }
    });

    $('#allcmt').on('click', function () {
        new Index().SetCookie('fsl','xx-xs');
        open('profil?name='+params.get('name'), '_parent');
    });

    if (document.querySelector('#prod_clr')){
        const clr = document.querySelectorAll('#prod_clr');
        clr.forEach(item =>{
            var id = item.getAttribute('data-pid');
            var shop_name = item.getAttribute('data-shpnam');
            item.addEventListener('input', ()=>{
                sessionStorage.setItem(id+shop_name+'/'+'color', item.value)
            });
        })

        const sze = document.querySelectorAll('#prod_sze');
        sze.forEach(item =>{
            var id = item.getAttribute('data-pid');
            var shop_name = item.getAttribute('data-shpnam');
            item.addEventListener('input', ()=>{
                sessionStorage.setItem(id+shop_name+'/'+'size', item.value)
            });
        })
    }

    if(document.querySelector('#_add_')){
        document.querySelectorAll("#_add_").forEach(btn =>{
            btn.addEventListener('click', ()=>{
                let idx = new Index();
                let color = '';
                let size = '';
                let nodePath = btn.parentNode.parentNode.children[0];

                let prod_name = btn.getAttribute('data-name');
                let shop_name = btn.getAttribute('data-shopname');
                let prod_id = btn.getAttribute('data-id');
                let price = btn.getAttribute('data-price');
                let stock = btn.getAttribute('data-max');
                let currency = idx.getCookie('curr');
                color = sessionStorage.getItem(prod_id+shop_name+'/'+'color');
                size = sessionStorage.getItem(prod_id+shop_name+'/'+'size');
                if (color == null){
                    color = nodePath.children[1].children[0].children[0].innerHTML;
                }
                if (size == null){
                    size = nodePath.children[2].children[0].children[0].innerHTML;
                }

                let obj = {
                    'prod_id': prod_id, 'shop_name': shop_name, 'prod_name':prod_name, 'color': color.trimLeft(),
                    'size':size.trimLeft(), 'price':price, 'stock':stock, 'currency':currency, 'quantity':1
                }
                 
                $.ajax({
                    type: 'POST',
                    url: "cart",
                    data:{
                        key: prod_id+shop_name.trimLeft(),
                        value: JSON.stringify(obj)
                    },
                    success: function (response) {
                        if (response['message'] === 'Product Add'){
                            open('checkcart', '_parent');
                        }else{
                            idx.lbmAlert(response['message'], 'danger');
                        }
                    }
                })
            });
        });
    }

});
