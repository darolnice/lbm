class Dashboard {

    constructor() {}

    setting (){location.replace('setting')}

    addinpromo(){
        document.querySelectorAll('.addinpromo').forEach(item =>{
            this.showElemet(".p__list");
            item.style.visibility = 'visible';
        });
    }

    /**
     *
     * @param prod_id
     */
    ajxShowEditProd (prod_id){
        $.ajax({
           type: 'POST',
           url: 'jxProdData',
           data: {
               id: prod_id
           },
            dataType: 'json',
           success: function (response) {
                new Dashboard().push_dat(response);
           }
        });
    }

    /**
     *
     */
    ajxEditProd (...data){
        $.ajax({
            type: 'POST',
            url: 'jxEditProd',
            data: {data},
            dataType: 'json',
            success: function (response) {
                if (response['message'] === 'next'){
                    let imgData = [];
                    let formData = new FormData();

                    document.querySelectorAll('#ed___im').forEach(item =>{imgData.push(item.files[0])});
                    formData.append('img1', imgData[0]);
                    formData.append('img2', imgData[1]);
                    formData.append('img3', imgData[2]);
                    formData.append('img4', imgData[3]);
                    formData.append('img5', imgData[4]);

                    new Index().UP_post_asyn_fetch(this, formData);
                }
            }
        });
    }

    /**
     *
     * @param url
     * @param data
     * @constructor
     */
    FtcNewProd (url, data){
        fetch(url, {method: 'POST', body:  data}).then(res => res.json().then(dta =>{

                if (dta['message'] === 1){
                    new Index().lbmAlert('Product add sucessfully');
                    new Dashboard().closeElemet('.new__prod');

                    setTimeout(function () {
                        new Index().scrollTo(0);
                        location.reload();
                    }, 2500);
                }else {
                    new Index().lbmAlert(dta['message']);
                }
            })
        );
    }

    /**
     *
     * @param col
     * @param data_
     * @param value
     */
    ajxUpdateUserData(col = null, data_ = null, ...value){
        $.ajax({
           type: "POST",
           url: "ajxUUD",
           data: {
               columb: col,
               dta_: data_,
               value: value
           },
            success: function (response) {
                if (response){
                    if (response['res_id'] === 1220){
                        $("#up__name_auth").val('');
                        $('#up__name_auth').fadeOut(300);
                        document.querySelector('#up__name').value = new Index().toCapitalize(data_);
                        document.querySelector('.nam').innerHTML = new Index().toCapitalize(data_);
                        new Index().lbmAlert('Username update successfully');
                        return null;
                    }else if(response['message'] === 'name'){
                        $("#up__name_auth").fadeIn(200);
                        $('.load').hide();
                        new Index().lbmAlert('Authentification code sent, please check your sms');
                        return null;
                    }

                    if (response['res_id'] === 1240){
                        $('#up___mail').val(data_);
                        $("#up__mail_auth").val('');
                        $('#up__mail_auth').fadeOut(300);
                        new Index().lbmAlert('E-mail update successfully');
                        return null;
                    }else if(response['message'] === 'email'){
                        $("#up__mail_auth").fadeIn(200);
                        $('.load').hide();
                        new Index().lbmAlert('Authentification code sent, please check your sms');
                        return null;
                    }

                    if (response['res_id'] === 999){
                        $('#up__ph').val(data_);
                        $("#up__ph_auth").val('');
                        $('#up_ph_auth').fadeOut(300);
                        new Index().lbmAlert('Phone update successfully');
                        return null;
                    }else if (response['message'] === 'phone'){
                        $("#up_ph_auth").fadeIn(200);
                        $('.load').hide();
                        new Index().lbmAlert('Authentification code sent, please check your E-mail');
                        return null;
                    }

                    if (response['res_id'] === 9009){
                        $('#up__city').val(data_);
                        $("#up__city_auth").val('');
                        $('#up__city_auth').fadeOut(300);
                        new Index().lbmAlert('City update successfully');
                        return null;
                    }else if (response['message'] === 'city'){
                        $("#up__city_auth").fadeIn(200);
                        $('.load').hide();
                        new Index().lbmAlert('Authentification code sent, please check your E-mail');
                        return null;
                    }

                    if (response['message'] === 'profil_image'){
                        $('.load').hide();
                        $('#up_img_auth').fadeIn(300);
                        new Index().lbmAlert('Authentification code sent, please check your E-mail');
                        return null;
                    }else {
                        new Index().lbmAlert(response['message'], 'danger');
                    }
                }
            }
        });
    }

    /**
     *
     */
    ajaxDelProd (pid){
        $.ajax({
            type: 'post',
            url: 'jxDP',
            data: {del: pid},
            success: function (response) {
                if (response['message'] === true){
                    new Index().lbmAlert('PRODUCT DELETE SUCCESSFULLY');
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }
            }
        });
    }

    /**
     *
     */
    ajxSetRight (uid, right, selector){
        $.ajax({
            type: 'post',
            url: 'jxMSA',
            data: {
                uid: uid,
                right: right
            },
            success: function (response) {
                if (response['response_code'] === 200){
                    let slct = '.'+selector;
                    $(slct).text(right);
                    console.log(slct)
                    new Index().lbmAlert('RIGHT SET SUCCESSFULLY');
                }
            }
        });
    }

    /**
     *
     */
    ajxDelSA (uid){
        $.ajax({
            type: 'post',
            url: 'jxMSA',
            data: {
                uid: uid
            },
            success: function (response) {
                if (response['response_code'] === 200){
                    location.reload();
                    setTimeout(function () {
                        new Index().lbmAlert('USER DELETE SUCCESSFULLY');
                    },1000);

                }
            }
        });
    }

    /**
     *
     */
    ajxNewSA (right, name, email, phone, pass, img = null){
        $.ajax({
            type: 'POST',
            url: 'jxNewSA',
            data: {
                img: img,
                right: right,
                name: name,
                email: email,
                phone: phone,
                pass: pass,
            },
            dataType: 'json',
            success: function (response) {
                if (response['response_code'] === 200){
                    new Index().lbmAlert('Activation mail sent, please check your mail to active this accoumpt');
                }else {
                    new Index().lbmAlert('Fail Add New User Please Try Again');
                }
            }
        });
    }

    /**
     *
     * @param data
     */
    push_dat(data){
        $("#ed_prod_name").text("UPDATE: "+ data["message"][0]['prod_name']);
        $("#ed__cat").val(data["message"][0]['category']);
        $(".ed_sub_cat").val(data["message"][0]['sub_category']);
        $(".ed_qly").val(data["message"][0]['quality']);
        $("#ed__name").val(data["message"][0]['prod_name']);
        $("#ed__price").val(data["message"][0]['price']);
        $(".ed__prom_pr").val(data["message"][0]['promo']);
        $("#ed__desc1").text(data["message"][0]['description']);
        $("#nw__prop").val(data["message"][0]['proprities']);
        $("#nw__Color").val(data["message"][0]['color']);
        $("#nw__Size").val(data["message"][0]['size']);
        $("#nw__stock").val(data["message"][0]['quantity']);

        sessionStorage.setItem('pid', data["message"][0]['id']);
        this.showElemet('.edit__prod');
    }

    /**
     *
     * @param elementToShow
     */
    showElemet(elementToShow) {
        $('.p__list').hide();
        $('.edit__prod').hide();
        $('.n_user').hide();
        $('.allUsers').hide();
        $('.all_promo').hide();
        $('.new__prod').hide();
        $('.n_sub_cat').hide();
        $('.sett__profil').hide();
        $('.mgr_cat').hide();
        $('.promo_candidate').hide();
        $('.discountList').hide();
        $('.__promo_candidate').hide();
        $('.newDiscount').hide();
        $('.plan_-').hide();
        $('.custumer_l').hide();
        $('.faqq').hide();
        $('.__chk_prod').hide();

        new Index().scrollTo(0);
        $(elementToShow).fadeIn();
    }

    /**
     *
     * @param elementToClose
     */
    closeElemet(elementToClose) {
        $(elementToClose).hide();
        new Index().scrollTo(0);
        $('.p__list').show();
    }
}


$(document).ready(function () {
    new Index().scrollTo(0);
    localStorage.setItem('current_user_name', $('.nam').text());
    localStorage.setItem('current_user_mail', $('#up___mail').val());

    $('.admin_imag').on('click', function () {
        if (document.querySelector('.admin_stat_point').getAttribute('id') === 'online'){
            $('#admin_myDropdown').toggle(300);
        }else{
            window.open('login', '_parent');
        }
    });
    window.onclick = function (e) {
        if (!e.target.matches('.admin_imag')){
            $('#admin_myDropdown').hide(300);
        }
    }

    new Index().openLink('bck__hm', "./", '_parent');
    $('.bck').on('click', function () {
        $('.titll__p').fadeIn();
        $('.image, .name__, .mail__, .phn__, .passw__, .city__').fadeOut();
    });
    $('#p_list_close').on('click', function () {
            location.href = 'https://localhost/projets/lebolma/admin';
    });
    $('#Dcancel').on('click', function () {
        new Dashboard().closeElemet('.newDiscount');
    });
    $('#cust__close').on('click', function () {
        $('.aboutUser').fadeOut(100);
    });

    document.querySelectorAll("#clse").forEach(items => {
        items.addEventListener('click', function () {
            let selct = '.'+items.parentElement.getAttribute('class');
            new Dashboard().closeElemet(selct);
        });
    });
    document.querySelectorAll('.short__by p').forEach(btn =>{
        btn.addEventListener('click', function () {
            let selector = '#'+ btn.parentElement.getAttribute('id')+' '+'button';
            $(selector).toggle(100);
        });
    });

    let specials = ['setting', 'addinpromo'];
    document.querySelectorAll('.short__by button').forEach(elemnt =>{
        let view = elemnt.dataset['view'];
        elemnt.addEventListener("click", function () {
            if (specials.includes(view)){
                if (view === "setting"){
                    new Dashboard().setting();
                }
                if (view === "addinpromo"){
                    new Dashboard().addinpromo();
                }

            }else {
                let selector = '.'+view;
                new Dashboard().showElemet(selector);
            }
        });
    });
    document.querySelectorAll('.edit').forEach(btn =>{
        btn.addEventListener('click', function () {
            new Dashboard().ajxShowEditProd(btn.getAttribute('data-id'));
        });
    });
    document.querySelectorAll('#delprod').forEach(del =>{
        del.addEventListener('click', function () {
            let mess = 'Vous êtes sur le point de supprimer cet article,\n' +
                '         il sera définitivement supprimer de votre liste d\'article.\n' +
                '         êtes vous certain de vouloir le supprimer?';

            let ttl = 'DELETE: '+ del.getAttribute('data-prodName');
            new Index().popup(ttl, mess, 'CANCEL', 'DELETE');
            new Index().scrollTo(0);

            $('#close_pop').on('click', function () {
                $('.poppup').fadeOut(300);
            });
            $('.opt1').on('click', function () {
                $('.poppup').fadeOut(300);
            });
            $('.opt2').on('click', function () {
                new Dashboard().ajaxDelProd(del.getAttribute('data-id'));
            });
        });
    });
    document.querySelectorAll('.setRight').forEach(setR =>{
        setR.addEventListener('click', function () {
            let right;
            if (setR.getAttribute('data-type') === 'Limited'){
                right = 'Full'
            }else {
                right = 'Limited'
            }
            new Dashboard().ajxSetRight(setR.getAttribute('data-uid'), right, setR.getAttribute('data-name'));
        });
    });
    document.querySelectorAll('.adm_delsub').forEach(setR =>{
        setR.addEventListener('click', function () {
            let msg = 'Vous êtes sur le point de supprimer un utilisateur, en êtes vous bien sûr?';
            let ttl = 'DELETE: '+setR.getAttribute('data-name');
            new Index().popup(ttl, msg, 'CANCEL', 'DELETE');
        });
        $('.opt2').on('click', function () {
            new Dashboard().ajxDelSA(setR.getAttribute('data-uid'));
        });
        $('.opt1', '#close_pop').on('click', function () {
            $('.poppup').fadeOut(300);
        });
    });

    document.querySelectorAll('#new_sub_cat').forEach(itm =>{
        itm.addEventListener('click', function (e) {
            e.preventDefault();
            let content = itm.parentElement.firstElementChild.value
            if (content !== ''){
                $.ajax({
                    type: 'POST',
                    url: 'jxNewSCAT',
                    data: {
                        item: content,
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response['response_code'] === 200){
                            itm.parentElement.firstElementChild.value = '';
                            new Index().lbmAlert('Add successfully');
                        }else {
                            new Index().lbmAlert('Fail Add Please Try Again');
                        }
                    }
                });
            }else {
                new Index().lbmAlert('Please Complete Form');
            }
        });
    });

    document.querySelectorAll('.cat__list_ img').forEach(itm =>{
        itm.addEventListener('click', function () {
            itm.nextElementSibling.firstChild.nextSibling.style.display = 'block';
            itm.nextElementSibling.firstChild.nextSibling.nextSibling.nextSibling.textContent = 'EDIT';
        });
    });
    document.querySelectorAll('.cat__list_ button').forEach(itm =>{
        itm.addEventListener('click', function (e) {
            e.preventDefault()
            if (itm.parentElement.firstElementChild.getAttribute('style') === null){
                let ttl = 'DELETE: '+itm.getAttribute("data-item");
                let msg = 'Vous êtes sur le point de supprimer cet élement de votre liste de categori,' +
                    ' voulez vous vraiment le faire?'
                new Index().popup(ttl,msg,'CANCEL', 'DELETE');
                options(itm.getAttribute("data-item"));
            }else {
                if (itm.parentElement.firstElementChild.value !== ''){
                    $.ajax({
                        type: 'POST',
                        url: 'jxMgrC',
                        data: {
                            action: 'edit',
                            item:  itm.getAttribute("data-item"),
                            newVal: itm.parentElement.firstElementChild.value
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response['response_code'] === 200){
                                itm.parentElement.firstElementChild.style.display = 'none';
                                itm.parentElement.firstElementChild.nextElementSibling.textContent = 'DELETE';

                                itm.parentElement.parentElement.firstElementChild.innerHTML = itm.parentElement.firstElementChild.value.toUpperCase();
                                itm.parentElement.firstElementChild.value = '';
                                new Index().lbmAlert(response['message']);
                            }else {
                                new Index().lbmAlert('Fail please Try Again');
                            }
                        }
                    });
                }else {
                    new Index().lbmAlert('Please Complete Form');
                }
            }
        });

        function options(choose){
            window.onclick = function (e) {
                if (e.target.matches('.opt2')){
                    $.ajax({
                        type: 'POST',
                        url: 'jxMgrC',
                        data: {
                            action: 'delete',
                            item:  choose,
                            newVal: null
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response['response_code'] === 200){
                                itm.parentElement.parentElement.style.display = 'none';
                                new Index().lbmAlert(response['message']);
                            }else {
                                new Index().lbmAlert('Fail please Try Again');
                            }
                        }
                    });
                }else if (e.target.matches('.opt1')){
                    $('.poppup').fadeOut(300);

                }else if (e.target.matches('#close_pop')){
                    $('.poppup').fadeOut(300);
                }
            }
        }
    });
    document.querySelectorAll('.cat_item_ b').forEach(itm =>{
        if (itm.parentElement.firstElementChild.innerHTML === ''){
            itm.parentElement.style.display = 'none';
        }
    });

    document.querySelectorAll("#mgr__prom_btn").forEach(item =>{
        item.addEventListener('click', function (e) {
            let id = e.target.getAttribute('data-pid');
            if (id){
                let prod_name = 'Product : '+e.target.getAttribute('data-pn');
                let shop_name = 'Shop name : '+e.target.getAttribute('data-sn');
                let category  = 'Category : '+e.target.getAttribute('data-cat');
                let rating = 'Rating : '+e.target.getAttribute('data-rtng');
                let rater = 'Rater : '+e.target.getAttribute('data-rtr');
                let checked = 'Checked : '+e.target.getAttribute('data-chck');
                let add_at = 'Add at : '+e.target.getAttribute('data-addt');

                let message = [prod_name, shop_name, category, rating, rater, checked, add_at];
                let list = document.createElement('div');
                list.setAttribute('class', 'prom_div_d');
                let btn = document.createElement('button');
                btn.innerText = "x"
                btn.setAttribute('class', 'close butt');
                btn.addEventListener('click', function () {
                    $('.prom_div_d').fadeOut(300);
                });
                list.append(btn);
                message.forEach(item =>{
                    let p = document.createElement('p');
                    p.innerHTML = item;
                    list.append(p);
                });
                new Index().scrollTo(0);
                document.querySelector('.promo_list__').append(list);
            }else{
                new Index().lbmAlert('Faill check id', 'info');
            }
        });
    });

    document.querySelectorAll('.titll__p p').forEach(item =>{
        item.addEventListener('click', function () {
            $('.p__list, .titll__p').hide();
            $('.'+item.getAttribute("data-view")).fadeIn();
        });
    });

    let img_at_change = [];
    document.querySelectorAll("#ed___im").forEach(item =>{
        item.addEventListener('input', function () {
            let p = item.getAttribute('value');
            img_at_change.push(p);
        });
    });
    document.forms["ed_prod_from"].addEventListener('submit', function (e) {
        e.preventDefault();
        let arr = [];
        const inputs = this;

        for (let e_=0; e_<inputs.length; e_++){
            arr.push(inputs[e_].value);
        }
        arr.push(sessionStorage.getItem('pid'));
        new Dashboard().ajxEditProd(arr, img_at_change);
    });

    document.forms["add_new_prod_from"].addEventListener('submit', function (e) {
        let arr = [];
        const inputs = this;
        for (let q_=0; q_<inputs.length; q_++){
            if (!inputs[q_].value){
                new Index().lbmAlert('Please complete all forms', 'info');
                return null;
            }else {
                e.preventDefault();
                arr.push(inputs[q_].value);
            }
        }
        new Index().jxPostData("jxNewProd", this, arr);
    });

    let inpFile = document.querySelector('#inpFile');
    let form = document.querySelector('#ad_img');
    form.addEventListener('submit', e => {
        e.preventDefault();
        let field = $("#up_img_auth");
        let code = field.val();
        if (typeof +code === "number" && field.css('display') !== 'none'){
            if (code !== ""){
                new Index().SetCookie('dxa', code, 1);

                let oldImage = inpFile.getAttribute('value');
                let formData = new FormData();

                formData.append("inpFile", inpFile.files[0]);
                formData.append("old_pp", oldImage);

                new Index().post_asyn_fetch("ftcUpAdminImg", this, formData);
            }
        }else{
            new Dashboard().ajxUpdateUserData("profil_image", null, null);
            new Index().lbmLoad('31%', '-8%');
        }
    });

    let lunch = false;
    $('#adm_name_sbt').on('click', function (e) {
        e.preventDefault();
        const el = document.querySelector('#up__name');
        let field = document.querySelector("#up__name_auth");

        if (el.value !== '' && el.value.length >= 3){
            $.ajax({
                type:'POST',
                url:'jxlivechk',
                data: {proposition: el.value},
                success: function (response) {
                    if (response['message'] === 'Already in use'){
                        el.style.boxShadow = "0 0 6px rgba(212, 8, 8, 0.95)";
                        el.style.backgroundColor = "rgba(226,27,27,0.67)";
                        el.style.color = "rgb(255,255,255)";
                        new Index().lbmAlert('Already in use', 'danger');
                        return null;
                    }

                    if(response['message'] === 'free'){
                        if (!lunch){
                            new Dashboard().ajxUpdateUserData("username", null, null);
                            new Index().lbmLoad('26%', '-8%');
                            lunch = true;
                        }

                        if (field.value !== ''){
                            new Dashboard().ajxUpdateUserData("username", el.value, field.value);

                        }else if ($('#up__name_auth').css('display') === 'inline-block'){
                            new Index().lbmAlert('Enter authentification code', 'info');
                        }
                    }
                },
                error: function (error) {
                    if (error){
                        el.style.backgroundColor = "rgb(255,255,255)";
                    }
                }
            });

        }else {
            new Index().lbmAlert('Username is short min 3 characters', 'info');
        }
    });
    $('#up__name').on('input', function () {
        let r = this.value;
        if (r === ''){
            this.style.backgroundColor = "rgba(255,255,255)";
            this.style.color = "rgb(10,10,10)";
            this.style.boxShadow = "0 0 6px rgb(151,150,150)";
        }
    });

    $('#adm_mail_sbt').on('click', function (e) {
        e.preventDefault();
        let mail = $('#up___mail').val();
        let field = $("#up__mail_auth");
        let code = field.val();
        let regmail = /@/ig;

        if (mail.match(regmail) && field.css('display') !== 'none'){
            if (code !== ''){
                new Dashboard().ajxUpdateUserData("email", mail, code);
            }else {
                new Index().lbmAlert('Enter authentification code', 'info');
            }

        }else{
            new Dashboard().ajxUpdateUserData("email", null, null);
            new Index().lbmLoad('26%', '-8%');
        }
    });

    $('#adm_ph_sbt').on('click', function (e) {
        e.preventDefault();
        let phn = $('#up__ph').val();
        let field = $("#up_ph_auth");
        let code = field.val();

        if (typeof +phn === "number" && field.css('display') !== 'none'){
            if (code !== ''){
                new Dashboard().ajxUpdateUserData("phone_number", phn, code);
            }else {
                new Index().lbmAlert('Enter your phone number', 'info');
            }

        }else{
            new Dashboard().ajxUpdateUserData("phone_number", null, null);
            new Index().lbmLoad('26%', '-8%');
        }
    });

    $('#adm_city_sbt').on('click', function (e) {
        e.preventDefault();
        let city = $('#up___city').val();
        let field = $("#up__city_auth");
        let code = field.val();

        if (field.css('display') !== 'none'){
            if (code !== ''){
                new Dashboard().ajxUpdateUserData("city", city, code);
            }else {
                new Index().lbmAlert('Enter your city', 'info');
            }

        }else{
            new Dashboard().ajxUpdateUserData("city", null, null);
            new Index().lbmLoad('26%', '-8%');
        }
    });

    $('#n__submit').on('click', function (e) {
        e.preventDefault();
        let img = $('#n__img').val();
        let right = $('#typ').val();
        let name = $('#n__name').val();
        let email = $('#n__mail').val();
        let phone = $('#n__phone').val();
        let pass = $('#n__passw').val();
        let pass_confirm = $('#n__passw_c').val();

        let regExp = /@/ig;
        let tab = ['Full', 'Limited'];

        if (!tab.includes(right)){
            new Index().lbmAlert('Enter Good RIGHT', 'danger');
            return;
        }
        if (name.length < 3){
            new Index().lbmAlert('Username Is Short', 'danger');
            return;
        }
        if (!email.match(regExp)){
            new Index().lbmAlert('Enter Valid E-mail Adress', 'danger');
            return;
        }
        if (phone.length < 7){
            new Index().lbmAlert('Enter Valid Phone Number', 'danger');
            return;
        }
        if (pass.length < 8){
            new Index().lbmAlert('Password Is Short', 'danger');
            return;
        }
        if (pass !== pass_confirm){
            new Index().lbmAlert('Password D\'nt Matches', 'danger');
            return;
        }
        new Dashboard().ajxNewSA(right, name, email, phone, pass, img);
    });

    $('#d3').on('click', function () {
        $('.p__list #bt1_').toggle(100);
    });

    $('.srch__').on('input', function () {
        let r = this.value;
        let __srch = document.querySelector('#__srch');

        if (r === ''){
            __srch.innerHTML = '';
            __srch.style.display = 'none';
        }else {
            new Index().jxSearch('#__srch', r);
        }
    });

    let regExp1 = /admin\?page=0/ig;
    if (location.href.match(regExp1)){
        location.href = 'http://localhost/projets/lebolma/admin';
    }

    document.querySelectorAll('#prom_more').forEach(itm =>{
        itm.addEventListener('click', function (e) {
            localStorage.setItem("cppi", e.target.getAttribute('data-prom_id'));
            new Index().SetCookie('cppi_cookie', e.target.getAttribute('data-prom_id'));

            $('#_pr_sp').text(e.target.getAttribute('data-shopname'));
            $("#_pr_sp_").text(e.target.getAttribute('data-shopname'));

            $('#_pr_aa').text(e.target.getAttribute('data-add_at'));
            $('#_pr_py').text(e.target.getAttribute('data-py'));
            $('#_pr_pe').text(e.target.getAttribute('data-pe'));
            $('#_pr_st').text(e.target.getAttribute('data-st'));

            $('#_pr_adb').text(e.target.getAttribute('data-addby'));
            $('#_pr_pn_').text(e.target.getAttribute('data-prodname'));
            $('#_pr_cat-').text(e.target.getAttribute('data-category'));
            $('#_pr_qly-').text(e.target.getAttribute('data-quality'));
            $('#_pr_subcat-').text(e.target.getAttribute('data-sub'));
            $('#_pr_pric_').text(e.target.getAttribute('data-price'));
            $('#_pr_prm-').text(e.target.getAttribute('data-promo'));
            $('#_pr_rtg-').text(e.target.getAttribute('data-rating'));
            $('#_pr_rtr-').text(e.target.getAttribute('data-rater'));
            $('#_pr_chk-').text(e.target.getAttribute('data-checked'));
            $('#_pr_clr-').text(e.target.getAttribute('data-color'));
            $('#_pr_sze-').text(e.target.getAttribute('data-size'));
            $('#_pr_prp-').text(e.target.getAttribute('data-prop'));
            $('#_pr_qty-').text(e.target.getAttribute('data-quantity'));
            $('#_pr_dsc-').text(e.target.getAttribute('data-desc'));

            $('#_pr_adt-').text(e.target.getAttribute('data-add_at'));
            $('.mrinf').css('display', 'flex');
        });
    });

    if(document.querySelector('#prom__close')){
        document.querySelector('#prom__close').addEventListener('click', function () {
            $('.mrinf').fadeOut(300);
        });
    }
    if(document.querySelector('.addinpromo')){
        document.querySelector('#prom__close').addEventListener('click', function (e) {
            e.preventDefault();
            $('.___mrinf').fadeOut(300);
        });
        if (document.querySelector(".____promBtnsdel")){
            document.querySelector(".____promBtnsdel").addEventListener('click', function () {
                $('.___mrinf').fadeOut(300);
            });
        }
    }

    $('.promBtnstate').on('click', function () {
        document.querySelectorAll('.state_opt p').forEach(item =>{
            if (document.querySelector('#_pr_st').innerHTML === item.innerHTML) {
                item.style.display = 'none';
            }
        });
        $('.state_opt').toggle(300);
    });

    document.querySelectorAll('.state_opt p').forEach(item =>{
        item.addEventListener('click', function () {
            new Index().jxPostData('jxpromsetste', this, item.innerHTML, localStorage.getItem("cppi"));
        });
    })

    if (document.querySelector('.promBtnAdd')){
        document.querySelector('.promBtnAdd').addEventListener('click', function () {
            new Index().jxPostData('jxprompost', this,
                $('#_pr_sp_').text(),
                $('#_pr_adb').text(),
                $('#_pr_pn_').text(),
                $('#_pr_cat-').text(),
                $('#_pr_qly-').text(),
                $('#_pr_subcat-').text(),
                $('#_pr_pric_').text(),
                $('#_pr_prm-').text(),
                $('#_pr_rtg-').text(),
                $('#_pr_rtr-').text(),
                $('#_pr_chk-').text(),
                $('#_pr_clr-').text(),
                $('#_pr_sze-').text(),
                $('#_pr_prp-').text(),
                $('#_pr_dsc-').text(),
                $('#_pr_adt-').text(),
                $('#_pr_qty-').text(),

                $('#_pr_img1-').text(),
                $('#_pr_img2-').text(),
                $('#_pr_img3-').text(),
                $('#_pr_img4-').text(),
                $('#_pr_img5-').text(),
            );
        });
    }

    $('#d8 button').on('click', function () {
        $('#prom_bt1__').toggle();
    });

    document.querySelectorAll('.addinpromo').forEach(itm =>{
        itm.addEventListener('click', function (e) {
            localStorage.setItem("sp_cppi", e.target.getAttribute('data-pid'));
            new Index().SetCookie('sp_cppi_cookie', e.target.getAttribute('data-pid'));

            $('#_pr_aby_').text(e.target.getAttribute('data-addby'));
            $('#_pr_pn_').text(e.target.getAttribute('data-prodname'));
            $('#_pr_cat-').text(e.target.getAttribute('data-category'));
            $('#_pr_qly-').text(e.target.getAttribute('data-quality'));
            $('#_pr_subcat-').text(e.target.getAttribute('data-sub'));
            $('#_pr_pric_').text(e.target.getAttribute('data-price')+' $');
            $('#_pr_prm-').text(e.target.getAttribute('data-promo')+' $');
            $('#_pr_rtg-').text(e.target.getAttribute('data-rating'));
            $('#_pr_rtr-').text(e.target.getAttribute('data-rater'));
            $('#_pr_chk-').text(e.target.getAttribute('data-checked'));
            $('#_pr_clr-').text(e.target.getAttribute('data-color'));
            $('#_pr_sze-').text(e.target.getAttribute('data-size'));
            $('#_pr_prp-').text(e.target.getAttribute('data-prop'));
            $('#_pr_qty-').text(e.target.getAttribute('data-quantity'));
            $('#_pr_dsc-').text(e.target.getAttribute('data-desc'));

            $('#_pr_adt-').text(e.target.getAttribute('data-add_at'));
            $('.___mrinf').css('display', 'flex');
        });
    });

    if (document.querySelector("#sp_delay")){
        document.querySelector("#sp_delay").addEventListener('change', function () {
            if (this.value.split(' ')[1] === "Day"){
                document.querySelector('#sp_bg_v').value = (this.value.split(' ')[0] * 1.9).toFixed(2)+' US$'
            }
            if (this.value.split(' ')[1] === "Weeks"){
                document.querySelector('#sp_bg_v').value = (this.value.split(' ')[0] * 13).toFixed(2)+' US$'
            }
            if (this.value.split(' ')[1] === "Months"){
                document.querySelector('#sp_bg_v').value = this.value.split(' ')[0] * 58.5+' US$'
            }
        });
    }

    if (document.querySelector('.___promBtnAdd')){
        document.querySelector('.___promBtnAdd').addEventListener('click', function () {
            new Index().jxPostData('jxPromAdd', this,
                $('#sp_delay').val(),
                $('#sp_bg_v').val(),

                $('#_pr_pn_').text(),
                $('#_pr_cat-').text(),
                $('#_pr_qly-').text(),
                $('#_pr_subcat-').text(),
                $('#_pr_pric_').text(),
                $('#_pr_prm-').text(),
                $('#_pr_rtg-').text(),
                $('#_pr_rtr-').text(),
                $('#_pr_chk-').text(),
                $('#_pr_clr-').text(),
                $('#_pr_sze-').text(),
                $('#_pr_prp-').text(),
                $('#_pr_dsc-').text(),
                $('#_pr_aby_').text(),
                $('#_pr_adt-').text(),
                $('#_pr_qty-').text(),
                $('#_pr_img1-').text(),
                $('#_pr_img2-').text(),
                $('#_pr_img3-').text(),
                $('#_pr_img4-').text(),
                $('#_pr_img5-').text(),
            );
        });
    }

    if (document.querySelector('#faq_ed')){
        document.querySelectorAll('#faq_ed').forEach(item =>{
            item.addEventListener('click', function () {
                if (item.nextElementSibling.style.display === 'block'){
                    item.nextElementSibling.style.display = 'none';
                }else {
                    item.nextElementSibling.style.display = 'block'
                }
            });
        });
        document.querySelectorAll('#F__cancel').forEach(item =>{
            item.addEventListener('click', function (e) {
                e.preventDefault();
                item.parentNode.style.display = 'none';
            });
        });
        document.querySelector('#FAQ_add_').addEventListener('click', function () {
            $('.F_add form').fadeIn(800);
            this.style.display = 'none';
        });
        document.querySelector('#faq__NQFC').addEventListener('click', function () {
            $('.F_add form').fadeOut(100);
            $('#FAQ_add_').fadeIn(100);
        });
    }

    if (document.querySelector('.plan_-')){
        document.querySelector('#plan_add_').addEventListener('click', function () {
            $('#plan_add_').fadeOut(100);
            $('._add_pl form').fadeIn(100);
        });
        document.querySelector('#plan__').addEventListener('click', function () {
            $('._add_pl form').fadeOut(100);
            $('#plan_add_').fadeIn(100);
        });

        document.querySelectorAll('#plan_ed').forEach(item =>{
            item.addEventListener('click', function () {
                if (item.nextElementSibling.style.display === 'block'){
                    item.nextElementSibling.style.display = 'none';
                }else {
                    item.nextElementSibling.style.display = 'block'
                }
            });
        });
        document.querySelectorAll('#plan__cancel').forEach(item =>{
            item.addEventListener('click', function () {
                item.parentNode.style.display = 'none';
            });
        });

        document.querySelector('#__u1').addEventListener('click', function () {
            if(document.querySelector('.allcustlist').style.display === 'none'){
                $('._allcustlist_').fadeOut(300);
                $('.custList').fadeIn(500);
                $('.allcustlist').fadeIn(700);
                document.querySelector('#__u1').innerHTML = 'HIDE'+' &blacktriangle;';
            }else {
                $('.custList').fadeOut(500);
                $('.allcustlist').fadeOut(500);
                document.querySelector('#__u1').innerHTML = 'VIEW LIST'+' &blacktriangledown;';
            }
            document.querySelector('#__u2').innerHTML = 'VIEW LIST'+' &blacktriangledown;';
        });

        document.querySelector('#__u2').addEventListener('click', function () {
            if(document.querySelector('._allcustlist_').style.display === 'none'){
                $('.allcustlist').fadeOut(300);
                $('.custList').fadeIn(500);
                $('._allcustlist_').fadeIn(700);
                document.querySelector('#__u2').innerHTML = 'HIDE'+' &blacktriangle;';
            }else {
                $('.custList').fadeOut(500);
                $('._allcustlist_').fadeOut(500);
                document.querySelector('#__u2').innerHTML = 'VIEW LIST'+' &blacktriangledown;';
            }
            document.querySelector('#__u1').innerHTML = 'VIEW LIST'+' &blacktriangledown;';
        });

        document.querySelectorAll(".allcustlist ul li").forEach(obj =>{
            obj.addEventListener("click", function () {
                let id = obj.getAttribute('data-pid');
                new Index().jxPostData('jxAbtCust', this, 'sallers', id);
            });
        });

        document.querySelectorAll("._allcustlist_ ul li").forEach(obj =>{
            obj.addEventListener("click", function () {
                let id = obj.getAttribute('data-pid');
                new Index().jxPostData('jxAbtCust', this, 'users', id);
            });
        });
    }


});