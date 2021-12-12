class Index {

    constructor() {
    }

    /**
     *
     * @param position
     */
    scrollTo(position){
        window.scrollTo({
            top:position,
            left:0,
            behavior:"smooth"
        });
    }

    /**
     *
     * @param message
     * @param type
     */
    lbmAlert(message = null, type = null){
        if (type !== null){
            if (document.querySelector('.alert-'+type)){
                document.querySelector('.alert-'+type).setAttribute('class', 'alert-'+type);
                $(".message").text(message);
                $(".alert-"+type).fadeIn(200);
            }else {
                document.querySelector('.alert-').setAttribute('class', 'alert-'+type);
                $(".message").text(message);
                $(".alert-"+type).fadeIn(200);
            }

        }else{
            document.querySelector('#alrt_').setAttribute('class', 'alert-');
            $(".message").text(message);
            $(".alert-").fadeIn(200);
        }

        setInterval(function () {
            $(".alert-, .alert-"+type).fadeOut();
        },5000);

    }

    /**
     *
     * @param top
     * @param left
     */
    lbmLoad(top = null, left = null){
        let item = document.querySelector('.load');

        item.style.top =  top;
        item.style.left =  left;
        item.style.display =  'block';
    }

    /**
     *
     * @param title
     * @param message
     * @param option1
     * @param option2
     */
    popup(title, message, option1 = null, option2 = null){
        $('#pop_ttl').text(title);
        $('.poppup b').text(message);
        $('.opt1').text(option1);
        $('.opt2').text(option2);
        $('.poppup').fadeIn(300);
    }

    /**
     *
     * @param world
     * @returns {string}
     */
    toCapitalize(world = null){
        if (world == null){
            return '';
        }else {
            return world[0].toUpperCase()+world.substr(1, world.length);
        }
    }

    /**
     *
     * @param resDiv
     * @param r
     */
    jxSearchAnyWhere(resDiv, r){
        $.ajax({
            type: 'GET',
            url: 'jxSearchAW?Search='+r,
            success: function(data){
                let d = document.querySelector(resDiv);
                d.innerHTML = '';
                let i = 0;
                while (i<data.length){
                    let el = document.createElement('a');
                    el.setAttribute('href', 'shop?name='+data[i]['shop_name']);
                    el.innerHTML = data[i]['shop_name'];
                    document.querySelector(resDiv).appendChild(el);
                    i++

                    $('.CountryList').css('visibility', 'hidden');
                    $('.ActivityList').css('visibility', 'hidden');

                    $(resDiv).fadeIn(300);
                }
            }
        });
    }

    /**
     *
     * @param resDiv
     * @param r
     */
    jxSearch(resDiv, r){
        $.ajax({
            type: 'GET',
            url: 'jxS_Api?Sp='+r,
            success: function(data){
                let d = document.querySelector(resDiv);
                d.innerHTML = '';
                let i = 0;
                while (i<data.length){
                    let el = document.createElement('a');
                    el.setAttribute('href', '?sp='+data[i]['prod_name']);
                    el.innerHTML = data[i]['prod_name'];
                    document.querySelector(resDiv).appendChild(el);
                    i++

                    $(resDiv).fadeIn(300);
                }
            }
        });
    }

    /**
     *
     * @param resDiv
     * @param r
     */
    jxHomeShopSearch(resDiv, r){
        $.ajax({
            type: 'GET',
            url: 'jxPanelSrch?search='+r,
            success: function(data){
                let d = document.querySelector(resDiv);
                d.innerHTML = '';
                let i = 0;
                while (i<data.length){
                    let el = document.createElement('a');
                    el.setAttribute('href', '?search='+data[i]['shop_name']);
                    el.innerHTML = data[i]['shop_name'];
                    document.querySelector(resDiv).appendChild(el);
                    i++

                    $('.srtby').css('visibility', 'hidden');
                    $(resDiv).fadeIn(300);
                }
            }
        });
    }


    /**
     *
     * @param formSelector
     * @param propos
     */
    jxliveCheck(formSelector, propos){
        $.ajax({
            type:'POST',
            url:'jxlivechk',
            data: {
                proposition: propos,
            },
            success: function (response) {

                if (response['message'] === 'Already in use'){
                    formSelector.style.boxShadow = "0 0 6px rgba(212, 8, 8, 0.95)";
                    formSelector.style.backgroundColor = "rgba(226,27,27,0.67)";
                    formSelector.style.color = "rgb(255,255,255)";
                    new Index().lbmAlert('Already in use', 'danger');
                    return null;
                }

                if(response['message'] === 'free'){
                    formSelector.style.boxShadow = "0 0 8px green";
                    formSelector.style.backgroundColor = "white";
                    formSelector.style.color = "black";
                    return true;
                }
            },
            error: function (error) {
                if (error){
                    formSelector.style.backgroundColor = "rgb(255,255,255)";
                }
            }
        });
    }

    /**
     *
     * @param url
     * @param context
     * @param data
     */
    jxPostData(url, context = null, ...data){
        $.ajax({
            type: 'POST',
            url: url,
            data: {data: data},
            success: function(response){
                if(response["response_code"] === 200 && response["res_id"] === 1009){
                    let pttl = context.getAttribute('data-qte') * response['message'][0]['price'];
                    context.innerHTML = pttl.toFixed(2) + " " + response['message'][1]['currency'];
                }// check cart price
                if(response["response_code"] === 200 && response["res_id"] === 1005){
                    if (response['message'] === 'success'){

                        console.log(data)
                        let li = document.createElement('li');
                        li.setAttribute('id', 'res_li');
                        let a = document.createElement("a");
                        a.setAttribute('style', 'margin-right:5px;')
                        a.setAttribute('href', "shop?name="+ new Index().getCookie(''));
                        a.innerHTML = data['shop_name'];
                        let b = document.createElement('b');
                        b.innerHTML = date();
                        let h = document.createElement('h6');
                        h.innerHTML = data[2];
                        li.appendChild(a);
                        li.appendChild(b);
                        li.appendChild(h);
                        context.parentNode.parentNode.children[0].childNodes[3].append(li);


                        // context.firstElementchild.innerHTML = '';
                    }

                }// Annonces
                if(response["response_code"] === 200 && response["res_id"] === 1919){
                    if (response['message'] === 'Your reclamation add successfully'){
                        let slct = '#'+context.id+" input";
                        document.querySelectorAll(slct).forEach(item =>{
                            item.value = '';
                        });
                        $("#b_submit").val('SEND');
                        $(".rec_back_prd").fadeOut(300);
                        new Index().scrollTo(0);
                        new Index().lbmAlert(response["message"]);
                    }
                    if (response['message'] === 'Bad data please check your transaction informations'){
                        new Index().lbmAlert(response["message"], 'danger');
                    }
                }// reclamation sent rec
                if(response["response_code"] === 200 && response["res_id"] === 929){
                    if (response['message'] === 'Your alert sent succesfully'){
                        document.querySelectorAll("#alert_form_id input").forEach(item =>{
                            item.value = '';
                        });
                        $("#s_sbt_").val('SEND');
                        $(".rec_sig").fadeOut(300);
                        new Index().scrollTo(0);
                        new Index().lbmAlert(response["message"]);
                    }else {
                        new Index().lbmAlert(response["message"], 'danger');
                    }
                }// reclamation sent alert
                if(response["response_code"] === 200 && response["res_id"] === 106){
                    if (response['message'] === 'Your alert sent succesfully'){
                        document.querySelectorAll("#aboutiss_id input").forEach(item =>{
                            item.value = '';
                        });
                        $("#a_sbt_").val('ENTER');
                        $(".rec_resol").fadeOut(300);
                        new Index().scrollTo(0);
                        new Index().lbmAlert(response["message"]);
                    }else {
                        new Index().lbmAlert(response["message"], 'danger');
                    }
                }// reclamation sent end rec
                if(response["response_code"] === 200 && response["res_id"] === 110){
                    new Index().scrollTo(0);
                    $('.rec_choose').fadeOut(300);
                    if (response['message'] === 'Thank for your participation'){
                        new Index().lbmAlert(response["message"]);
                    }else {
                        new Index().lbmAlert(response["message"], 'danger');
                    }
                }// faq
                if(response["response_code"] === 200 && response["res_id"] === 603){
                    if (response['message'] === 'Post add successfully'){
                        $('.blog_post___').fadeOut(350);
                        new Index().lbmAlert(response["message"]);
                    }else {
                        new Index().lbmAlert(response["message"], 'info');
                    }
                }// forum
                if(response["response_code"] === 200 && response["res_id"] === 1030){
                    if (response['message'] === 'Comment Add'){
                        let ck = new Index().getCookie('cookies_u_data');
                        context.parentNode.firstElementChild.value = '';
                        let nv = context.parentNode.parentNode.children[3].firstElementChild.children[1];
                        nv.firstElementChild.innerHTML = ck.split('"')[1];
                        nv.children[1].innerHTML = 'Posted Now';
                        context.parentNode.parentNode.children[3].children[1].innerHTML = data[1];
                        new Index().lbmAlert(response["message"]);
                    }else {
                        new Index().lbmAlert(response["message"], 'info');
                    }
                }// forum || ad
                if(response["response_code"] === 200 && response["res_id"] === 107){
                    if (response['message'] === 'ok'){
                        context.children[1].value = '';
                        context.children[2].value = '';
                        context.children[3].value = '';
                        context.children[4].value = '';
                        new Index().lbmAlert('Your message sent successfully');
                    }else {
                        new Index().lbmAlert(response['message'], 'danger');
                    }
                }
                if(response["response_code"] === 200 && response["res_id"] === 298){
                    if (response['message'] === '1'){
                        context.parentNode.style.display = 'none';
                        $('#_pr_st').text(data[0]);
                        new Index().lbmAlert('State update successfully');
                    }else {
                        new Index().lbmAlert('Faill', 'danger');
                    }
                }// admin dashboard
                if(response["response_code"] === 200 && response["res_id"] === 202){
                    if (response['message'] === 'true'){
                        $('.mrinf').fadeOut(200);
                        new Index().lbmAlert('Product add successfully');
                    }else {
                        new Index().lbmAlert('Faill', 'danger');
                    }
                }// add prod
                if(response["response_code"] === 200 && response["res_id"] === 10){
                    if (response['message'] === true){
                        $('.___mrinf').fadeOut(200);
                        new Index().lbmAlert('Product submit successfully');
                    }else {
                        new Index().lbmAlert('Faill', 'danger');
                    }
                }// admin resquect to check or advanced
                if(response["response_code"] === 200 && response["res_id"] === 1012){
                    if (response['message']){
                        let link = 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/upload/'+response['message'][0]['profil_image'];
                        document.querySelector('.u_img img').setAttribute('src', link);
                        $("#c_u_name").text(response['message'][0]['username']);
                        $("#c_u_mail").text(response['message'][0]['email']);
                        $("#c_u_genre").text(response['message'][0]['genre']);
                        $("#c_u_interest").text(response['message'][0]['interest_by']);
                        $("#c_u_mgr").text(response['message'][0]['sub_users']);
                        $("#c_u_phone").text(response['message'][0]['phone_number']);
                        $("#c_u_country").text(response['message'][0]['country']);
                        $("#c_u_city").text(response['message'][0]['city']);
                        $("#c_u_shop").text(response['message'][0]['shop_name']);
                        $("#c_u_matricul").text(response['message'][0]['matricule']);
                        $("#c_u_plan").text(response['message'][0]['current_plan']);
                        $("#c_u_create").text(response['message'][0]['create_at']);
                        $('.aboutUser').fadeIn(600);
                    }else {
                        new Index().lbmAlert('Faill', 'danger');
                    }
                }// admin get data
                if(response["response_code"] === 200 && response["res_id"] === 1808){
                    if (response['message'] === "next"){
                        let imgData = [];
                        let formData = new FormData();

                        document.querySelectorAll('#nw__im').forEach(item=>{imgData.push(item.files[0])});
                        formData.append('nw__im1', imgData[0]);
                        formData.append('nw__im2', imgData[1]);
                        formData.append('nw__im3', imgData[2]);
                        formData.append('nw__im4', imgData[3]);
                        formData.append('nw__im5', imgData[4]);

                        new Dashboard().FtcNewProd('jxNewProd', formData);
                    }else {
                        new Index().lbmAlert('Faill', 'danger');
                    }
                }// admin upload images
                if(response["response_code"] === 200 && response["res_id"] === 45){
                    if (response['message'] === 'true'){
                       location.reload();
                    }
                }// range price
                if(response["response_code"] === 200 && response["res_id"] === 106){
                    let id = '#'+context;
                    document.querySelector(id).previousElementSibling.previousElementSibling.style.display = 'none';
                    $(id).fadeOut();
                    $('.load').hide();
                    new Index().lbmAlert(response["message"]);
                }// setting
                if(response["response_code"] === 200 && response["res_id"] === 166){
                    $('.load').hide();
                    new Index().lbmAlert(response["message"])
                }// setting
                if(response["response_code"] === 200 && response["res_id"] === 11){
                    $('.btn_t').text(response["message"]+' '+context);
                    new Index().lbmAlert('Convert');
                }// checkcart reconvert tt
                if(response["response_code"] === 200 && response["res_id"] === 13){
                    let cp = context.parentNode.parentNode.children[4];
                    cp.innerHTML = (response['message'][0]*data[2]).toFixed(2)+ ' '+data[3]
                    $('.btn_t').text(response['message'][1]+' US$');
                }// checkcart update price
                if(response['message'] === 'ok' && response['res_id'] === 103){
                    let img1 = context.children[6].firstElementChild.children[1].files[0];
                    let img2 = context.children[6].children[1].children[1].files[0];

                    let formData = new FormData();
                    formData.append('cni-img1', img1);
                    formData.append('cni-img2', img2);
                    new Index().UP_post_asyn_fetch("jxregist2", this, formData);
                }// register 2
            }
        });
    }


    /**
     *
     * @param url
     * @param context
     */
    jxGetSphAnyWhere(url, context = null){
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data){
                let d = document.querySelector('.blogResDiv');
                d.innerHTML = '';
                let i = 0;
                while (i < data.length){
                    let el = document.createElement('a');
                    el.setAttribute('class', 'blogSpA');
                    el.setAttribute('href', '?Search='+data[i]['prod_name']);
                    el.innerHTML = data[i]['prod_name'];
                    document.querySelector('.blogResDiv').appendChild(el);
                    i++

                    $('.blg_arc_cat').css('visibility', 'hidden');
                    $('.blogResDiv').fadeIn(300);
                }
            }
        });
    }


    /**
     *
     * @param btn_id
     * @param link
     * @param target
     */
    openLink(btn_id, link, target = null){
        if(target === null){
            $('#'+btn_id).on('click', function () {
                window.open(link);
            });

        }else{
            $('#'+btn_id).on('click', function () {
                window.open(link, '_parent');
            });
        }
    }

    /**
     *
     * @param offset
     * @returns {string}
     */
    getCookieVal(offset) {
        var endstr = document.cookie.indexOf (";", offset);
        if (endstr === -1) endstr = document.cookie.length;
        return unescape(document.cookie.substring(offset, endstr));
    }

    /**
     *
     * @param name
     * @returns {null|*}
     */
    getCookie(name) {
        let arg = name+"=";
        let alen = arg.length;
        let clen = document.cookie.length;
        let i = 0;
        while (i < clen) {
            let j = i+alen;
            if (document.cookie.substring(i, j) === arg)
                return this.getCookieVal (j);
            i = document.cookie.indexOf(" ", i)+1;
            if (i === 0) break;
        }
        return null;
    }


    /**
     *
     * @param name
     * @param value
     * @param exdays
     * @constructor
     */
    SetCookie (name, value, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }


    /**
     *
     * @param url
     * @param context
     * @param data
     */
    post_asyn_fetch(url, context = null, data){
        fetch(url, {
            method: "post",
            body: data,
        }).then(res => res.json()
            .then(dta => {
                 if (dta['res_id'] === 20){
                     let link_ = 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/upload/'+dta['message'];
                     document.querySelector('.im--upload img').setAttribute('src', link_);
                     document.querySelector('.admin_imag').setAttribute('src', link_);
                     $("#up_img_auth").val('');
                     $('#up_img_auth').fadeOut(300);
                     new Index().lbmAlert('Profil image update successfully');
                 }else if (dta['res_id']){
                     new Index().lbmAlert(dta['message'], 'danger');
                 }
            })
        );
    }


    /**
     *
     * @param url_
     * @param context
     * @param data
     * @constructor
     */
    UP_post_asyn_fetch(url_, context, data){
        fetch(url_, {
              method: "post",
              body: data,
            }).then(res => res.json()
                .then(val => {
                    if (val['res_id'] === 49){
                        new Index().lbmAlert('Product update successfully');
                        new Dashboard().closeElemet('.edit__prod');
                    }else {
                        if(val['message'] === 'success'){
                            location.replace("business");
                        }
                    }
                }
            )
        );

    }


    //Event source large
    wsEventsLarge(){
        let url = new URL('https://localhost:3000/.well-known/mercure/');
        let user = new Index().getCookie('cookies_u_data');

        if(user !== null){
            // topic pour le chat de façon global
            url.searchParams.append('topic', 'https://lebolma.com/l_global');

            // topic pour les notifications
            url.searchParams.append('topic', 'https://lebolma.com/l_notif');

            const es = new EventSource(url, {withCredentials: true});
            es.onmessage = (e)=>{
                let dta = JSON.parse(e.data);

                //Private Chat
                if (dta.sujet === 'PC'){
                    alert(e.dta['message']);
                }

                //Global Notifications
                if (dta.sujet === 'GN'){
                    alert(e.dta['message']);
                }

                //Product Page Chat
                if (dta.sujet === 'PPC'){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es != null) ? es.close() : null});
        }
    }

    //Event source visiteur
    wsEventVisiteur(){
        let url = new URL('http://localhost:3000/.well-known/mercure');
        let shp_u = new Index().getCookie('shp_u');

        if(shp_u !== null){
            // topic pour le shipping
            url.searchParams.append('topic', 'https://lebolma.com/s_notif');

            const es_shp_u = new EventSource(url, {withCredentials: true});
            es_shp_u.onmessage = (e)=>{
                if (dta.sujet === 'SHIP'){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es_shp_u != null) ? es_shp_u.close(): null});
        }
    }

    //Event source visiteur
    wsEventchat(){
        let url = new URL('http://localhost:3000/.well-known/mercure');
        let v_id = new Index().getCookie('v_id');
        if(v_id !== null){
            // topic des visiteurs pour le chat sur la page des produits
            m_url.searchParams.append('topic', 'https://lebolma.com/c_chat');

            const es_v = new EventSource(url, {withCredentials: true});
            es_vs.onmessage = (e)=>{
                if (dta.sujet === 'PPC'){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es_v != null) ? es_v.close(): null});
        }
    }


}


document.addEventListener('DOMContentLoaded', function () {

    setInterval(function () {
        $(".alert_danger").fadeOut();
    },8000);

    if (document.querySelector("#notif__")){
        document.querySelector("#notif__").addEventListener("click", function () {
            $(".notifdiv__").toggle(500);
        });
    }

    /**
     *  login start
     */
    if (document.querySelector('.s_signup_a')){
        new Index().openLink('bs_account', 'business', '_parent');
    }
    /**
     *  login 1end
     */


    /**
     *  business start
     */
    if (document.querySelector('#_busi_')){
        setInterval(function () {
            $(".lbm_a_success").fadeOut();
        },8000);

        $('.lbm_a_success button').on('click', function () {
            $(".lbm_a_success").fadeOut();
        });
    }
    /**
     *  business end
     */


    /**
     *   shop list start
     */
    if (document.querySelector('.shp__list')){
        document.querySelectorAll('.shp__list').forEach(item=>{
           item.addEventListener('click', function () {
                window.location.href = 'shop?name='+item.getAttribute('data-spn');
           });
        });

        document.querySelector('#shop_search__').addEventListener('input', function () {
            if (this.value !== ''){
                new Index().jxSearchAnyWhere('.res_div', this.value);
            }else {
                $('.res_div').hide();
                $('.CountryList').css('visibility', 'visible');
                $('.ActivityList').css('visibility', 'visible');
            }
        });
    }
    /**
     *   shop list end
     */


    /**
     * faq start
    */
    if (document.querySelector("#satis")){
        $('#rec_cls').on('click', function () {
            // new Index().scrollTo(0);
            $('.rec_choose').fadeOut(300);
        });

        document.querySelectorAll(".btn").forEach(btn =>{
            btn.addEventListener('click', function () {
                $('.mt-2').text(btn.parentNode.firstChild.nextSibling.innerHTML);
                $("#pop_p").val(btn.getAttribute('data-id'));
                $('.rec_choose').fadeIn(300);
            });
        })

        $('#satis').on('click', function () {
            new Index().jxPostData('jxFaqP', this, $("#pop_p").val(), 1, null);
        });

        $('#no_satis').on('click', function () {
            new Index().jxPostData('jxFaqP', this, $("#pop_p").val(), null, 1);
        });

    }
    /**
     * faq end
    */


    /**
     *  partial best start
     */
    if (document.querySelector('#_bslg_art_t1')){
        $('.__best__ button').on('click', function () {
            $('.__best__').fadeOut(400);
            $(".promo, .lbm_prod").fadeIn(700);
        });

        /**
         * show best salling
         */
        $('#_bslg_art_t1').on('click', function () {
            $(".best__ttl").text('Best Selling');

            $('.best_s').fadeOut();
            $(".promo, .lbm_prod").fadeOut(300);

            $('.best_p').fadeIn(310);
            $(".__best__").attr('style', 'display:block');
        });

        /**
         * show best shop
         */
        $('.bshp_art_t1_vm').on('click', function () {
            $(".best__ttl").text('Best shop');

            $('.best_p').fadeOut();
            $(".promo, .lbm_prod").fadeOut(300);

            $('.best_s').fadeIn(310);
            $(".__best__").attr('style', 'display:block');

        });
    }
    /**
     *  partial best end
     */


    /**
     *  register 1 start
     */
    if (document.querySelector('#s_usrn')){
        const f_name = document.querySelector('#s_usrn');
        f_name.addEventListener('change', function () {
            if (this.value !== ''){
                new Index().jxliveCheck(f_name, this.value);
            }
        });

        f_name.addEventListener('input', function () {
            if (f_name.value === ''){
                f_name.style.backgroundColor = 'white';
                f_name.style.boxShadow = '0 0 6px #fff';
                f_name.style.color = 'black';
            }
        });

        document.querySelector('#s_pw_c').addEventListener('input', function () {
            if (this.value !== document.querySelector('#s_pw').value){
                this.style.borderColor = 'red';
            }else {
                this.style.borderColor = 'green';
            }
        });
    }
    /**
     *  register 1 end
     */


    /**
     * register 2 start
     */
    if (document.querySelector('#s_usrn_2')){
        let shopname;
        var index = new Index();
        const planBtn = document.querySelector('#tknsh1');
        const defbtn1 = document.querySelector('#s_cni_1');
        const defbtn2 = document.querySelector('#s_cni_2');
        const custbtn = document.querySelectorAll(".smartbtn");

        index.openLink('s_pw_c_2', 'plans', null);

        //
        $('#s_usrn_2').on('change', function () {
            $.ajax({
                type:'POST',
                url:'ckReadyUse',
                data: {prop: this.value},
                success:function (response) {
                    if (response["message"] !== 'free'){
                        shopname = 'not free';
                        $('#s_usrn_2').css('border-color', 'red');
                    }else {
                        shopname = 'free';
                        $('#s_usrn_2').css('border-color', 'green');
                    }
                }
            });
        });

        //
        if(planBtn.classList.contains("d-none")){
            function plcMgr(){
                if(index.getCookie('thkp')){
                    $('#s_pw_c_2').hide();
                    planBtn.classList.remove('d-none');

                }else{
                     console.log('actif')
                    requestAnimationFrame(plcMgr);
                }
            }
        }else{cancelAnimationFrame(plcMgr)}
        requestAnimationFrame(plcMgr)

        //
        custbtn.forEach(element => {
             element.addEventListener('click', ()=>{
                 let prv_id = element.previousElementSibling.previousElementSibling.getAttribute('id');

                 if(prv_id === 's_cni_1'){
                    uploadcard1();
                 }else{
                    uploadcard2();
                 }
             })
        });

        //
        function uploadcard1() {defbtn1.click();}
        function uploadcard2() {defbtn2.click();}

        //
        document.querySelectorAll('#s_cni_1, #s_cni_2').forEach(item =>{
            item.addEventListener('input', ()=>{
                if(item.getAttribute('id') === 's_cni_1'){
                    let file = defbtn1.files[0];
                    if(file){
                        const reader = new FileReader();
                        reader.addEventListener('load', ()=>{
                            document.querySelector('.thumb1').setAttribute('src', reader.result)
                        });
                        reader.readAsDataURL(file)
                    }  

                }else{
                    let file2 = defbtn2.files[0];
                    if(file2){
                        const reader = new FileReader();
                        reader.addEventListener('load', ()=>{
                            document.querySelector('.thumb2').setAttribute('src', reader.result)
                        });
                        reader.readAsDataURL(file2)
                    } 
                } 
            })
        });

        //
        document.forms["reg2_form"].addEventListener('submit', function(e){
            inputs = this;
            let data = {
                    Shopname: '',
                    City: '',
                    Activity: '',
                    Description: '',
                    Matricule: '', 
                    Plan: ''
            }

            if(inputs){
                e.preventDefault();
                if(shopname === 'free'){
                    if(defbtn1.files[0] !== null && defbtn2.files[0] !== null){
                        if(!inputs['shop_name'].value || !inputs['city'].value ||
                           !inputs['activity'].value  || !inputs['description'].value)
                        {
                            index.lbmAlert('Please complete all forms', "danger");
                            return 
                        }
                    
                        data.Shopname = inputs['shop_name'].value;
                        data.City = inputs['city'].value;
                        data.Activity = inputs['activity'].value
                        data.Description = inputs['description'].value;
                        data.Matricule = inputs['matricul'].value;
                        data.Plan = inputs['plan'].value;

                        index.lbmLoad('350px', '-32%');
                        index.jxPostData('jxregist2', this, JSON.stringify(data));

                    }else{
                        index.lbmAlert('Please upload all card id image', "danger")
                    }
                }else{
                    index.lbmAlert('Please Enter available Shop name', 'danger');
                }
                
            }
            
        });

    }
    /**
     * register 2 end
     */


    /**
     * service start
     */
    if (document.querySelector("#cust_ecom")){
        $("#cust_ecom").on('click', function () {
            if (document.querySelector(".presentation").style.display === 'block'){
                new Index().scrollTo(1000);
            }else {
                new Index().scrollTo(1200);
            }
            $('.presentation').fadeIn(1200);
            $(".__itms .serv__1").addClass('focus__');
        });

        $('#serv_vc').on('click', function () {
            $('.presentation').addClass('for_presentation');
            $(".preSale_preImg").addClass('__for_preSale_preImg');
            $('.pre_sale').addClass('__for_pre_sale');
            $('.pre_sale_img').addClass('for_pre_sale_img');
            $('.preShop').fadeIn(1200);
        });

        new Index().openLink("t_i_n", "register", '_parent');

        document.querySelectorAll('#own_serv').forEach(item =>{
            let goto = item.getAttribute('data-goto');
            if (goto !== ""){
                new Index().openLink(item.getAttribute('id'), goto,'_parent');
            }
        });

        document.querySelectorAll('.preShop div button').forEach(item =>{
            new Index().openLink(item.getAttribute('id'), "shoplist", '_parent');
        });
    }
    /**
     * service end
     */


    /**
     * sign up start
     */
     if(document.querySelector('#usrn')){
         const f_name = document.querySelector('#usrn');
         f_name.addEventListener('change', function () {
             if (this.value !== ''){
                 new Index().jxliveCheck(f_name, this.value);
             }
         });
         f_name.addEventListener('keyup', function () {
            
             if (f_name.value === ''){
                 f_name.style.backgroundColor = 'transparent';
                 f_name.style.boxShadow = '0 0 6px #fff';
                 f_name.style.color = 'white';
             }
         });
     }
    /**
     * sign up end
     */

});

