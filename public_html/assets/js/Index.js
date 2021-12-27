class Index {

    constructor() {
    }

    WEBSITE = 'https://lebolma.com/'

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
                    let a = document.createElement('a');
                    a.setAttribute('href', 'shop?name='+data[i]['shop_name']);
                    a.innerHTML = data[i]['shop_name'];
                    d.appendChild(a);
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
                        let shopname = '';
                        let idx = new Index();

                        if (idx.getCookie('cookies_u_data')){
                            shopname = idx.getCookie('cookies_u_data').split('"')[9];
                        }else {
                            shopname = idx.getCookie('cud').split('"')[1];
                        }

                        let li = document.createElement('li');
                        li.setAttribute('id', 'res_li');

                        let a = document.createElement("a");
                        a.setAttribute('href', "shop?name="+shopname);
                        a.innerHTML = shopname;

                        let p = document.createElement("p");
                        p.setAttribute('class', "res-p");
                        p.appendChild(a)

                        let b = document.createElement('b');
                        b.innerHTML = 'Now';

                        let h = document.createElement('h6');
                        h.innerHTML = data[2];

                        li.appendChild(p);
                        li.appendChild(b);
                        li.appendChild(h);

                        context.parentNode.parentNode.children[0].children[2].append(li);
                        var ulclass = context.parentNode.parentNode.children[0].children[2];

                        ulclass.scrollTo({top:100000, behavior:"smooth"});
                        context.children[0].value = '';
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
                if(response["response_code"] === 200 && response['res_id'] === 103){
                    if (response['message'] === 'ok'){
                        let img1 = context.children[6].firstElementChild.children[1].files[0];
                        let img2 = context.children[6].children[1].children[1].files[0];

                        let formData = new FormData();
                        formData.append('cni-img1', img1);
                        formData.append('cni-img2', img2);
                        new Index().UP_post_asyn_fetch("jxregist2", this, formData);
                    }

                }// register 2
                if(response["response_code"] === 200 && response["res_id"] === 125){
                    if (response['message'] === 'ok'){
                        context.style.display = 'none';
                        new Index().lbmAlert('Resquest sent successfully');
                    }else {
                        new Index().lbmAlert(response['message'], 'danger');
                    }

                }// dashboard send check resq
                if(response["response_code"] === 200 && response["res_id"] === 1589){
                    let idx = new Index();
                    if(response['message'] === true){
                        document.querySelectorAll('#disc_id input').forEach(ipt =>{
                           ipt.value = '';
                        });
                        idx.lbmAlert('Discount Add successfully');
                    }else {
                        idx.lbmAlert(response['message'], 'danger');
                    }
                }// create new discount
                if(response["response_code"] === 200 && response["res_id"] === 1256){
                    document.querySelectorAll('.one_n').forEach(div =>{div.remove()})
                    for(var i=0; i<response['message'].length; i++){

                        let div = document.createElement('div');
                        div.setAttribute('class', 'one_n');

                        let a = document.createElement("a");
                        a.classList.add('text-decoration-none');
                        a.setAttribute('href', response['message'][i]['link']);

                        let p_Date = document.createElement('p');
                        p_Date.setAttribute('class', 'notif_date');
                        p_Date.innerHTML = response['message'][i]['add_at'];

                        let p_Mess = document.createElement('p');
                        p_Mess.setAttribute('class', 'notif_message');
                        p_Mess.innerHTML = response['message'][i]['message'];

                        let div2 = document.createElement("div");
                        div2.classList.add('d-flex');
                        div2.classList.add('w-100');
                        div2.classList.add('_bbo');

                        if (response['message'][i]['img'] !== null){
                            let img = document.createElement('img');
                            img.setAttribute('class', 'img_ctx w-25');
                            img.setAttribute('src', 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/upload/'+response['message'][i]['img']);
                            img.setAttribute('alt', 'image');

                            div2.append(img);
                        }

                        let div3 = document.createElement("div");
                        div3.classList.add('w-75');

                        let p_Name = document.createElement('p');
                        p_Name.setAttribute('class', 'notif_pn');
                        p_Name.innerHTML = response['message'][i]['prod_name'];

                        let p_Price = document.createElement('p');
                        p_Price.setAttribute('class', 'notif_pp');
                        p_Price.innerHTML = response['message'][i]['price'];

                        let cmt = document.createElement('p');
                        cmt.setAttribute('class', 'p_n_cmt');
                        cmt.innerHTML = response['message'][i]['adComments'];

                        let del = document.createElement('del');
                        del.setAttribute('class', 'text-danger ml-3');
                        del.innerHTML = response['message'][i]['promo'];

                        let img2 = document.createElement('img');
                        img2.setAttribute('class', 'del_notif');
                        img2.setAttribute('data-nid', response['message'][i]['id']);
                        img2.setAttribute('src', 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/svg/delete_black_24dp.svg');

                        div.append(a);

                        div2.append(div3);

                        div3.append(p_Name);
                        div3.append(p_Price);
                        div3.append(cmt);

                        p_Price.append(del);

                        a.append(p_Date)
                        a.append(p_Mess)
                        a.append(div2)
                        div.append(img2)

                        let note = document.querySelector('.notifdiv__');
                        note.append(div);
                    }
                    $('.notCont').hide();

                    document.querySelectorAll('.del_notif').forEach(del =>{
                        del.addEventListener('click', (e)=>{
                            new Index().jxPostData('jxdel_not_mess', e.target, del.getAttribute('data-nid'), 'notif');
                        });
                    });

                }// notif
                if(response["response_code"] === 200 && response["res_id"] === 138){
                    document.querySelectorAll('.one_n').forEach(div =>{div.remove()})
                    for(var x=0; x<response['message'].length; x++){

                        let div = document.createElement('div');
                        div.setAttribute('class', 'one_n');

                        let p_Date = document.createElement('p');
                        p_Date.setAttribute('class', 'notif_date');
                        p_Date.innerHTML = response['message'][x]['sent_at'];

                        let p_Mess = document.createElement('p');
                        p_Mess.setAttribute('class', 'notif_message');
                        p_Mess.setAttribute('id', '_header_');
                        p_Mess.innerHTML = response['message'][x]['inf_mess'];

                        let div2 = document.createElement("div");
                        div2.classList.add('d-flex');
                        div2.classList.add('w-100');
                        div2.classList.add('_bbo');

                        if (response['message'][x]['ex_img'] !== null){
                            let img = document.createElement('img');
                            img.setAttribute('class', 'img_ctx w-25');
                            img.setAttribute('src', 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/upload/'+response['message'][x]['ex_img']);
                            img.setAttribute('alt', 'image');

                            div2.append(img);
                        }else {
                            let img = document.createElement('img');
                            img.setAttribute('class', 'img_ctx w-25');
                            img.setAttribute('src', 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/svg/person_black_24dp.svg');
                            img.setAttribute('alt', 'image');

                            div2.append(img);
                        }

                        let div3 = document.createElement("div");
                        div3.classList.add('w-75');

                        let p_Name = document.createElement('p');
                        p_Name.setAttribute('class', 'notif_pn');
                        p_Name.innerHTML = response['message'][x]['expediteur'];

                        let btn = document.createElement('button');
                        btn.setAttribute('class', 'text-dark v__btn');
                        btn.setAttribute('title', 'Click here for quick see this message');
                        btn.innerHTML = 'View';

                        let p_Price = document.createElement('p');
                        p_Price.setAttribute('class', 'notif_pp');
                        p_Price.setAttribute('id', '_message_');
                        p_Price.innerHTML = response['message'][x]['message'];


                        let img2 = document.createElement('img');
                        img2.setAttribute('class', 'del_notif');
                        img2.setAttribute('title', 'Delete this message');
                        img2.setAttribute('src', 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/svg/delete_black_24dp.svg');

                        div2.append(div3);

                        div3.append(p_Name);
                        div3.append(p_Price);
                        div3.append(btn);

                        div.append(p_Date)
                        div.append(p_Mess)
                        div.append(div2)
                        div.append(img2)

                        let note = document.querySelector('.notifmess');
                        note.append(div);
                    }
                    $('.notCont_mess').hide();

                    document.querySelectorAll('.v__btn').forEach(btn =>{
                        btn.addEventListener('click', ()=>{
                            btn.style.display = 'none';
                            btn.previousElementSibling.style.display = 'block';
                        });
                    });
                }// messages
                if(response["response_code"] === 200 && response["res_id"] === 63){
                    let idx = new Index();
                    if(response['message'] === true){
                        context.parentNode.style.display = 'none';

                    }else{
                        idx.lbmAlert(response['message'], "danger");
                    }
                }
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
        let link_ = 'http://127.0.0.1:8000/projets/lebolma/public_html/assets/images/upload/';

        fetch(url, {
            method: "post",
            body: data,
        }).then(res => res.json()
            .then(dta => {
                 if (dta['res_id'] === 20){
                     document.querySelector('.im--upload img').setAttribute('src', link_+dta['message']);
                     document.querySelector('.admin_imag').setAttribute('src', link_+dta['message']);
                     $("#up_img_auth").val('');
                     $('#up_img_auth').fadeOut(300);
                     new Index().lbmAlert('Profil image update successfully');
                 }

                 else if (dta['res_id'] === 52){
                     const pp = document.querySelector('#admin_persn');
                     pp.setAttribute('src', link_+dta['message']);
                     document.querySelector('#_supp_').setAttribute('data-crr', dta['message']);
                     document.querySelector('.ppname').innerHTML = dta['message'];
                     $('.su_pp_form').fadeOut(100);
                     new Index().lbmAlert('Updade Successfully');
                     return null;
                 }

                 else if (dta['res_id']){
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
    mercureEventsLarge(){
        let url = new URL('https://localhost:3000/.well-known/mercure/');
        let user = new Index().getCookie('cookies_u_data');

        if(user !== null){
            // topic pour le chat de façon global
            url.searchParams.append('topic', this.WEBSITE+'l_global');

            // topic pour les notifications
            url.searchParams.append('topic', this.WEBSITE+'l_notif');

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
    mercureEventVisiteur(){
        let url = new URL('http://localhost:3000/.well-known/mercure');
        let shp_u = new Index().getCookie('shp_u');

        if(shp_u !== null){
            // topic pour le shipping
            url.searchParams.append('topic', this.WEBSITE+'s_notif');

            const es_shp_u = new EventSource(url, {withCredentials: true});
            es_shp_u.onmessage = (e)=>{
                if (dta.sujet === 'SHIP'){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es_shp_u != null) ? es_shp_u.close(): null});
        }
    }

    //Event source saller
    mercureEventSaller(){
        let url = new URL('http://localhost:3000/.well-known/mercure');
        let shp_u = new Index().getCookie('shp_u');

        if(shp_u !== null){
            // sallers topic
            url.searchParams.append('topic', this.WEBSITE+'sllNotif');

            const es_shp_u = new EventSource(url, {withCredentials: true});
            es_shp_u.onmessage = (e)=>{
                let subjets = ['SHIP', 'RECLAM'];
                if (subjets.includes(dta.sujet)){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es_shp_u != null) ? es_shp_u.close(): null});
        }
    }

    //Event source chat
    mercureEventchat(){
        let url = new URL('http://localhost:3000/.well-known/mercure');
        let v_id = new Index().getCookie('v_id');
        if(v_id !== null){
            // topic des visiteurs pour le chat sur la page des produits
            m_url.searchParams.append('topic', this.WEBSITE+'c_chat');

            const es_v = new EventSource(url, {withCredentials: true});
            es_vs.onmessage = (e)=>{
                if (dta.sujet === 'PPC'){
                    alert(e.dta['message']);
                }
            }
            window.addEventListener('beforeunload', ()=>{(es_v != null) ? es_v.close(): null});
        }
    }


    jxAdsearch(url, res_div, r){
        $.ajax({
            type: 'GET',
            url: url+'?Search='+r,
            success: function(data){
                let d = $(res_div);
                d.text("");
                let i = 0;
                while (i < data.length){
                    let a = document.createElement('a');
                    let p = document.createElement('p');

                    a.setAttribute('class', 'JS-ann_a_res');
                    a.setAttribute('href', '?Search='+data[i]['prod_name']);
                    a.innerHTML = data[i]['prod_name'];

                    p.append(a);
                    d.append(p);
                    i++

                    d.fadeIn(300);
                }
            }
        });
    }

}


document.addEventListener('DOMContentLoaded', function () {

    const _btns = document.querySelectorAll('#lbm_a_btn');
    _btns.forEach(btn =>{
        btn.addEventListener('click', ()=>{
            $("#lbm_danger").fadeOut();
            $("#lbm_a_danger").fadeOut();
        });
    });

    setInterval(function () {
        $("#alert_danger").fadeOut();
    },5000);
    setInterval(function () {
        $("#lbm_a_danger").fadeOut();
    },5000);

    const n = $(".notifdiv__");
    if (document.querySelector("#notif__")){
        document.querySelector("#notif__").addEventListener("click", function () {
            new Index().jxPostData('jxAllNtf', this, null);
            $(".notifmess").css('visibility', "hidden");
            if (n.css("visibility") === 'hidden'){
                n.css('visibility', "visible");
            }else {
                n.css('visibility', "hidden");
            }
        });
    }

    if (document.querySelector("#messa__")){
        document.querySelector("#messa__").addEventListener("click", function () {
            new Index().jxPostData('jxAllMess', this, null);
            n.css('visibility', "hidden");
            const d = $(".notifmess");
            if (d.css("visibility") === 'hidden'){
                d.css('visibility', "visible");
            }else {
                d.css('visibility', "hidden");
            }
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
        const frm = $("#s_usrn_2");
        frm.on('input', function () {
            const regExp = /[^a-z A-Z]/g;
            if (regExp.test(frm.val())){
                shopname = 'not allow';
                $('#s_usrn_2').css('border-color', 'red');
                index.lbmAlert('Character not allow', 'danger');
            }
        });

        //
        frm.on('change', function () {
            $.ajax({
                type:'POST',
                url:'ckReadyUse',
                data: {prop: this.value},
                success:function (response) {
                    if (response["message"] !== 'free'){
                        shopname = 'not free';
                        $('#s_usrn_2').css('border-color', 'red');
                        index.lbmAlert('Shop name all ready in use', 'danger');
                    }else {
                        shopname = 'free';
                        $('#s_usrn_2').css('border-color', 'green');
                    }
                }
            });
        });

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

                        let nv = "";
                        let reg2 = / /g
                        nv = frm.val().replace(' ', '_');
                        do {
                            nv = nv.replace(' ', '_');
                        }while (reg2.test(nv))
                    
                        data.Shopname = nv;
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

