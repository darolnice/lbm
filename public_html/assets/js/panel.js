class Panel
{
    constructor() {}

    /**
     *
     * @param indice
     * @param val
     * @param context
     */
    jx2fa(context, indice, ...val){
        $.ajax({
            type: 'POST',
            url: 'jx2fa_',
            data: {
                indice:indice,
                dta: val
            },
            dataType: 'json',
            success: function (response) {
                if (response['message'] === "Update Success"){
                    context.parentNode.parentNode.firstElementChild.firstElementChild.nextElementSibling.innerHTML = val[0];
                    context.parentElement.firstElementChild.value = '';
                    context.parentElement.firstElementChild.nextElementSibling.value = '';
                    $('#cu_name').text(val[0])
                    context.parentElement.style.display = 'none';
                    new  Index().lbmAlert(response['message']);

                }else if (response['message'] === "Password is wrong"){
                    context.parentElement.firstElementChild.nextElementSibling.value = '';
                    new  Index().lbmAlert(response['message'], 'danger');
                }
                else if (response['message'] === "Password Update Successfully"){
                    context.parentElement.firstElementChild.value = '';
                    context.parentElement.firstElementChild.nextElementSibling.value = '';
                    context.parentElement.style.display = 'none';
                    new  Index().lbmAlert(response['message']);
                }
                else if(response['message'] === "City Update Successfully"){
                    context.parentNode.parentNode.firstElementChild.firstElementChild.nextElementSibling.innerHTML = val[0];
                    context.parentElement.style.display = 'none';
                    new  Index().lbmAlert(response['message']);
                }
            }
        });
    }

    /**
     *@param context
     * @param items
     */
    jxPa(context, ...items) {
        $.ajax({
            type: 'POST',
            url: 'jxpa',
            data: {
                items: items,
            },
            success: function (response) {
                if (response['response_code'] === 200){
                    document.querySelectorAll('#panel_add_a input').forEach(item =>{
                        item.value = '';
                    });
                    context.parentNode.parentNode.style.display = 'none';
                    new Index().lbmAlert(response['message']);
                }else if (response['response_code'] === 400){
                    new Index().lbmAlert(response['message']);
                }
            }
        });

    }

    /**
     *
     * @param value
     * @param context
     * @param option
     */
    panelSearch(value, context = null, option){
        $.ajax({
            type: 'GET',
            url: 'jxPanelSrch?search='+value+'&option='+option,
            success: function(data){
                let d = document.querySelector('.p_serch_div');
                d.innerHTML = '';
                let i = 0;
                while (i < data.length){
                    let a = document.createElement('a');

                    const p = document.createElement('p');
                    if (option === 'shop_name'){
                        a.setAttribute('href', 'shop?name='+data[i][option]);
                    }

                    a.innerHTML = data[i][option];

                    p.append(a)
                    document.querySelector('.p_serch_div').appendChild(p);
                    i++

                    $('.p_serch_div').fadeIn(300);
                }
            }
        });
    }
}



$(document).ready(function () {
    let s_here = '';
    let frsh = document.querySelector('.srch__');

    frsh.addEventListener('input', ()=>{
        if (frsh.value !== ''){
            $('.search_slct').hide();
            if (s_here === ''){
                new Panel().panelSearch(frsh.value, this, 'shop_name');
            }else {
                new Panel().panelSearch(frsh.value, this, s_here);
            }
        }else{
            $('.search_slct').fadeIn()
            $('.p_serch_div').fadeOut();
        }
    });

    const n = $(".notifdiv__");
    document.querySelector("#p_notif__").addEventListener("click", function () {
        new Index().jxPostData('jxAllNtf', this, null);
        $(".notifmess").css('visibility', "hidden");
        if (n.css("visibility") === 'hidden'){
            n.css('visibility', "visible");
        }else {
            n.css('visibility', "hidden");
        }
    });
    document.querySelector("#p_messa__").addEventListener("click", function () {
        new Index().jxPostData('jxAllMess', this, null);
        n.css('visibility', "hidden");
        const d = $(".notifmess");
        if (d.css("visibility") === 'hidden'){
            d.css('visibility', "visible");
        }else {
            d.css('visibility', "hidden");
        }
    });
    document.querySelectorAll('.v__btn').forEach(btn =>{
        btn.addEventListener('click', ()=>{
            btn.style.display = 'none';
            btn.nextElementSibling.style.display = 'block';
        });
    });


    document.querySelector('.admin_imag').addEventListener("click", function () {
        $('#admin_myDropdown').toggle(300);
    });
    window.onclick = function (e) {
        if (!e.target.matches('.admin_imag')){
            $('#admin_myDropdown').hide(300)
        }
    }
    $(".bck___hm").on('click', function () {
        open('./', '_parent');
    });


    document.querySelector(".srt_by").addEventListener('click', function () {
        $('.bt1').toggle(1000);
    });
    document.querySelector(".s_a").addEventListener('click', function () {
        $('.bt2').toggle(800);
    });
    document.querySelector(".shop_btn").addEventListener('click', function () {
        $('.bt3').toggle(500);
    });
    document.querySelector(".anc__btn").addEventListener('click', function () {
        $('.bt4').toggle(800);
    });

    document.querySelectorAll('tr').forEach((__tr) =>{
        __tr.style.transitionDuration = '.5s';
    });
    document.querySelectorAll('.bt1 input').forEach(inp =>{
        inp.addEventListener('click', function () {
            new Index().scrollTo(0);
            let selector = "#"+inp.getAttribute('data-show');
            $(selector).toggle(100);
        });
    });
    document.querySelectorAll('.bt2 input').forEach(inp =>{
        inp.addEventListener('click', function () {
            new Index().scrollTo(0);
            let selector = "."+inp.getAttribute('data-show');
            $(selector).toggle(300);
        });
    });
    document.querySelectorAll('.bt4 input').forEach(inp =>{
        inp.addEventListener('click', function () {
            new Index().scrollTo(50);
            let selector = "."+inp.getAttribute('data-show');
            $(selector).toggle(500);
        });
    });


    $("#su_upd_name").on('click', function (e) {
        e.preventDefault();
        let v = $('.sett_inSub').val();
        let p = document.querySelector(".sett_inSub").nextElementSibling.value;

        if (v !== '' && v.length > 3){
            new Panel().jx2fa(this, 'username', (new Index()).toCapitalize(v), p);
        }else {
            new Index().lbmAlert('User name is short!');
            return null;
        }
    });
    $("#su_upd_mail").on('click', function (e) {
        e.preventDefault();
        let regExp =  /@/ig;
        let v = $('.sett_inDesc').val();
        let p = document.querySelector(".sett_inDesc").nextElementSibling.value;

        if (v !== '' &&  v.match(regExp)){
            new Panel().jx2fa(this, 'email', v, p);
        }else {
            new Index().lbmAlert('Invalid adress e-mail!');
            return null;
        }
    });
    $("#su_upd_phone").on('click', function (e) {
        e.preventDefault();
        let v = $('.in_cp').val();
        let p = document.querySelector(".in_cp").nextElementSibling.value;

        if (v !== '' &&  v.length > 5 && typeof +v === "number"){
            new Panel().jx2fa(this, 'phone', v, p);
        }else {
            new Index().lbmAlert('Invalid phone number!');
            return null;
        }
    });
    $("#su_upd_pass").on('click', function (e) {
        e.preventDefault();
        let p = document.querySelector("#su_upd_old_pass").value;
        let np = $('#su_upd_npass').val();
        let pc = $('#su_upd_cpass').val();

        if (np === ''){
            new Index().lbmAlert('Please Complete All Forms!');
            return null;
        }
        else if (np.length < 8){
            new Index().lbmAlert('Password Is Short 8 Characters Min!');
            return null;
        }
        else if (np !== pc){
            new Index().lbmAlert('Password d\'nt Matches');
            return null;
        }
        else if (np !== '' && np.length >= 8 && np === pc){
            new Panel().jx2fa(this, 'password', np, p);
        }
    });
    $(".pa_slct").on('input', function () {
        let v = $('.pa_slct').val();
        let p = "";

        if (v !== ''){
            new Panel().jx2fa(this, 'city', v, p);
        }else {
            new Index().lbmAlert('Invalid City!');
            return null;
        }
    });

    let dna = document.querySelector('.search_slct');
    let sc = document.querySelector('.p_serch_div');
    dna.addEventListener('click', ()=>{
        if (document.querySelector('.p_sch_o')){
            let doc = document.querySelectorAll('.p_sch_o');
            doc.forEach(item=>{item.remove()});
            dna.style.transform = 'rotate(0deg)';
            $('.p_serch_div').fadeOut();
        }else {
            sc.innerHTML = '';
            let fp = document.createElement('p');
            let fs = document.createElement('p');
            let fo = document.createElement('p');
            fo.setAttribute('class', 'p_sch_o');
            fs.setAttribute('class', 'p_sch_o');
            fp.setAttribute('class', 'p_sch_o');
            fo.setAttribute('data-opt', 'option');
            fs.setAttribute('data-opt', 'shop_name');
            fp.setAttribute('data-opt', 'prod_name');
            fo.innerHTML = 'Search Option';
            fs.innerHTML = 'Search Shop';
            fp.innerHTML = 'Search Product';
            sc.append(fp);
            sc.append(fs);
            sc.append(fo);

            dna.style.transform = 'rotate(180deg)';
            $('.p_serch_div').fadeIn(200);

            let doc = document.querySelectorAll('.p_sch_o');
            doc.forEach(item=>{
                item.addEventListener('click', (e)=>{
                    s_here = e.target.getAttribute("data-opt");
                    dna.style.transform = 'rotate(0deg)';
                    $('.p_serch_div').fadeOut();
                });
            });
        }
    });

    document.querySelector('#p_p_post').addEventListener('click', function (e) {
        e.preventDefault();
        let capi = new Index();
        let p_qly = $("#p_p_qly").val();
        let p_n = $("#p_p_n").val();
        let p_c = $("#p_p_prc").val();
        let p_q = $("#p_p_qte").val();
        let p_clr = $("#p_p_clr").val();
        let p_s = $("#p_p_sze").val();
        let p_oth = $("#p_p_cmt").val();

        if (p_qly === "") {
            new Index().lbmAlert('Please Select quality');
            return null;
        }
        if (p_n === "") {
            new Index().lbmAlert('Please add Product Name');
            return null;
        }
        if (p_c === "") {
            new Index().lbmAlert('Please add Product Price');
            return null;
        }
        if (p_q === "") {
            new Index().lbmAlert('Please add Product Quantity');
            return null;
        }
        if (p_clr === "") {
            new Index().lbmAlert('Please add Product Color');
            return null;
        }

        new Panel().jxPa(this, p_qly, capi.toCapitalize(p_n), p_c, p_q, capi.toCapitalize(p_clr), p_s, p_oth);
    })

});