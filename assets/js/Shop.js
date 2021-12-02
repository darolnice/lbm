$(document).ready(function () {
    function createInput(in_var, in_typ, in_attr_styl, in_attr_typ, in_attr_name, in_attr_class, in_attr_value = ''){
        in_var = document.createElement(in_typ);
        in_var.setAttribute('type', in_attr_typ);
        in_var.setAttribute('style', in_attr_styl);
        in_var.setAttribute('name', in_attr_name);
        in_var.setAttribute('class', in_attr_class);
        in_var.setAttribute('value', in_attr_value);
        return in_var;
    }

    const All_ad = document.querySelectorAll('#ad');
    for (i=0; i<All_ad.length; i++){
        let ad = All_ad[i];
        ad.addEventListener('click', function () {
            max = ad.getAttribute('data-max');
            prd_id = ad.getAttribute('data-id');
            prd_name = ad.getAttribute('data-name');
            prd_price = ad.getAttribute('data-price');
            prd_color = ad.getAttribute('data-color');
            prd_size = ad.getAttribute('data-size');
            addCart(prd_id, prd_name, prd_price, prd_color, prd_size, max);
        });
    }

    /**
     * @param prd_id
     * @param prd_name
     * @param prd_price
     * @param prd_color
     * @param prd_size
     * @param max
     */
    function addCart(prd_id, prd_name, prd_price, prd_color, prd_size, max) {
        let c_value = [prd_id, prd_name, prd_price, prd_color, prd_size];
        let ipt = createInput('c_content','input', 'display:none', 'text', 'cart_content', 'cart_content');
        document.querySelector('._cart_form').appendChild(ipt);
        document.querySelector('.cart_content').setAttribute('value', c_value);
    }

    const All_rem = document.querySelectorAll('#rem');
    All_rem.forEach((all) =>{
        all.addEventListener('click', function () {
            prd_id = all.getAttribute('data-id');
            prd_name = all.getAttribute('data-name');
            prd_price = all.getAttribute('data-price');
            remCart(prd_id, prd_name, prd_price);
        });
    });
    function remCart() {
        if (--compt_add > 0){
            document.querySelector('#total').innerHTML = --compt_add;
        }

    }

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


    let __sec = document.querySelector('#sec1');
    if (__sec.childElementCount < 4){
        __sec.style.marginBottom = '80ex';
    }

    if (document.querySelector('.messa__')){
        document.querySelector('.messa__').style.marginLeft = '36.5%';
    }

});
