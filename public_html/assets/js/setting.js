class Setting{
    constructor() {}

    /**
     *
     * @param form
     * @param btn
     * @param indice
     * @param context
     */
    postSetting = (form, btn, indice = null, context)=>{
        let form_ = document.querySelector('#'+form);
        let btn_ = document.querySelector('#'+btn);

        if (btn_ !== null){
            btn_.addEventListener('click', (e)=>{
                new Index().lbmLoad('50%', null);

                if (indice === 'shop_name'){
                    e.preventDefault();
                    $.ajax({
                        type:'POST',
                        url:'ckReadyUse',
                        data: {prop: form_.value},
                        success:function (response) {
                            if (response["message"] !== 'free'){
                                document.querySelector('#setshopname').style.borderColor = 'red';
                                new Index().lbmAlert(response["message"], 'danger');
                                return null;
                            }else {
                                new Index().jxPostData('ftcSetD', context, form_.value, indice);
                            }
                        }
                    });

                }else {
                    if (form_.value !== ''){
                        e.preventDefault();
                        new Index().jxPostData('ftcSetD', context, form_.value, indice);
                    }else {
                        new Index().lbmAlert('Please complete form', 'info');
                    }
                }
            });
        }
    }

    /**
     * @param form
     * @param indice
     * @param context
     */
     selectPostSetting = (form ,indice = null, context)=>{
        let form_ = document.querySelector('#'+form);
        form_.addEventListener('change', ()=>{
            if (form_.value !== ''){
                new Index().jxPostData('ftcSetD', context, form_.value, indice);
            }else {
                new Index().lbmAlert('Please complete form', 'info');
            }
        });
     }

    /**
     *
     * @param toast
     * @param state
     * @param columb
     * @param entrie
     */
     postchkboxvalue = (toast = null, state, columb, entrie)=>{
        if (state === 'true'){$('#'+toast).text('Enable').fadeIn()}
        else {$('#'+toast).text('disable').fadeIn()}

        new Index().jxPostData('ftcSetD', null, state, columb, entrie);
        setTimeout(()=>{$('#'+toast).fadeOut()},2000);
     }

    /**
     *
     * @param url
     * @param context
     * @param data
     */
     fetch_setting(url, context, data){
         fetch(url, {
             method: 'POST',
             body: data,
         }).then(res => res.json()
             .then(val => {
                 $('.load').hide();
                 if (val['message'] !== 'Update successfully'){
                     new Index().lbmAlert(val['message'], "danger");
                 }else {
                     new Index().lbmAlert(val['message']);
                 }
             })
         )
     }

    /**
     *
     * @param input
     * @param form
     * @param context
     * @param indice
     */
     postimage = (input, form, context, indice)=>{
         let inp = document.querySelector('#'+input);
         if (form !== null){
             document.querySelector('#'+form).addEventListener('submit', (e)=>{
                 e.preventDefault();
                 if (inp.value !== ''){
                     new Index().lbmLoad('50%', null);
                     let oldImg = inp.getAttribute("data-cci");
                     let newImg = inp.files[0];
                     let fd = new FormData;

                     fd.append('newCover', newImg);
                     fd.append('oldCover', oldImg);
                     fd.append('indice', indice);
                     new Setting().fetch_setting("ftcSetD", context, fd);

                 }else {
                     new Index().lbmAlert('PLease upload image', 'info');
                 }
             });
         }
     }

}


$(document).ready(function () {
    let sett = new Setting();
    let clr = '';

    document.querySelectorAll('#tbod tr').forEach(item =>{
        item.addEventListener('click', ()=>{
            if (item.children[0].children[2].getAttribute('id') === 'allpdiv'){
                document.querySelector('#allpdiv').style.display = 'block';
                let frm = document.querySelectorAll('#allpdiv form');
                frm.forEach(elt =>{elt.style.display = 'block'});
                item.children[0].children[0].style.display = 'block';

            }else {
                item.children[0].children[2].style.display = 'block';
                item.children[0].children[0].style.display = 'block';
            }
        });
    });
    document.querySelectorAll('.close').forEach(item =>{
        item.addEventListener('click' ,(e)=>{
            let class_ = e.target.getAttribute('class');
            let id = item.nextElementSibling.nextElementSibling.getAttribute('id');
            $('#'+id).fadeOut();
            $('.'+class_).fadeOut();
        });
    });
    document.querySelectorAll('#_s_fc h5').forEach(item =>{
        item.addEventListener('click', ()=>{
            document.querySelector(".__op").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__btns").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__prc").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__pn").style.boxShadow = '0 1px 2px #2b2a2a';

            clr = item.getAttribute('data-entrie');
            item.style.boxShadow = '1px 1px 2px #0acec7';
            document.querySelector(".colr").style.display = 'block';
        });
    });
    document.querySelectorAll(".__tb_clr h5").forEach((colors)=>{
        colors.style.display = 'block';
    });
    document.querySelectorAll('input[type = checkbox]').forEach(item =>{
        item.addEventListener('input', (e)=>{
            (e.target.value === "true") ? e.target.value = "false" : e.target.value = "true";
            let id = item.parentElement.parentElement.parentElement.getAttribute('id');
            let col = item.getAttribute('data-b');
            let entrie = item.getAttribute('data-xiss');
            sett.postchkboxvalue(id+" h4", e.target.value, col, entrie);
        });
    });
    document.querySelectorAll('.set__th').forEach(item =>{
        item.addEventListener('change', ()=>{
            var entrie = item.getAttribute('data-entrie');
            sett.postchkboxvalue(null, item.value, 'theme', entrie);
        });
    });
    document.querySelectorAll('#_s_th div').forEach(item =>{
        item.addEventListener('click', ()=>{
            if (item.classList.value === "d_div"){
                document.querySelector('.l_div').removeChild(document.querySelector('.l_div').firstElementChild)
            }else {
                document.querySelector('.d_div').removeChild(document.querySelector('.d_div').firstElementChild)
            }
            let el = document.createElement('a');
            el.innerHTML = '/';
            item.prepend(el);

            let val = item.getAttribute('data-value');
            let ent = item.getAttribute('data-entrie');
            sett.postchkboxvalue(null, val, 'theme', ent);
        });
    });
    document.querySelectorAll('.colr input').forEach(item =>{
        item.addEventListener('click', ()=>{
            let val = item.getAttribute('data-color_code')
            sett.postchkboxvalue(null, val, "theme", clr);
        });
    });

    //side bar start
    let setcolor = (item1, item2, item3, item4)=>{
        document.querySelector('.'+item1).style.color = '#5e5c5c';
        document.querySelector('.'+item2).style.color = '#5e5c5c';
        document.querySelector('.'+item3).style.color = '#5e5c5c';
        document.querySelector('.'+item4).style.color = '#4493e7';
    }
    function displayTab() {
        document.querySelector('.using').style.display = 'block';
        document.querySelector('.confidentiality').style.display = 'block';
        document.querySelector('.theme').style.display = 'block';
        document.querySelector('.sett_sec4').style.marginTop = '-101.5%';
    }
    $('.usg1').on('click', function () {
        displayTab();
        new Index().scrollTo (-250);
        setcolor('thm1', 'cfd1', 'pynt1','usg1');
    });
    $('.thm1').on('click', function () {
        displayTab();
        new Index().scrollTo (515);
        setcolor('usg1', 'cfd1', 'pynt1', 'thm1');
    });
    $('.cfd1').on('click', function () {
        displayTab();
        new Index().scrollTo (850);
        setcolor('usg1', 'thm1', 'pynt1', 'cfd1');
    });
    $('.pynt1').on('click', function () {
        document.querySelector('.using').style.display = 'none';
        document.querySelector('.confidentiality').style.display = 'none';
        document.querySelector('.theme').style.display = 'none';

        document.querySelector('.sett_sec4').style.marginTop = '-215px';
        new Index().scrollTo (-1);
        setcolor('usg1', 'thm1', 'cfd1', 'pynt1');
    });
    //side bar end

    $('.sett_cls').on('click', ()=>{
       localStorage.setItem('active', '0');
    });
    $(".ic").on('click', function () {open('./', '_parent')});

    sett.postSetting('setshopname', '__snSetid','shop_name','sett_sub_item');
    sett.postSetting('__setdes_ta', '__setdes_id','description','sett_desc_item');
    sett.postSetting('__setmtid', '__setmtbtn','matricule','sett_mt_item');
    sett.postSetting('__setSkinp', '__skbtn','shop_key','sett_sk_item');
    sett.postSetting('__shpruta_id','__shpru_btnid','shop_rules','sett_rule_item');

    sett.selectPostSetting('__paSettslct', 'activity','_s_pa');
    sett.selectPostSetting('__setslid', 'shop_location','_s_lt');
    sett.selectPostSetting('__setdeid', 'currency','_s_de');
    sett.selectPostSetting('__ship_sett','shipping', '__setShfr');

    sett.postimage('profcpId', 'sett_cp_item', 'sett_cp_item', 'cover_image');
    sett.postimage('ppsp', 'ppsp_form', 'sett_cp_item', 'snd_img');
    sett.postimage('pppc', 'pppc_form', 'sett_cp_item', 'ceo_img');
    sett.postimage('ppp_1', 'ppp_1_form', 'sett_cp_item', 'col_1_img');
    sett.postimage('ppp_2', 'ppp_2_form', 'sett_cp_item', 'col_2_img');


});