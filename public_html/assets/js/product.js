document.addEventListener('DOMContentLoaded', function () {
    $('#arbo_pn').text($('.p_nm').text());

    let slides, slidesWidth;
    let compter = 0;

    let params = new URLSearchParams(window.location.search);
    let id = params.get("id");
    let sphn = params.get("shop");

    let p_name = document.querySelector('.p_nm').innerHTML;
    let comp = 0;

    let prix = document.querySelector('.p_pce a');
    var cart_data = {prod_id:id,
                     shop_name:sphn,
                     prod_name:p_name,
                     color:'', size:'',
                     price:prix.innerHTML,
                     stock:$('.p_qte').text(),
                     currency:prix.nextElementSibling.innerHTML,
                     quantity:''
    }

    const cont = document.querySelectorAll(".sub_cont");
    for (i=0; i<cont.length; i++){
        let _div = cont[i];
        if (_div.childNodes[1].childElementCount !== 1){
            _div.childNodes[1].childNodes[1].setAttribute("id", 'sub_new_height');
        }
    }

    document.querySelector('.contant_saler').addEventListener('click', function (e) {
        e.preventDefault();
        // new Index().scrollTo(100);
        $('.chat').fadeIn(300);
    });
    $('.chat_close').on('click', ()=>{
        $('.chat').fadeOut();
    });

    document.querySelector('.add_prd').addEventListener('click', function (e) {
        e.preventDefault();
        if (document.querySelector('.rem_prd').getAttribute('disabled')){
            document.querySelector('.rem_prd').removeAttribute('disabled');
        }
        if(comp !== +document.querySelector(".p_qte").innerHTML){
            document.querySelector(".prd_count").value = ++comp;

        }else {
            document.querySelector('.add_prd').setAttribute('disabled', 'disabled');
        }
    });

    document.querySelector('.rem_prd').addEventListener('click', function (e) {
        e.preventDefault();
        if (document.querySelector('.add_prd').getAttribute('disabled')){
            document.querySelector('.add_prd').removeAttribute('disabled');
        }

        if (comp > 0){
            document.querySelector(".prd_count").value = --comp;
        }else {
            this.setAttribute('disabled', 'disabled');
        }
    });

    document.querySelector('#prd_clr').addEventListener('change', function () {
        cart_data.color = this.value;
    });

    document.querySelector('#prd_sze').addEventListener('change', function () {
        cart_data.size = this.value;
    });

    document.querySelector('#vw_cart').addEventListener('click', function (e) {
        e.preventDefault();
        let qt = +document.querySelector(".prd_count").value;
        cart_data.quantity = qt;

        document.querySelector('.prod_data').value = JSON.stringify(cart_data);
        document.querySelector('.prod_key').value = id+sphn;
        if (qt !== 0 && qt !== null && qt !== ''){
            $.ajax({
                type: 'POST',
                url:  'cart',
                data: {
                    key: id+sphn,
                    value: JSON.stringify(cart_data)
                },
                dataType: 'json',
                success: function (response) {
                    if (response['message'] === 'Already In Cart'){
                        new Index().lbmAlert(response['message'], 'info');
                        return null;

                    }else if (response['message'] === 'Product Update'){
                        new Index().lbmAlert(response['message'], 'info');
                        return null;

                    }else if(response['message'] === 'Product Add'){
                        let crt = localStorage.getItem('cart');
                        localStorage.setItem('cart', ++crt);
                        new Index().lbmAlert(response['message']);
                    }
                }
            });
        }else {
            new Index().lbmAlert('Please Add Quantity', 'info');
            return null;
        }
    });

    const diapo = document.querySelector('.diapo__');
    let items = document.querySelector('.all_img');
    slides = Array.from(items.children);
    slidesWidth = diapo.getBoundingClientRect().width;

    document.querySelector('#nav_right_').addEventListener('click', function () {
        slideright();
    });
    function slideright() {
        compter--
        if (compter < 0){
            compter = slides.length - 1;
        }
        let move = -slidesWidth * compter;
        items.style.transform = `translateX(${move}px)`;
    }

    document.querySelector('#nav_left_').addEventListener('click', function () {
        slideleft();
    });
    function slideleft() {
        compter++
        if (compter === slides.length){
            compter = 0;
        }
        let move = -slidesWidth * compter;
        items.style.transform = `translateX(${move}px)`;
    }

    if (document.querySelector('#options__')){
        const opt = document.querySelector('#options__');
        opt.addEventListener('click', function () {
            new Index().scrollTo(0);
            $('.blog_post___').fadeIn(300);
        });
    }

    $('.blog_post___ button').on('click', function () {
            $('.blog_post___').fadeOut(300);
    });

    $("#add_blog_post").on('click', function (e) {
        e.preventDefault();
        let val = $("#blogPostcmt").val();
        if (val === ''){
            new Index().lbmAlert('Please write post', 'info');
        }else {
            let price = document.querySelector('.p_pce').firstElementChild.innerHTML;
            let rt = document.querySelector('.p_rt a').getAttribute('data-count');
            let post_img = sessionStorage.getItem('diapo');
            let cat = document.querySelector('.prod_cat').value;
            new Index().jxPostData('jxAddPost', this, p_name, price, post_img, cat, rt, val);
        }
    });

    document.querySelector('#btn_s_m').addEventListener('click', (e)=>{
        let ta = document.querySelector('#chatbtn_s_m_name_f');
        let slr = document.querySelector('#slr');
        if (ta.value !== ''){
            e.preventDefault();
            new Index().jxPostData("jxchat", this, ta.value, slr.value, 'PPC', 'http://localhost/projets/lebolma/');
        }
    });

    const __p = document.querySelectorAll('.lt span');
    __p.forEach(item =>{
        item.addEventListener('click', (e)=>{
            $(".text, .p_s_p, .p_s_c").css('border', 'none');
            item.style.borderBottom = '2px solid coral';
            $(".pp_desc, .pp_p, .pp_c").css('display', 'none');
            const clss = item.getAttribute("data-v");
            if(clss === 'pp_c'){
                $('.'+clss).css('display', 'flex');
            }else {
                $('.'+clss).fadeIn();
            }
        });
    });

});
